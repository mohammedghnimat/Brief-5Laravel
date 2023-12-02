@extends('layouts.app')
<!-- resources/views/admin/reviews/index.blade.php -->


@section('content')
    <h1 class="text-2xl font-semibold mb-4">Review List</h1>

    <!-- Display reviews in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <!-- Add more table headers based on your Review model fields -->
                <th class="py-2 px-4 border-b text-left">Property</th>
                <th class="py-2 px-4 border-b text-left">Renter</th>
                <th class="py-2 px-4 border-b text-left">Rating</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $review->id }}</td>
                    <!-- Add more table cells based on your Review model fields -->
                    <td class="py-2 px-4 border-b">{{ $review->property->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $review->renter->name }}</td>
                    <td class="py-2 px-4 border-b">
                        @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            <span class=" text-warning">&#9733;</span>
                        @else
                            <span class=" text-secondary">&#9734;</span>
                        @endif
                    @endfor</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.reviews.show', $review) }}" class="text-blue-500 hover:underline">View</a>
                        {{-- <a href="{{ route('admin.reviews.edit', $review) }}" class="text-yellow-500 hover:underline ml-2">Edit</a> --}}
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline">
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
        {{ $reviews->links('vendor.pagination.tailwind') }}
    </div>
@endsection
