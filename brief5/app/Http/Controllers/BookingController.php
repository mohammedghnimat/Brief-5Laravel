<?php

namespace App\Http\Controllers;
use App\Notifications\BookingRequestNotification;
use App\Models\User;
use App\Models\Booking;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return redirect()->route('properties.index');
        // $bookings = Booking::all();
        // return view('bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function create()
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('bookings.create');
    }

    public function store(Request $request )
    {   
        $renter_id=Auth::user()->id;
        $p=$request->property_id;
            $booking = Booking::all();
            $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    
    // Check for any overlapping bookings
    $overlappingBookings = Booking::where('property_id', $p)
    ->where(function ($query) use ($startDate, $endDate) {
        $query->where(function ($q) use ($startDate, $endDate) {
            $q->where('start_date', '>=', $startDate)
                ->where('start_date', '<', $endDate);
        })->orWhere(function ($q) use ($startDate, $endDate) {
            $q->where('end_date', '>', $startDate)
                ->where('end_date', '<=', $endDate);
        })->orWhere(function ($q) use ($startDate, $endDate) {
            $q->where('start_date', '<=', $startDate)
                ->where('end_date', '>=', $endDate);
        });
    })->get();
    
    if ($overlappingBookings->isNotEmpty()) {
        return back()->with('error', 'The selected dates are already booked. Please select different dates.');
    } else {
        // Proceed with creating the new booking;
        $datetime1=new DateTime($request->input('start_date'));
        $datetime2=new DateTime($request->input('end_date'));
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $booking = Booking::with('property')->find($p);
        $oneDayPrice = $booking->property->one_day_price;
        // dd($oneDayPrice);
        $total=($days+1)*$oneDayPrice;
        // dd($total);
        $newBooking = new Booking();
        $newBooking->start_date = $startDate;
        $newBooking->end_date = $endDate;
        $newBooking->property_id = $p;
        $newBooking->renter_id = $renter_id;
        $newBooking->status = 'pending';//?
        $newBooking->total_price = $total;
        $newBooking->save();


            // Notify property owner
        // $propertyOwner = User::find($newBooking->property->lessor_id); // Adjust the relationship or query based on your data structure

        // $propertyOwner->notify(new BookingRequestNotification());


        return view('bookings.payment', compact('newBooking'));
    }

    }

    public function edit(Booking $booking)
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
