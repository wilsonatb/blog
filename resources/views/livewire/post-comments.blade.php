<div class="mt-10 comments-box border-t border-gray-100 pt-10">
    <flux:heading level="2" size="xl" class="mb-4">Discussions</flux:heading>
    @auth
        <flux:textarea wire:model="comment"/>
        <flux:button wire:click="postComment" class="mt-4" variant="primary">Post Comment</flux:button>
    @else
        <a class="text-yellow-500 underline py-1" wire:navigate href="{{ route('login') }}"> Login to Post Comments</a>
    @endauth

    <div class="user-comments px-3 py-2 mt-5">
        @forelse($this->comments as $comment)
            <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                <div class="user-meta flex mb-4 text-sm items-center">
                    <x-posts.author :author="$comment->user"/>
                    <span class="text-gray-500">. {{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <flux:text class="mt-2"> {{ $comment->comment }}</flux:text>
            </div>
        @empty
            <div class="text-gray-500 text-center">
                <span> No Comments Posted</span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $this->comments->links(data: ['scrollTo' => false]) }}
    </div>
</div>
