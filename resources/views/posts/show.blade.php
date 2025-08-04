<x-layouts.app :title="Post">
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
                    <livewire:like-button :key="$post->id" :$post />
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

        <div class="mt-10 comments-box border-t border-gray-100 pt-10">
            <h2 class="text-2xl font-semibold text-gray-900 mb-5">Discussions</h2>
            <flux:textarea/>
            <flux:button class="mt-4" variant="primary">Post Comment</flux:button>

            <!-- <a class="text-yellow-500 underline py-1" href=""> Login to Post Comments</a> -->

            <div class="user-comments px-3 py-2 mt-5">
                <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                    <div class="user-meta flex mb-4 text-sm items-center">
                        <img class="w-7 h-7 rounded-full mr-3" src="" alt="mn">
                        <span class="mr-1">user name</span>
                        <span class="text-gray-500">. 15 days ago</span>
                    </div>
                    <div class="text-justify text-gray-700  text-sm">
                        comment content
                    </div>
                </div>
                <!-- <div class="text-gray-500 text-center">
                        <span> No Comments Posted</span>
                    </div> -->
            </div>
        </div>


    </article>
</x-layouts.app>
