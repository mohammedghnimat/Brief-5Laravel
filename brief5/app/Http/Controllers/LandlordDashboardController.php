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
        $user = User::find(2);
        $properties = Property::all();
        $propertyTypes = PropertyType::all();
  $locations = Location::all();

        return view('landlord.dashboard.index', compact('properties', 'propertyTypes', 'locations','user'));
    }
    // public function index()
    // {
    //     $properties = Property::where('lessor_id', auth()->user()->id)->get();
    //     $propertyTypes = PropertyType::all();
    //     $locations = Location::all();

    //     return view('landlord.dashboard.index', compact('properties', 'propertyTypes', 'locations'));
    // }

    // public function index()
    // {
    //     // Check if there is an authenticated user
    //     if ($user = auth()->user()) {
    //         $properties = Property::where('lessor_id', $user->id)->get();
    //        $propertyTypes = PropertyType::all();
            //   $locations = Location::all();

            //  return view('landlord.dashboard.index', compact('properties', 'propertyTypes', 'locations'));
    //     }

    //     // Handle the case when there is no authenticated user
    //     // You can redirect to a login page or handle it based on your application's logic
    //     return redirect()->route('login')->with('error', 'Please log in to view the dashboard.');
    // }






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
        // dd($property);
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
            // Add validation rules for property update
            'name' => 'required|string|max:255',
            // Add other fields...
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
        // $user = auth()->user(); // Get the authenticated user
        $user = User::find(2);
        return view('landlord.dashboard.userprofile', compact('user'));
    }

    public function updatepro(Request $request, User $user)
    {
        // Validate the form data as needed
        $request->validate([
            // Add validation rules for your form fields
        ]);

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Add other fields as needed
        ]);

        return redirect()->route('land.profile', ['user' => $user->id])->with('success', 'Profile updated successfully.');
    }
    public function userReviews()
    {

        $user = User::find(2);

        $reviews = Review::select('reviews.comment', 'users.name as renter_name', 'properties.name as property_name', 'reviews.rating')
            ->join('users', 'reviews.renter_id', '=', 'users.id')
            ->join('properties', 'reviews.property_id', '=', 'properties.id')
            ->where('reviews.renter_id', $user->id)
            ->get();

        return view('landlord.dashboard.reviews', compact('reviews', 'user'));
    }
    public function bookedProperties()
    {
        // $user = Auth::user(); // Assuming you are using authentication
        $user = User::find(2);
        $now = now();
        // Fetch the bookings along with related properties and users
        $bookings = Booking::select(
            'properties.*',
            'bookings.*', // Select all columns from the bookings table
            'bookings.id as booking_id', // Alias the booking id
            'users.*'
        )
        ->join('users', 'users.id', '=', 'bookings.renter_id')
        ->join('properties', 'properties.id', '=', 'bookings.property_id')
        ->where('end_date', '>', $now)
        ->get();

            // dd($bookings);
        return view('landlord.dashboard.booking', compact('bookings','user'));
    }
    public function bookedhistory()
    {
        // $user = Auth::user(); // Assuming you are using authentication
        $user = User::find(2);
        $now = now();
        // Fetch the bookings along with related properties and users
        $bookings = Booking::select('properties.*', 'bookings.*', 'users.*')
            ->join('users', 'users.id', '=', 'bookings.renter_id')
            ->join('properties', 'properties.id', '=', 'bookings.property_id')
            ->where('end_date', '<', $now)
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
