<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

<!-- resources/views/roles/edit.blade.php -->

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Role</h1>

        <!-- Edit role form -->
        <form action="{{ route('roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" value="{{ $role->name }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md float-right">Update Role</button>
        </form>
        <a href="{{ route('admin.roles.index') }}" class="text-blue-500 hover:underline">Back to Roles</a>
    </div>
@endsection
