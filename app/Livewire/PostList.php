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
                        $query->where('category_id', $this->category_id);
                    })
                    ->when($this->tag_id, function ($query) {
                        $query->whereHas('tags', fn ($q) => $q->where('tag_id', $this->tag_id));
                    })
                    ->when($this->popular, function ($query) {
                        //like count
                        //order by like count
                        $query->withCount('likes')
                        ->orderBy("likes_count", 'desc');
                        //likes_count
                    })
                    ->where('name','LIKE', "%{$this->search}%")
                    ->latest('id')
                    ->paginate(9);

    }

    public function render()
    {
        return view('livewire.post-list');
     }
}
