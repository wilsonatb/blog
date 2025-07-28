@props(['post'])

<div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ $post->image_url }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        </a>
        <div class="flex items-center mb-4 gap-2">
            @foreach ($post->categories as $category)
                <flux:link wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}">
                    <flux:badge variant="solid" color="{{ $category->background_color }}">{{ $category->title }}</flux:badge>
                </flux:link>
            @endforeach
        </div>

        <p>{{ $post->published_at }}</p>
    </div>
</div>
