<div class="flex items-center space-x-2">
    {{-- Like button component --}}
    <flux:button wire:click='toggleLike' variant="ghost">
        <flux:icon.heart class="{{ Auth::user()?->hasLiked($post) ? 'text-red-500' : 'text-gray-500' }}" />
    </flux:button>
    {{-- Display the number of likes --}}
    <span class="text-sm">{{ $post->likes()->count() }}</span>
</div>