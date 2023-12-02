<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

<!-- resources/views/admin/properties/edit.blade.php -->

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Property</h1>

        <!-- Edit property form -->
        <form action="{{ route('admin.properties.update', $property) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" value="{{ $property->name }}" required>
            </div>

            <div class="mb-4">
                <label for="property_type_id" class="block text-sm font-medium text-gray-700">Type</label>
                <select name="property_type_id" id="property_type_id" class="mt-1 p-2 w-full border rounded-md" required>
                    @foreach($propertyTypes as $type)
                        <option value="{{ $type->id }}" {{ $property->property_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                <select name="location_id" id="location_id" class="mt-1 p-2 w-full border rounded-md" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $property->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md float-right">Update Property</button>
        </form>
        <a href="{{ route('admin.properties.index') }}" class="text-blue-500 hover:underline">Back to Properties</a>

    </div>
@endsection

