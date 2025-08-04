@props(['post'])

<div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <flux:link wire:navigate href="{{ route('posts.show', $post) }}">
        <img class="rounded-t-lg" src="{{ $post->image_url }}" alt="" />
    </flux:link>
    <div class="p-5">
        <flux:link wire:navigate href="{{ route('posts.show', $post) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        </flux:link>
        <div class="flex items-center mb-4 gap-2">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <p>{{ $post->published_at }}</p>
    </div>
</div>
