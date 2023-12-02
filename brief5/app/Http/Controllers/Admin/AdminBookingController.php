<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
       $bookings = Booking::paginate(5);
        // dd($bookings);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function create()
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('admin.bookings.index');
    }

    public function edit(Booking $booking)
    {
        // dd($booking);
        $users = User::all(); // Adjust this based on your actual User model
        $properties = Property::all(); // Adjust this based on your actual Property model
            return view('admin.bookings.edit', compact('booking', 'users', 'properties'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('admin.bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index');
    }
}
