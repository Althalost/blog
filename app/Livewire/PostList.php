<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Post;

use Livewire\Attributes\On;

use Livewire\Attributes\Computed;

use Livewire\Attributes\Url;

class PostList extends Component
{

    use WithPagination;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function posts()
    {
        return Post::where('status', 2)
                            ->where('name','LIKE', "%{$this->search}%")
                            ->latest('id')
                            ->paginate(8);
    }

    public function render()
    {
        return view('livewire.post-list');
     }
}
