<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Helpers extends Component
{

    public $helpers = "teste";   

    public $postCount = 0;


    protected $listeners = ['postAdded' => 'incrementPostCount'];

    public function incrementPostCount($many)
    {
        $this->postCount += $many;
        // $this->emit('postAdded');
    }

    public function render()
    {
        // render a livewire.blade.php file.... 
        // return view('livewire.helpers'); 


        // just return itself, direct from component controller
        return <<<'blade'
            <div> Helper postCounter: {{ $postCount }}</div>
        blade;

    }
    

    
    

    // navigation methods
    public function showModal ($modal, $id = null){
        // dd($input);

        $this->resetValidation();

        // if($id != null){
            // $this->obj = Category::find($id);
        // }else {
            $this->obj = new Category([            
                // 'status' => true,
                // 'title' => ucfirst($this->search),
            ]);
        // }
        
        $modals[$modal] = true;

        // close the actions modals to show modal target 
        if($modal != 'actions'){
            $modals['actions'] = false;    
        }

    }

    public function hideModal ($modal){
        $this->modals[$modal] = false;
    }

   

}
