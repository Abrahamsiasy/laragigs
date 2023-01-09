<x-layout>

    @include('partials._search')

    {{-- @dd($listing); --}}
    {{-- @if (count($listing) < 15)
    <h1> NO LISTINGS AVILABLE</h1>
@endif --}}

    {{-- <h2> {{ $listing['title'] }} </h2>
    <p> {{ $listing['desc'] }} </p> --}}

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"  src="{{ $listing->logo ? asset( 'storage/' . $listing->logo) : asset('images/acme.png') }}" alt=""  alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $listing->desc }}
                        </p>
                        <a href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i> Contact Employee</a>

                        <a href="{{ $listing->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            {{-- <a href="/listing/{{$lisitng->id}}/edit"></a> --}}
            <a href="{{ route('list.edit', ['listing'=>$listing->id]) }}">EDIT</a>
            {{-- Delete form --}}
            <form  action="/listing/{{$listing->id}}" method="POST">
                @csrf
                @method('DELETE')

                <button class="button.text-red-500">DELETE</button>
            </form>
        </x-card>
    </div>
</x-layout>
