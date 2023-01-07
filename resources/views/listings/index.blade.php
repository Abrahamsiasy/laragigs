<x-layout>
{{-- @extends('layout')
@section('content') --}}
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($listings) == 0)
            <h1> NO LISTINGS AVILABLE</h1>
        @else
            @foreach ($listings as $listing)
                {{-- <h2> <a href="/listing/{{ $listing['id'] }}"> {{ $listing['title'] }} </a> </h2>
                <p> {{ $listing['desc'] }} </p> --}}

                {{-- get listing-card component and pass listing for the prop --}}
                {{-- <x-listing-card :listing='$listing' /> --}}
                <x-listing-card :listing="$listing" />
            @endforeach
        @endif


    </div>
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
{{-- @endsection --}}
</x-layout>
