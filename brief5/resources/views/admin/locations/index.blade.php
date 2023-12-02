@extends('layouts.app')

<!-- resources/views/admin/properties/index.blade.php -->

<!-- resources/views/admin/locations/index.blade.php -->


@section('content')
<div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold mb-4">Location List</h1>
        <a href="{{ route('admin.creatings.locations') }}" class="bg-green-500 text-white px-4 py-2 rounded-md float-right">Create New Location</a>
    </div>
    <!-- Display locations in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $location->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $location->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.locations.show', $location) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('admin.locations.edit', $location) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('admin.locations.destroy', $location) }}" method="POST" class="inline">
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
        {{ $locations->links('vendor.pagination.tailwind') }}
    </div>
@endsection
