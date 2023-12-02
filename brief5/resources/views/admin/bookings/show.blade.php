<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')
<!-- resources/views/roles/show.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Booking Details</h1>

        <!-- Display booking details -->
        <p><strong>ID:</strong> {{ $booking->id }}</p>
        <p><strong>User:</strong> {{  $booking->renter ? $booking->renter->name : 'N/A' }}</p>
        <p><strong>Property:</strong> {{ $booking->property->name }}</p>
        <p><strong>Check-In Date:</strong> {{ $booking->check_in_date }}</p>
        <p><strong>Check-Out Date:</strong> {{ $booking->check_out_date }}</p>

        <!-- Add more details as needed -->
        <a href="{{ route('admin.bookings.index') }}" class="text-blue-500 hover:underline">Back to Bookings</a>

    </div>
@endsection

