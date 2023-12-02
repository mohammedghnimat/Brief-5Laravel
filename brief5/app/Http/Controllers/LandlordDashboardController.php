<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class LandlordDashboardController extends Controller
{
    /**
     * Display a listing of the properties.
     */

    public function index()
    {
        // Check if there is an authenticated user
        if ($user = auth()->user()) {

            $user = auth()->user();
            $properties = Property::where('lessor_id', $user->id)->get();
            $propertyTypes = PropertyType::all();
            $locations = Location::all();

             return view('landlord.dashboard.index', compact('properties', 'propertyTypes', 'locations','user'));
        }

        return redirect()->route('login1')->with('error', 'Please log in to view the dashboard.');
    }


    /**
     * Show the form for creating a new property listing.
     */
    public function create()
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('landlord.dashboard.create', compact('propertyTypes', 'locations'));
    }

    /**
     * Store a newly created property listing in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $property = new Property($request->all());
        $property->lessor_id = 2;
        $property->save();


        return redirect()->route('landlord.dashboard.index')->with('success', 'Property created successfully.');
    }

    /**
     * Show the form for editing the specified property listing.
     */
    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('landlord.dashboard.edit', compact('property', 'propertyTypes', 'locations'));
    }

    /**
     * Update the specified property listing in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([

            'name' => 'required|string|max:255',

        ]);

        $property->update($request->all());

        return redirect()->route('landlord.dashboard.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified property listing from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('landlord.dashboard.index')->with('success', 'Property deleted successfully.');
    }


    public function profile()
    {

        $user = auth()->user();
        return view('landlord.dashboard.userprofile', compact('user'));
    }

    public function updatepro(Request $request, User $user)
    {

        $request->validate([

        ]);

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),

        ]);

        return redirect()->route('land.profile', ['user' => $user->id])->with('success', 'Profile updated successfully.');
    }
    public function userReviews()
    {

        $user = auth()->user();

        $reviews = Review::select('reviews.comment', 'users.name as renter_name', 'properties.name as property_name', 'reviews.rating','users.image as image')
            ->join('users', 'reviews.renter_id', '=', 'users.id')
            ->join('properties', 'reviews.property_id', '=', 'properties.id')
            ->where('properties.lessor_id', $user->id)
            ->get();

        return view('landlord.dashboard.reviews', compact('reviews', 'user'));
    }
    public function bookedProperties()
    {

        $user = auth()->user();
        $now = now();

        $bookings = Booking::select(
            'properties.*',
            'bookings.*',
            'bookings.id as booking_id',
            'users.*'
        )
        ->join('users', 'users.id', '=', 'bookings.renter_id')
        ->join('properties', 'properties.id', '=', 'bookings.property_id')
        ->where('end_date', '>', $now)
        ->where('properties.lessor_id', '=', $user->id)
        ->get();


        return view('landlord.dashboard.booking', compact('bookings','user'));
    }

    public function bookedhistory()
    {

        $user = auth()->user();
        $now = now();

        $bookings = Booking::select('properties.*', 'bookings.*', 'users.*')
            ->join('users', 'users.id', '=', 'bookings.renter_id')
            ->join('properties', 'properties.id', '=', 'bookings.property_id')
            ->where('end_date', '<', $now)
            ->where('properties.lessor_id', '=', $user->id)
            ->get();
            // dd($bookings);
        return view('landlord.dashboard.history', compact('bookings','user'));
    }

    public function deleteBooking($id)
{
    $id = (int)$id;
    $booking = Booking::find($id);

    if (!$booking) {
        return redirect()->route('land.booking')->with('error', 'Booking not found.');
    }

    $booking->delete();

    return redirect()->route('land.booking')->with('success', 'Booking canceled successfully');
}




}
