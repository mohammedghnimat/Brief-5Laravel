<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

<!-- resources/views/admin/locations/create.blade.php -->

<!-- resources/views/admin/bookings/create.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Booking</h1>

        <!-- Create booking form -->
        <form action="{{ route('admin.bookings.store') }}" method="post">
            @csrf

            <!-- User Selection -->
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
                <select name="user_id" id="user_id" class="mt-1 p-2 w-full border rounded-md" required>
                    <!-- Add options dynamically based on users in your system -->
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Property Selection -->
            <div class="mb-4">
                <label for="property_id" class="block text-sm font-medium text-gray-700">Select Property</label>
                <select name="property_id" id="property_id" class="mt-1 p-2 w-full border rounded-md" required>
                    <!-- Add options dynamically based on properties in your system -->
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Check-In Date -->
            <div class="mb-4">
                <label for="check_in_date" class="block text-sm font-medium text-gray-700">Check-In Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <!-- Check-Out Date -->
            <div class="mb-4">
                <label for="check_out_date" class="block text-sm font-medium text-gray-700">Check-Out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <!-- Add more form fields as needed -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Booking</button>
        </form>
    </div>
@endsection
