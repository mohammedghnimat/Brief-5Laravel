<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Location;
use App\Models\Booking;
use DateTime;
use DateInterval;
use DatePeriod;

class PropertyController extends Controller
{
    public function index(Request $request)
    {

        $propertyTypes = PropertyType::all();
        $locations = Location::all();

        // $properties = Property::all();
        // Build the query
        $query = Property::query();

        // Apply filters based on user input
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('property_type')) {
            $query->where('property_type_id', $request->input('property_type'));
        }

        if ($request->filled('location')) {
            $query->where('location_id', $request->input('location'));
        }

        if ($request->filled('min_price')) {
            $query->where('one_day_price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('one_day_price', '<=', $request->input('max_price'));
        }

        // Add more filters as needed

        // Get the filtered properties
        $properties = $query->get();

        return view('properties.index', compact('properties', 'propertyTypes', 'locations'));
    }

    public function show(Property $property)
    {
        // $bookedDates = Booking::pluck('date')->toArray();
        $bookedDates = [];
        // $bookings = Booking::where('property_id', $property->id)->get();
        // dd($bookings);
        foreach ($property->bookings as $booking) {
        // Retrieve all dates between the start and end booking dates
        $startDate = new DateTime($booking->start_date);
        $endDate = new DateTime($booking->end_date);
        $endDate->modify('+1 day');
    
        $interval = new DateInterval('P1D'); // 1 day interval
        $dateRange = new DatePeriod($startDate, $interval, $endDate);
    
        // Convert the date range to an array of date strings
        foreach ($dateRange as $date) {
            $bookedDates[] = $date->format('Y-m-d');
        }}
        $reviews = $property->reviews;

        return view('properties.show', compact('property','bookedDates', 'reviews'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('properties.create', compact('propertyTypes', 'locations'));
    }

    public function store(Request $request)
    {
        Property::create($request->all());
        return redirect()->route('properties.index');
    }

    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('properties.edit', compact('property', 'propertyTypes', 'locations'));
    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}
