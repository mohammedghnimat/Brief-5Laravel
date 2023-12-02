@extends('layouts.app') {{-- Assuming you have a layout file, adjust as needed --}}

@section('content')
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-6 rounded-md shadow-md">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ __('Create New Location') }}</h2>

            <form method="POST" action="{{ route('admin.locations.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-input mt-1 block w-full" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                        {{ __('Create Location') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
