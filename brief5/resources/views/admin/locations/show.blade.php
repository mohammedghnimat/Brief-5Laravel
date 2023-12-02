<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')
<!-- resources/views/roles/show.blade.php -->
<!-- resources/views/admin/locations/show.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Location Details</h1>

        <!-- Display location details -->
        <p><strong>ID:</strong> {{ $location->id }}</p>
        <p><strong>Name:</strong> {{ $location->name }}</p>

        <!-- Add more details as needed -->
        <a href="{{ route('admin.locations.index') }}" class="text-blue-500 hover:underline">Back to Locations</a>

    </div>
@endsection
