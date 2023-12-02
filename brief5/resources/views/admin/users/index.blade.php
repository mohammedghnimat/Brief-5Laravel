@extends('layouts.app')

<!-- resources/views/admin/index.blade.php -->

@section('content')
    <div class="p-4">
        <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold mb-4">User List</h1>
                <a href="{{route('admin.creatings.user')}}" class="bg-green-500 text-white px-4 py-2 rounded-md mt-4 inline-block float-right">Create New User</a>
            </div>
        <!-- Display users in a table -->
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
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
            {{ $users->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
