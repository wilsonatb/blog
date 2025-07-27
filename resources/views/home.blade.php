<x-layouts.app :title="__('home')">

    <section class=" w-full">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-10 lg:px-12">
            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                <span class="text-xs  rounded-full text-white px-4 py-1.5 mr-3 bg-accent">Blog</span> <span class="text-sm font-medium">News updated every day</span> <flux:icon.chevron-right variant="mini" />
            </a>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Exploring the world of Laravel</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">In this blog, we'll share tutorials, tips, and experiences on web development with Laravel, the PHP framework that's revolutionizing the way we build applications.</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <flux:button href="#" variant="primary" color="orange" icon="arrow-right">Learn more</flux:button>
                <flux:button  class="border border-gray-300 dark:border-gray-700" variant="ghost" href="#" icon="video-camera">Watch video</flux:button>
            </div> 
        </div>
    </section>
    <div class="mb-10">
        <div class="mb-16">
            <h2 class="mt-5 mb-5 text-3xl text-yellow-500 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-5 w-full">
                    @foreach ($featuredPosts as $post)
                        <div class="max-w">
                            <x-posts.post-card :post="$post" />
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Latest Posts</h2>
        <div class="grid grid-cols-3 gap-5 w-full">
            @foreach ($latestPosts as $post)
                <div class="max-w">
                    <x-posts.post-card :post="$post" />
                </div>
            @endforeach
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>
</x-layouts.app>
