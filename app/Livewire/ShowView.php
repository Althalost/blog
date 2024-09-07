<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Post;

use Livewire\Attributes\Url;

use Livewire\Attributes\On;

class ShowView extends Component
{

    public Post $post;

    public $similar;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updatingSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $search = $this->search;
        return view('livewire.show-view', compact('search'));
    }
}
