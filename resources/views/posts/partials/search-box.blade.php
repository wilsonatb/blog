 <div x-data="{
     query: '{{ request('search', '') }}'
 }" id="search-box">
     <div>
         <flux:heading level="3" size="lg" class="mb-3">Search</flux:heading>
         <flux:input x-model='query' x-on:keyup.debounce.500ms="$dispatch('search', {search: query})" icon="magnifying-glass" placeholder="Search..." clearable />
     </div>
     {{-- Using alpine.js instead of Livewire for avoid multiple calls --}}
 </div>