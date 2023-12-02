<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit User</h1>

        <!-- Edit user form -->
        <form action="{{ route('admin.users.update', $user) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" value="{{ $user->name }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md" value="{{ $user->email }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role_id" id="role_id" class="mt-1 p-2 w-full border rounded-md" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md float-right">Update User</button>
        </form>
        <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">Back to Users</a>

    </div>
@endsection
