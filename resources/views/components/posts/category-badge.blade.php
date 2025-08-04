@props(['category'])

<flux:link wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}">
    <flux:badge variant="solid" color="{{ $category->background_color }}">{{ $category->title }}</flux:badge>
</flux:link>
