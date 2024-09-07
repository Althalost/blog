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

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->resetPage();
        $this->search = $search;
    }


    #[Computed()]
    public function posts()
    {
        if($this->category_id){
             return Post::where('status', 2)
                            ->where('category_id', $this->category_id)
                            ->where('name','LIKE', "%{$this->search}%")
                            ->latest('id')
                            ->paginate(9);
        }
       else{
            return Post::where('status', 2)
                            ->where('name','LIKE', "%{$this->search}%")
                            ->latest('id')
                            ->paginate(10);
        }
    }

    public function render()
    {
        return view('livewire.post-list');
     }
}
