@extends('layouts.app') {{-- Assuming you have a layout file, adjust as needed --}}

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ __('Property Details') }}</h2>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">
            <div class="mb-4">
                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-auto rounded-md">
            </div>

            <div class="mb-4">
                <p class="text-lg font-semibold text-gray-800">{{ $property->name }}</p>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-600">{{ __('Property Type: ') }} {{ $property->propertyType->name }}</p>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-600">{{ __('Location: ') }} {{ $property->location->name }}</p>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-600">{{ __('One Day Price: ') }} ${{ $property->one_day_price }}</p>
            </div>

            {{-- Add more property details as needed --}}

            <a href="{{ route('admin.properties.index') }}" class="text-blue-500 hover:underline">{{ __('Back to Properties') }}</a>
        </div>
    </div>
@endsection
