<x-layouts.app :title="__('Posts')">

    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <livewire:post-list />
        </div>
        <div id="side-bar" class="border-t border-t-gray-100 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
            @include('posts.partials.search-box')
            <div id="recommended-topics-box">
                <flux:heading level="3" size="lg" class="mb-3">Recommended Topics</flux:heading>
                <div class="topics flex flex-wrap justify-start">
                    <flux:link href="#">
                        <flux:badge variant="solid" color="red">Laravel</flux:badge>
                    </flux:link>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
