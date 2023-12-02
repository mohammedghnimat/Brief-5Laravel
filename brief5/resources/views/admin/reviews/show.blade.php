<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')
<!-- resources/views/roles/show.blade.php -->


<!-- resources/views/admin/reviews/show.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Review Details</h1>

        <!-- Display details of the specific review -->
        <!-- Customize this based on your Review model fields -->
        <p><strong>ID:</strong> {{ $review->id }}</p>
        <p><strong>Property:</strong> {{ $review->property->name }}</p>
        <p><strong>Renter:</strong> {{ $review->renter->name }}</p>
        <p><strong>Rating:</strong> {{ $review->rating }}</p>
        <p><strong>Comment:</strong> {{ $review->comment }}</p>

        <!-- Add more details based on your Review model fields -->

        <a href="{{ route('admin.reviews.index') }}" class="text-blue-500 hover:underline">Back to Reviews</a>
    </div>
@endsection
