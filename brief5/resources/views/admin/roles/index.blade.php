@extends('layouts.app')

<!-- resources/views/roles/index.blade.php -->

@section('content')
        <h1 class="text-2xl font-semibold mb-4">Role List</h1>

    <!-- Display roles in a table -->
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $role->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.roles.show', $role) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('admin.roles.edit', $role) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
