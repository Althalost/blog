<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Post;

use Livewire\Attributes\On;

use Livewire\Attributes\Computed;

use Livewire\Attributes\Url;
use App\Models\Category;

class PostList extends Component
{

    use WithPagination;

    public $category_id = '';

    public $tag_id = '';

    public $popular = false;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->resetPage();
        $this->search = $search;
    }

    public function setPopular($select){
        $this->popular = $select;
    }


    #[Computed()]
    public function posts()
    {
   
        return Post::where('status', 2)
                    ->when($this->category_id, function ($query) {
                        $query->withCategory($this->category_id);
                    })
                    ->when($this->tag_id, function ($query) {
                        $query->withTag($this->tag_id);
                    })
                    ->when($this->popular, function ($query) {
                        $query->popular();
                    })
                    ->search($this->search)
                    ->latest('id')
                    ->paginate(9);

    }

    public function render()
    {
        return view('livewire.post-list');
     }
}
