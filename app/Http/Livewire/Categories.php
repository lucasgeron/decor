<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Request;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;

    public $search = "";
    public $update = "";
    public $confirming;
    public $editing; 


    // protected $rules = [
    //     'search' => 'required|min:3|max:255',
    // ];

    public function render() {
        
        if ($this->search == null) {
            return view('livewire.categories', [
                'categories' => Category::paginate(10),
                'total' => count(Category::all()),
               
            ]);
        }

        return view('livewire.categories', [
            'categories' => Category::where('name', 'like', "%{$this->search}%")->paginate(10),
            'total' => count(Category::where('name', 'like', "%{$this->search}%")->get()),
           
        ]);
    }

    public function create(){

        // $this->validate();
        $this->validate([
                'search' => 'required|min:3|max:255',
        ]);

        Category::create([
            'name' => $this->search,
            'total' => count(Category::all()),
            'status' => false,
        ]);

        $this->search = "";
    }

    public function toogle($id){

        $category = Category::find($id);



        if($category->status){
            $category->status = false;
        }else {
            $category->status = true;
        }

        $category->save();

        session()->flash('message', 'Order deleted successfully!');

    }

    public function confirmDelete($id){
        $this->confirming = $id;
    }

    public function cancel() {
        $this->confirming = "";
        $this->editing = "";
    }

    public function delete($id)  {
        Category::destroy($id);
    }

    public function edit($id) {
        
        $category = Category::find($id);

        $this->editing = $category->id;
        $this->update = $category->name;

    }

    public function update(){

        $this->validate([
            'update' => 'required|min:3|max:255',
        ]);

        $category = Category::find($this->editing);

        $category->name = $this->update;
        $category->save();

        $this->update = "";
        $this->editing = "";

    }




}
