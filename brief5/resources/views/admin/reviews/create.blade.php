<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

<!-- resources/views/roles/create.blade.php -->
@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Review</h1>

        <!-- Create review form -->
        <form action="{{ route('admin.reviews.store') }}" method="post">
            @csrf
            <!-- Add form fields for creating a review -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Review</button>
        </form>
    </div>
@endsection
