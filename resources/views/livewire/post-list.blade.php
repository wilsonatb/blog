<div id="posts" class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center">
        <div>
            @if ($this->activeCategory || $search)
                <flux:button wire:click="clearFilters()" icon="x-mark" variant="subtle" />
            @endif
            @if ($search)
                Searching for: <span class="font-semibold">{{ $search }}</span>
            @endif
            @if ($this->activeCategory)
                in category: <flux:badge variant="solid" color="{{ $this->activeCategory->background_color }}">{{ $this->activeCategory->title }}</flux:badge>
            @endif
        </div>
        <div class="flex items-center space-x-1 font-light ">
            <flux:button.group>
                <flux:button variant="ghost" class="{{ $sort === 'desc' ? 'bg-zinc-800/5 dark:bg-white/15' : '' }}" wire:click="setSort('desc')">Newest</flux:button>
                <flux:button variant="ghost" class="{{ $sort === 'asc' ? 'bg-zinc-800/5 dark:bg-white/15' : '' }}" wire:click="setSort('asc')">Oldest</flux:button>
            </flux:button.group>
        </div>
    </div>
    <flux:separator />
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
        {{-- <flux:pagination :paginator="$this->posts" /> --}}
    </div>
</div>
