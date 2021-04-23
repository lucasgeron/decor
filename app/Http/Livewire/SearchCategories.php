<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;


class SearchCategories extends Component
{
    public $search = "";

   

    protected $rules = [
        'search' => 'required|min:3|max:255'
    ];

    public function render(){

       if($this->search==null){
            return view('livewire.search-categories', [
                // 'categories' => Category::limit(0)->get(),
                'total' => count(Category::all()),
            ]);
       }

        return view('livewire.search-categories', [
            'categories' => Category::where('name', 'like', "%{$this->search}%")->get(),
            'total' => count(Category::where('name', 'like', "%{$this->search}%")->get()),
        ]);

    }

    public function create() {

        $this->validate();
        
        Category::create([
            'name' => $this->search,
            'total' => count(Category::all()),
            'status' => false,
        ]);

        $this->search = "";

    }


    



}
