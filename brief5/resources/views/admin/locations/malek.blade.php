<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

<!-- resources/views/admin/locations/create.blade.php -->


@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Location</h1>

        <!-- Create location form -->
        <form action="{{ route('admin.locations.store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Location</button>
        </form>
    </div>
@endsection
