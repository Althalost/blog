<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Illuminate\Routing\Route as Routing;

class SearchInput extends Component
{

    public $search = '';


    public function update(){
        $this->dispatch('search' , search: $this->search);
    }

    public function updated(){
        $this->dispatch('search' , search: $this->search);
    }


    public function render()
    {
        return view('livewire.search-input');
    }
}
