<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

<!-- resources/views/admin/bookings/edit.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Booking</h1>

        <!-- Edit booking form -->
        <form action="{{ route('admin.bookings.update', $booking) }}" method="post">
            @csrf
            @method('PUT')

            <!-- User Selection -->
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 p-2 w-full border rounded-md" required>
                    <!-- Add options dynamically based on users in your system -->
                    {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach --}}
                    <div class="mb-4">
                        <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" value="{{ $role->name }}" required>
                    </div>
                </select>
            </div>

            <!-- Property Selection -->
            <div class="mb-4">
                <label for="property_id" class="block text-sm font-medium text-gray-700">Select Property</label>
                <select name="property_id" id="property_id" class="mt-1 p-2 w-full border rounded-md" required>
                    <!-- Add options dynamically based on properties in your system -->
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}" {{ $booking->property_id == $property->id ? 'selected' : '' }}>{{ $property->name }}</option>
                    @endforeach
                    
                </select>
            </div>

            <!-- Check-In Date -->
            <div class="mb-4">
                <label for="check_in_date" class="block text-sm font-medium text-gray-700">Check-In Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="mt-1 p-2 w-full border rounded-md" value="{{ $booking->check_in_date }}" required>
            </div>

            <!-- Check-Out Date -->
            <div class="mb-4">
                <label for="check_out_date" class="block text-sm font-medium text-gray-700">Check-Out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="mt-1 p-2 w-full border rounded-md" value="{{ $booking->check_out_date }}" required>
            </div>

            <!-- Add more form fields as needed -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Booking</button>
        </form>
    </div>
@endsection
