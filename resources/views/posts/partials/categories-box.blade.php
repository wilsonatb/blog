 <div>
     <flux:heading level="3" size="lg" class="mb-3">Recommended Topics</flux:heading>
     <div class="topics flex flex-wrap justify-start gap-2">
        {{-- Displaying categories with badges --}}
        {{-- Assuming $categories is passed from the controller --}}
        @foreach ($categories as $category)
            <flux:link wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}">
                <flux:badge variant="solid" color="{{ $category->background_color }}">{{ $category->title }}</flux:badge>
            </flux:link>
        @endforeach
     </div>
 </div>
