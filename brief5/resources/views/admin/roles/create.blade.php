<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

<!-- resources/views/roles/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Role</h1>

        <!-- Create role form -->
        <form action="{{ route('roles.store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Role</button>
        </form>
    </div>
@endsection
