<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Request;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;

    // Model Object
    public Category $obj;

    // rules
    protected $rules = [
        'obj.title' => 'required|min:3|max:255',
        'obj.status' => '', // required to work correctly
    ];
    
    // messages for errors
    protected $messages = [
        'obj.title.required' => 'O <b> Título </b> não pode ser vazio.',
        'obj.title.min' => 'O <b> Título </b> precisa ter pelo menos 3 caractéres.',
        'obj.title.max' => 'O <b> Título </b> não poter ter mais de 255 caractéres.',
    ];
    
    // modals
    public $modals = [
        "create" => false,
        "delete" => false,
        "edit" => false,
        "actions" => false,
    ];

    // filters
    protected $queryString = [
        'search'=> ['except' => '']
    ];
    public $search = "";
    public $onlyActives;

    // database params
    public $sortBy = 'title';
    public $sortDirection = 'asc';
    public $perPage = 10;

    // database methods
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    // livewire methods
    public function mount()
    {
        // initialize empty object (prevent null errors)
        $this->obj = new Category();
    }

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
            
        ]);
    }

    // navigation methods
    public function showModal ($modal, $id = null){

        $this->resetValidation();

        if($id != null){
            $this->obj = Category::find($id);
        }else {
            $this->obj = new Category([            
                'status' => true,
                'title' => ucfirst($this->search),
            ]);
        }
        
        $this->modals[$modal] = true;

        // close the actions modals to show modal target 
        if($modal != 'actions'){
            $this->modals['actions'] = false;    
        }

    }

    public function hideModal ($modal){
        $this->modals[$modal] = false;
    }

    // CRUD
    public function create()
    {

        $this->validate();

        Category::create([
            'title' => $this->obj->title,
            'status' => $this->obj->status,
        ]);

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria <b>' . $this->obj['title'] . "</b> foi criada."
        ];

        session()->flash('flash', $flash);
        $this->modals['create'] = false;
    }

    public function toogle($id)
    {

        $category = Category::find($id);


        $msg;
        $color;

        if ($category->status) {
            $category->status = false;
            $msg = 'A Categoria <b>' . $category->title . "</b> foi desabilitada.";
        } else {
            $category->status = true;
            $msg = 'A Categoria <b>' . $category->title . "</b> foi habilitada.";
        }

        $category->save();

        

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => $msg
        ];

        session()->flash('flash', $flash);
    }

    public function delete()
    {
        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria <b>' . $this->obj->title . "</b>  foi removida."
        ];

        session()->flash('flash', $flash);
        Category::destroy($this->obj->id);


        $this->modals['delete'] = false;
        $this->obj = new Category();
    }

    public function update()
    {

        $this->validate();


        $this->obj->save();
        
        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'A Categoria  <b>' . $this->obj->title . "</b> foi atualizada."
        ];
        
        session()->flash('flash', $flash);
        $this->modals['edit'] = false;
        $this->obj = new Category();
    }


}
