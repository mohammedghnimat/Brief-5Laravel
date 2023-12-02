@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-6 rounded-md shadow-md">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ __('User Details') }}</h2>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium">{{ __('Name') }}</label>
                <p class="text-lg font-semibold">{{ $user->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium">{{ __('Email') }}</label>
                <p class="text-lg font-semibold">{{ $user->email }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium">{{ __('Role') }}</label>
                <p class="text-lg font-semibold">{{ $user->role->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium">{{ __('Profile Image') }}</label>
                <img src="{{ asset('images/' . $user->image) }}" alt="{{ $user->name }} Image" class="w-full rounded-md">
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">Back to Users</a>
            </div>
        </div>
    </div>
@endsection
