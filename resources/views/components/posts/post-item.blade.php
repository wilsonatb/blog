@props(['post'])

    {{-- This component is used to display a single blog post item --}}
    {{-- It includes the post's thumbnail, title, author, and other metadata --}}

    {{-- Ensure that the $posts variable is passed correctly --}}

    <article
        class="flex flex-col md:flex-row bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-4">
        <!-- Imagen modificada -->
        <div class="md:self-stretch">
            <!-- Contenedor para control de altura -->
            <flux:link wire:navigate href="{{ route('posts.show', $post) }}">
                <!-- Imagen del post -->
                <img class="object-cover w-full rounded-t-lg md:rounded-s-lg md:rounded-tr-none h-64 md:h-full md:w-48" src="{{ $post->image_url }}">
            </flux:link>
        </div>

        <!-- Contenedor de contenido principal -->
        <div class="flex flex-col flex-1 p-4">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-posts.author :author="$post->author" />
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>

            <div class="flex-1">
                <!-- Contenedor flexible para contenido -->
                <flux:link wire:navigate href="{{ route('posts.show', $post) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                </flux:link>
                <p class="mb-3 font-normal">{{ $post->getExcerpt() }}</p>
                <div class="flex flex-wrap gap-2">
                    <!-- Mostrar categorías del post -->
                    {{-- $post->categories is a relationship --}}
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                </div>
            </div>

            <!-- Barra de acciones -->
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500 text-sm">{{ $post->readingTime() }}</span>
                </div>
                <div>
                    <livewire:like-button :key="$post->id" :$post />
                </div>
            </div>
        </div>
    </article>
