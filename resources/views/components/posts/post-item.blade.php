@props(['post'])

    {{-- This component is used to display a single blog post item --}}
    {{-- It includes the post's thumbnail, title, author, and other metadata --}}

    {{-- Ensure that the $posts variable is passed correctly --}}

    <article
        class="flex flex-col md:flex-row bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-4">
        <!-- Imagen modificada -->
        <div class="md:self-stretch">
            <!-- Contenedor para control de altura -->
            <img class="object-cover w-full rounded-t-lg md:rounded-s-lg md:rounded-tr-none h-64 md:h-full md:w-48"
                src="{{ $post->image_url }}" alt="">
        </div>

        <!-- Contenedor de contenido principal -->
        <div class="flex flex-col flex-1 p-4">
            <div class="article-meta flex py-1 text-sm items-center">
                <flux:avatar circle name="Wilson Tovar" color="auto" class="mr-3" />
                <span class="mr-1 text-xs">{{ $post->author->name }}</span>
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>

            <div class="flex-1">
                <!-- Contenedor flexible para contenido -->
                <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ $post->title }}</h5>
                <p class="mb-3 font-normal">{{ $post->getExcerpt() }}</p>
                <div class="flex flex-wrap gap-2">
                    <!-- Mostrar categorías del post -->
                    {{-- $post->categories is a relationship --}}
                    @foreach ($post->categories as $category)
                        <flux:link wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}">
                            <flux:badge variant="solid" color="{{ $category->background_color }}">{{ $category->title }}</flux:badge>
                        </flux:link>
                    @endforeach
                </div>
            </div>

            <!-- Barra de acciones -->
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500 text-sm">{{ $post->readingTime() }}</span>
                </div>
                <div>
                    <a class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <span class="ml-2">1</span>
                    </a>
                </div>
            </div>
        </div>
    </article>
