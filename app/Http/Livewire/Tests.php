<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Tests extends Component
{

    public Category $user;
    public $show = false;

    public function mount()
    {
        $this->user = new Category([
            'title' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.tests');
    }

    public function show($input)
    {
        
        $this->$input = true;
    }

    public function checkout(){
        sleep(10000);
    }
}
