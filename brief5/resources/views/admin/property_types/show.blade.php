<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')
<!-- resources/views/roles/show.blade.php -->
@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Property Type Details</h1>

        <!-- Display property type details -->
        <p><strong>ID:</strong> {{ $propertyType->id }}</p>
        <p><strong>Name:</strong> {{ $propertyType->name }}</p>

        <!-- Add more details as needed -->
        <a href="{{ route('admin.property_types.index') }}" class="text-blue-500 hover:underline">Back to PropertyTypes</a>

    </div>
@endsection
