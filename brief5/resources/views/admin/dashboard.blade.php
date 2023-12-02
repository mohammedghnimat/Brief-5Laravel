@extends('layouts.app') {{-- Assuming you have a layout file, adjust as needed --}}

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ __('Admin Dashboard') }}</h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Total Users -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Total Users') }}</h3>
                <p class="text-2xl font-bold text-blue-500">{{ $userCount }}</p>
            </div>

            <!-- Total Properties -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Total Properties') }}</h3>
                <p class="text-2xl font-bold text-green-500">{{ $propertyCount }}</p>
            </div>

            <!-- Total Locations -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Total Locations') }}</h3>
                <p class="text-2xl font-bold text-yellow-500">{{ $locationCount }}</p>
            </div>

            <!-- Total Property Types -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Total Property Types') }}</h3>
                <p class="text-2xl font-bold text-purple-500">{{ $propertyTypeCount }}</p>
            </div>
        </div>

        <div class="mt-8">
            <!-- Recent Users -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Recent Users') }}</h3>
                <ul>
                    @foreach($recentUsers as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Recent Properties -->
            <div class="bg-white p-6 rounded-md shadow-md mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Recent Properties') }}</h3>
                <ul>
                    @foreach($recentProperties as $property)
                        <li>{{ $property->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-8">
            <!-- New Users Today -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('New Users Today') }}</h3>
                <p class="text-2xl font-bold text-blue-500">{{ $newUsersToday }}</p>
            </div>

            <!-- New Properties Today -->
            <div class="bg-white p-6 rounded-md shadow-md mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ __('New Properties Today') }}</h3>
                <p class="text-2xl font-bold text-green-500">{{ $newPropertiesToday }}</p>
            </div>
        </div>
    </div>
@endsection
