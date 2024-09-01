<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class NavigationCustom extends Component
{
    public function render()
    {

        $categories = Category::all();

        return view('livewire.navigation-custom', compact('categories'));
    }
}
