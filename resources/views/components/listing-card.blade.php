@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no_image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a
                    href="{{ route('listing', ['listing' => $listing, 'slug' => $listing->slug]) }}">{{ $listing->title }}</a>
            </h3>
            <x-listing-tags :tags="$listing->tags" />
        </div>
    </div>
</x-card>
