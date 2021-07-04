<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Local;
use Livewire\WithPagination;
use Manny;

class Locales extends Component
{

    use WithPagination;

    // Model Object
    public Local $obj;

    // rules
    protected $rules = [
        'obj.title' => 'required|min:3|max:255',
        'obj.status' => '', // required to work correctly
        'obj.address' => '', // required to work correctly
        'obj.number' => '', // required to work correctly
        'obj.district' => '', // required to work correctly
        'obj.city' => '', // required to work correctly
        'obj.cep' => '', // required to work correctly
        'obj.phone' => '', // required to work correctly
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
        'search' => ['except' => '']
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
        $this->obj = new Local();
    }

    public function render()
    {

        $locales = Local::query()
            ->when($this->search != "", function ($query) { // IF USER IS SEARCHING FOR SOMETHING...
                return $query->where('title', "like", "%{$this->search}%");
            })
            ->when($this->onlyActives == 1, function ($query) { // IF ONLY ACTIVES IS ON
                return $query->where('status', "1");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.locales', [
            'locales' => $locales,

        ]);
    }

    // navigation methods
    public function showModal($modal, $id = null)
    {

        $this->resetValidation();

        if ($id != null) {
            $this->obj = Local::find($id);
        } else {
            $this->obj = new Local([
                'status' => true,
                'title' => ucfirst($this->search),
            ]);
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

        Local::create([
            'status' => $this->obj->status,
            'title' => $this->obj->title,
            'address' => $this->obj->address,
            'number' => $this->obj->number,
            'district' => $this->obj->district,
            'city' => $this->obj->city,
            'phone' => $this->obj->phone,
            'cep' => $this->obj->cep,
        ]);

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'O Local <b>' . $this->obj['title'] . "</b> foi criado."
        ];

        session()->flash('flash', $flash);
        $this->modals['create'] = false;
        $this->search = "";
    }

    public function toogle($id)
    {
        $msg = "";

        $local = Local::find($id);

        if ($local->status) {
            $local->status = false;
            $msg = 'O local <b>' . $local->title . "</b> foi desabilitado.";
        } else {
            $local->status = true;
            $msg = 'O local <b>' . $local->title . "</b> foi habilitado.";
        }

        $local->save();



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
            'message' => 'O local <b>' . $this->obj->title . "</b>  foi removido."
        ];

        session()->flash('flash', $flash);
        Local::destroy($this->obj->id);


        $this->modals['delete'] = false;
        $this->obj = new Local();
    }

    public function update()
    {

        $this->validate();


        $this->obj->save();

        $flash = [
            'color' => 'indigo',
            'title' => "Operação Realizada",
            'message' => 'O local  <b>' . $this->obj->title . "</b> foi atualizado."
        ];

        session()->flash('flash', $flash);
        $this->modals['edit'] = false;
        $this->obj = new Local();
    }




    public function formatPhone()
    {
        $this->obj->phone = Manny::mask($this->obj->phone, "(11) 1 1111-1111");   
    }

    public function formatCep()
    {
        $this->obj->cep = Manny::mask($this->obj->cep, "11111-111");   
    }
}
