@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ __('Create New User') }}</h2>

            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium mb-2">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-input w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm font-medium mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-input w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="password" required autocomplete="new-password">
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-600 text-sm font-medium mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-input w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-600 text-sm font-medium mb-2">{{ __('Profile Image') }}</label>
                    <input id="image" type="file" class="form-input w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="image" accept="image/*" required>
                </div>

                <div class="mb-4">
                    <label for="role_id" class="block text-gray-600 text-sm font-medium mb-2">{{ __('Role') }}</label>
                    <select id="role_id" class="form-select w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="role_id" required>
                        {{-- Populate this dropdown with roles from your database --}}
                        {{-- Example: --}}
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                        {{ __('Create User') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
