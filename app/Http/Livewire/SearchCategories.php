<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;


class SearchCategories extends Component
{
    public $search = "";

    public function render()
    {

       if($this->search==null){
            return view('livewire.search-categories');
       }

        return view('livewire.search-categories', [
            'categories' => Category::where('name', 'like', "%{$this->search}%")->get(),
        ]);

    }
}
