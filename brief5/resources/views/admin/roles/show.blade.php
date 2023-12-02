<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')
<!-- resources/views/roles/show.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Role Details</h1>

        <!-- Display role details -->
        <p><strong>ID:</strong> {{ $role->id }}</p>
        <p><strong>Name:</strong> {{ $role->name }}</p>

        <!-- Add more details as needed -->
        <a href="{{ route('admin.roles.index') }}" class="text-blue-500 hover:underline">Back to Roles</a>

    </div>
@endsection
