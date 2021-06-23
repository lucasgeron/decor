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
    public $title = "";
    public $update = "";

    public $create = false;
    public $delete = false;
    public $edit = false;
    public $el;
    public $onlyActives;
    public $sortBy = 'title';
    public $sortDirection = 'asc';
    public $perPage = 10;


    public function render()
    {
        $categories = Category::query()
                ->when($this->search!= "", function ($query) { // IF USER IS SEARCHING FOR SOMETHING...
                    return $query->where('title', "like", "%{$this->search}%");
                })
                ->when($this->onlyActives ==1 , function ($query) { // IF ONLY ACTIVES IS ON
                    return $query->where('status', "1");
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);

        return view('livewire.categories', [
            'categories' => $categories,
            'total' => count($categories),
        ]);
    }

    public function show($input, $id = null)
    {

        $this->$input = true;

        if ($id != null)
            $this->el = $id;

        switch ($input) {
            case 'edit':
                $obj = Category::find($id);
                $this->update = $obj->title;
                $this->delete = false;
                break;
        }
    }

    public function hide($input)
    {

        switch ($input) {
            case 'create':
                $this->title = "";
                break;

            case 'delete':
                $this->el = null;
                break;
        }

        $this->$input = false;
    }

    public function create()
    {
        $this->validate([
            'title' => 'required|min:3|max:255',
        ]);

        Category::create([
            'title' => $this->title,
            'total' => count(Category::all()),
            'status' => false,
        ]);



        // session()->flash('message', [
        //     'title'   => 'Error reading uploaded file',
        //     'desc' => 'Blah di ba doo baa, di ba dee daa',
        //     'type'    => 'warning', 
        //    ]);

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria ' . $this->title . " foi criada com sucesso!"
        ];

        session()->flash('flash', $flash);

        $this->title = "";
    }

    public function toogle($id)
    {

        $category = Category::find($id);

        if ($category->status) {
            $category->status = false;
        } else {
            $category->status = true;
        }

        $category->save();

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria ' . $category->title . " teve seu status atualizado!"
        ];

        session()->flash('flash', $flash);
    }

    public function delete($id)
    {

        $obj = Category::find($id);

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria ' . $obj->title . "  foi removida com sucesso!"
        ];

        session()->flash('flash', $flash);
        Category::destroy($id);
    }

    public function update()
    {

        $this->validate([
            'update' => 'required|min:3|max:255',
        ]);

        $category = Category::find($this->el);

        $category->title = $this->update;
        $category->save();

        $this->update = "";
        $this->edit = false;

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria ' . $category->title . " foi atualizada com sucesso!"
        ];

        session()->flash('flash', $flash);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
}
