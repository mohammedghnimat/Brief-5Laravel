<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Review</h1>

        <!-- Edit review form -->
        <form action="{{ route('admin.reviews.update', $review) }}" method="post">
            @csrf
            @method('PUT')
            <!-- Add form fields for editing a review -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Review</button>
        </form>
    </div>
@endsection
