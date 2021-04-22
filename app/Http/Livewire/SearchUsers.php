<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUsers extends Component
{
    public $search = "";

    public function render()
    {

       if($this->search==null){
            return view('livewire.search-users');
       }

        return view('livewire.search-users', [
            'users' => User::where('name', 'like', "%{$this->search}%")->get(),
        ]);

    }
}
