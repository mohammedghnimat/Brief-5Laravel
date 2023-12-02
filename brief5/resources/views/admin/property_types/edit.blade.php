<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Property Type</h1>

        <!-- Edit property type form -->
        <form action="{{ route('admin.property_types.update', $propertyType) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" value="{{ $propertyType->name }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md float-right">Update Property Type</button>
        </form>
        <a href="{{ route('admin.property_types.index') }}" class="text-blue-500 hover:underline">Back to PropertyTypes</a>

    </div>
@endsection
