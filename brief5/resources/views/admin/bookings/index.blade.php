@extends('layouts.app')

<!-- resources/views/admin/properties/index.blade.php -->
<!-- resources/views/admin/bookings/index.blade.php -->

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Booking List</h1>

    <!-- Display bookings in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">User</th>
                <th class="py-2 px-4 border-b text-left">Property</th>
                <th class="py-2 px-4 border-b text-left">Check-In Date</th>
                <th class="py-2 px-4 border-b text-left">Check-Out Date</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $booking->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->renter ? $booking->renter->name : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->property->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->start_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->end_date }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="text-blue-500 hover:underline">View</a>
                        {{-- <a href="{{ route('admin.bookings.edit', $booking) }}" class="text-yellow-500 hover:underline ml-2">Edit</a> --}}
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $bookings->links('vendor.pagination.tailwind') }}
    </div>
@endsection
