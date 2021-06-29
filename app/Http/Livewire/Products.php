<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Products extends Component
{


    use WithPagination;

    // Model Object
    public Product $obj;
    public $categories; // arr of categories

    // rules
    protected $rules = [
        'obj.title' => 'required|min:3|max:255',
        'obj.status' => '', // required to work correctly
        'obj.category_id' => '', // required to work correctly
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
        'search' => ['except' => ''],
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
         $this->categories = Category::all();
        // $this->categories = Category::all()->where('status', "1"); // somente categorias ativas
        // initialize empty object (prevent null errors)
        $this->obj = new Product();
        $this->obj->category = new Category();
        
    }

    public function render()
    {

        $products = Product::query()
            ->when($this->search != "", function ($query) { // IF USER IS SEARCHING FOR SOMETHING...
                return $query->where('title', "like", "%{$this->search}%");
            })
            ->when($this->onlyActives == 1, function ($query) { // IF ONLY ACTIVES IS ON
                return $query->where('status', "1");
            })
            ->with('category') // carrega todas as categorias em uma consulta, em vez de consultar toda vez.
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.products', [
            'products' => $products,

        ]);
    }

    // navigation methods
    public function showModal($modal, $id = null)
    {

        $this->resetValidation();

        if ($id != null) {
            $this->obj = Product::find($id);
            $this->obj->category = Category::find($this->obj->category_id);
            
        } else {
            $this->obj = new Product([
                'status' => true,
                'title' => ucfirst($this->search),
            ]);
            $this->obj->category = new Category();
        }

        $this->modals[$modal] = true;

        // close the actions modals to show modal target
        if ($modal != 'actions') {
            $this->modals['actions'] = false;
        }
    }

    public function hideModal($modal)
    {
        $this->modals[$modal] = false;
    }

    // CRUD
    public function create()
    {


        $this->validate();

        Product::create([
            'title' => $this->obj->title,
            'status' => $this->obj->status,
            'category_id' => $this->obj->category_id,
        ]);

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'O Produto <b>' . $this->obj['title'] . "</b> foi criado.",
        ];

        session()->flash('flash', $flash);
        $this->modals['create'] = false;
        $this->search = "";
    }

    public function toogle($id)
    {

        $category = Product::find($id);

        $msg = "";

        if ($category->status) {
            $category->status = false;
            $msg = 'O Produto <b>' . $category->title . "</b> foi desabilitado.";
        } else {
            $category->status = true;
            $msg = 'O Produto <b>' . $category->title . "</b> foi habilitado.";
        }

        $category->save();

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => $msg,
        ];

        session()->flash('flash', $flash);
    }

    public function delete()
    {
        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'O Produto <b>' . $this->obj->title . "</b>  foi removido.",
        ];

        session()->flash('flash', $flash);
        Product::destroy($this->obj->id);

        $this->modals['delete'] = false;
        $this->obj = new Product();
        $this->obj->category = new Category();
    }

    public function update()
    {

        $this->validate();

        $this->obj->save();

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'O Produto  <b>' . $this->obj->title . "</b> foi atualizado.",
        ];

        session()->flash('flash', $flash);
        $this->modals['edit'] = false;
        // $this->obj = new Product();ss
        // $this->obj->category = new Category();
    }
}
