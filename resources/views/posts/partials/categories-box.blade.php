 <div>
     <flux:heading level="3" size="lg" class="mb-3">Recommended Topics</flux:heading>
     <div class="topics flex flex-wrap justify-start gap-2">
        {{-- Displaying categories with badges --}}
        {{-- Assuming $categories is passed from the controller --}}
        @foreach ($categories as $category)
             <x-posts.category-badge :category="$category" />
        @endforeach
     </div>
 </div>
