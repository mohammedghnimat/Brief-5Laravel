<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class AdminPropertyController extends Controller
{
    public function index()
    {
       $properties = Property::paginate(5);
        return view('admin.properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('admin.properties.create', compact('propertyTypes', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            'property_type_id' => 'required|exists:property_types,id',
            'location_id' => 'required|exists:locations,id',
            'one_day_price' => 'required|numeric',
        ]);

        // Store the image in the storage/app/public directory
        $imagePath = $request->file('image')->store('public/property_images');

        // Create the property record in the database
        $property = Property::create([
            'name' => $request->input('name'),
            'image' => $imagePath,
            'lessor_id' => auth()->id(), // Assuming the authenticated user is the lessor (property owner)
            'property_type_id' => $request->input('property_type_id'),
            'location_id' => $request->input('location_id'),
            'one_day_price' => $request->input('one_day_price'),
        ]);

        return redirect()->route('properties.show', $property->id)
            ->with('success', 'Property created successfully!');
    }

    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('admin.properties.edit', compact('property', 'propertyTypes', 'locations'));
    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        return redirect()->route('admin.properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index');
    }
}
