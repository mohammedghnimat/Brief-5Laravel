@extends('layouts.app')

<!-- resources/views/admin/properties/index.blade.php -->


@section('content')

    <h1 class="text-2xl font-semibold">Property List</h1>

    <!-- Display properties in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Type</th>
                <th class="py-2 px-4 border-b text-left">Location</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $property->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $property->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $property->propertyType->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $property->location->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.properties.show', $property) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('admin.properties.edit', $property) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="inline">
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
        {{ $properties->links('vendor.pagination.tailwind') }}
    </div>
@endsection
