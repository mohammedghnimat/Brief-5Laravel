@extends('layouts.app')

<!-- resources/views/admin/properties/index.blade.php -->


@section('content')
<div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold mb-4">Property Types List</h1>
        <a href="{{ route('admin.creatings.property_types') }}" class="bg-green-500 text-white px-4 py-2 rounded-md float-right">Create New PropertyType</a>
    </div>
    <!-- Display property types in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propertyTypes as $propertyType)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $propertyType->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $propertyType->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.property_types.show', $propertyType) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('admin.property_types.edit', $propertyType) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('admin.property_types.destroy', $propertyType) }}" method="POST" class="inline">
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
        {{ $propertyTypes->links('vendor.pagination.tailwind') }}
    </div>
@endsection
