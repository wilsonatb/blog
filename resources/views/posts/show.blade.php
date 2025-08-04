<x-layouts.app :title="__('Post')">
    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ $post->image_url }}" alt="tumbnail">
        <h1 class="text-4xl font-bold text-left text-gray-900 dark:text-white">
            {{ $post->title }}
        </h1>
        <div class="mt-2 flex justify-between items-center">
            <div class="flex py-5 text-base items-center">
                <x-posts.author :author="$post->author" />
                <span class="text-gray-500 text-sm">| {{ $post->readingTime() }}</span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-500 mr-2">{{ $post->published_at->diffForHumans() }}</span>
                <flux:icon name="clock" class="w-5 h-5 text-gray-500"/>
            </div>
        </div>

        <div
            class="article-actions-bar my-4 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
            <div class="flex items-center">
                <a class="flex items-center gap-2">
                    <livewire:like-button :key="'likeButton-' . $post->id" :$post />
                </a>
            </div>
            <div>
                <div class="flex items-center">
                    <span class="text-gray-500 text-sm">Share</span>
                    <flux:button icon="share" variant="ghost" class="ml-2" inset/>
                </div>
            </div>
        </div>

        <div class="article-content py-3  text-justify">
            {!! $post->body  !!}
        </div>

        <div class="flex items-center space-x-4 mt-10">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

       <livewire:post-comments :$post :key="'comments' . $post->id" />


    </article>
</x-layouts.app>
