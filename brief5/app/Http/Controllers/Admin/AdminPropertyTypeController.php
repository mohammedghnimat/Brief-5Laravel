<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class AdminPropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::paginate(5);
        return view('admin.property_types.index', compact('propertyTypes'));
    }

    public function show(PropertyType $propertyType)
    {
        return view('admin.property_types.show', compact('propertyType'));
    }

    public function create()
    {
 
        return view('admin.property_types.create');
    }

    public function store(Request $request)
    {
        PropertyType::create($request->all());
        return redirect()->route('admin.property_types.index');
    }

    public function edit(PropertyType $propertyType)
    {
        return view('admin.property_types.edit', compact('propertyType'));
    }

    public function update(Request $request, PropertyType $propertyType)
    {
        $propertyType->update($request->all());
        return redirect()->route('admin.property_types.index');
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect()->route('admin.property_types.index');
    }
}
