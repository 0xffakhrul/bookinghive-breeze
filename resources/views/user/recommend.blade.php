@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">
            {{ $hotels->isEmpty() ? 'No Recommendations Available' : 'Recommended Hotels for You' }}
        </h2>
        <p class="text-gray-600 mt-2">
            {{ $hotels->isEmpty() ? 'Start booking hotels to get personalized recommendations.' : 'Discover places that match your taste based on your preferences.' }}
        </p>
    </div>

    @if($hotels->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        {{ $message ?? 'No personalized recommendations available yet.' }}
                    </p>
                </div>
            </div>
        </div>

        @if(isset($popularHotels) && $popularHotels->isNotEmpty())
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Popular Hotels</h3>
                <p class="text-gray-600 mt-2">Here are some highly rated hotels you might like.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($popularHotels as $hotel)
                    @include('partials.hotel-card', ['hotel' => $hotel])
                @endforeach
            </div>
        @endif
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($hotels as $hotel)
                @include('partials.hotel-card', ['hotel' => $hotel])
            @endforeach
        </div>
    @endif
</div>
@endsection