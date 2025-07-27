<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        // You can add logic here to handle the search input, like triggering a search or filtering results
        // For example, you might want to emit an event or call a method to perform the search
        $this->dispatch('search', search: $this->search);
    }

    public function render()
    {
        //return view('livewire.search-box');
    }
}
