<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    public function render()
    {

        return view('livewire.show-categories', [
            'categories' => Category::all(),
        ]);
        
    }
}
