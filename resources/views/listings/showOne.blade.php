@extends('layout')

@section('content')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no_image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>

                <x-listing-tags :tags="$listing->tags" />

                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6 flex flex-col items-center">
                        <p>{{ $listing->description }}</p>

                        <a href="{{ $listing->trailer }}" target="_blank"
                            class="block bg-red-600 text-white py-2 rounded-xl hover:opacity-80 w-64"><i
                                class="fab fa-youtube"></i> Watch Trailer
                        </a>

                        <a href="{{ $listing->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80 w-64"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website
                        </a>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection
