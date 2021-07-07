<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Local;
use App\Models\Index;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Manny;

class Indexes extends Component
{

    use WithPagination;

    // Model Object
    public Index $obj;
    public Local $local;

    // rules
    // protected $rules = [
    //     // every $obj attr must have a rule. required to work correctly
    //     'obj.status' => '',
    //     'obj.title' => 'required|min:3|max:255',
    //     'obj.address' => 'max:255',
    //     'obj.number' => '',
    //     'obj.district' => 'max:255',
    //     'obj.city' => 'required|max:255',
    //     'obj.cep' => 'min:10|max:10',
    //     'obj.phone1' => 'min:14|max:14',
    //     'obj.phone2' => 'min:16|max:16',
    // ];

    // messages for errors
    protected $messages = [
        'obj.title.required' => 'O <b> Título </b> não pode ser vazio.',
        'obj.city.required' => 'A <b> Cidade </b> não pode ser vazia.',
        'obj.title.min' => 'O <b> Título </b> precisa ter pelo menos 3 caractéres.',
        'obj.title.max' => 'O <b> Título </b> não pode ter mais de 255 caractéres.',
        'obj.address.max' => 'O <b> Endereço </b> não pode ter mais de 255 caractéres.',
        'obj.district.max' => 'O <b> Bairro </b> não pode ter mais de 255 caractéres.',
        'obj.city.max' => 'A <b> Cidade </b> não pode ter mais de 255 caractéres.',
        'obj.cep.min' => 'O <b> CEP </b> informado não é válido.',
        'obj.cep.max' => 'O <b> CEP </b> não pode ter mais de 8 caractéres.',
        'obj.phone1.min' => 'O <b> Telefone </b> informado não é válido.',
        'obj.phone1.max' => 'O <b> Telefone </b> informado não é válido.',
        'obj.phone2.max' => 'O <b> WhatsApp </b> informado não é válido.',
        'obj.phone2.min' => 'O <b> WhatsApp </b> informado não é válido.',
    ];


    // Manny Masks
    // public function updated($field)
    // {
    //     switch ($field) {
    //         case 'obj.cep':
    //             $this->obj->cep = Manny::mask($this->obj->cep, "11.111-111");
    //             $this->obj->cep >= 0 ?  $this->obj->cep : $this->obj->cep = "";
    //             break;

    //         case 'obj.phone1':
    //             $this->obj->phone1 = Manny::mask($this->obj->phone1, "(11) 1111-1111");
    //             strlen($this->obj->phone1) == 12 ? $this->obj->phone1 =  Manny::mask('42' . $this->obj->phone1, "(11) 1111-1111") :  $this->obj->phone1;
    //             strlen($this->obj->phone1) <= 1 ? $this->obj->phone1 = "" :  $this->obj->phone1;
    //             break;

    //         case 'obj.phone2':
    //             $this->obj->phone2 = Manny::mask($this->obj->phone2, "(11) 1 1111-1111");
    //             strlen($this->obj->phone2) <= 1 ? $this->obj->phone2 = "" :  $this->obj->phone2;
    //             strlen($this->obj->phone2) == 13 ? $this->obj->phone2 =  Manny::mask('429' . $this->obj->phone2, "(11) 1 1111-1111") :  $this->obj->phone2;
    //             strlen($this->obj->phone2) == 14 ? $this->obj->phone2 =  Manny::mask('42' . $this->obj->phone2, "(11) 1 1111-1111") :  $this->obj->phone2;
    //             break;
    //     }
    // }

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
    public function mount($id)
    {
        try{
            $this->local = Local::findOrFail($id);
        }
        catch(ModelNotFoundException){
            return redirect()->to('locais');
        }            
    }

    public function render()
    {
   
        $locals = Local::query()
            ->when($this->search != "", function ($query) { // IF USER IS SEARCHING FOR SOMETHING...
                return $query->where('title', "like", "%{$this->search}%");
            })
            ->when($this->onlyActives == 1, function ($query) { // IF ONLY ACTIVES IS ON
                return $query->where('status', "1");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.indexes', [
            'locals' => $locals,
        ]);
    }

    // navigation methods
    public function showModal($modal, $id = null)
    {
        
        $this->resetValidation();

        if ($id != null) {
            $this->obj = Local::find($id);
            $this->obj->cep = Manny::mask($this->obj->cep, "11.111-111");
            $this->obj->phone1 = Manny::mask($this->obj->phone1, "(11) 1111-1111");
            $this->obj->phone2 = Manny::mask($this->obj->phone2, "(11) 1 1111-1111");
        } else {
            $this->obj = new Local([
                'status' => true,
                'title' => ucfirst($this->search),
                'city' => 'Guarapuava - PR'
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
            'cep' => preg_replace('/[^0-9]/', '', $this->obj->cep),
            'phone1' => preg_replace('/[^0-9]/', '', $this->obj->phone1),
            'phone2' => preg_replace('/[^0-9]/', '', $this->obj->phone2),
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

        $this->obj->cep = preg_replace('/[^0-9]/', '', $this->obj->cep);
        $this->obj->phone1 = preg_replace('/[^0-9]/', '', $this->obj->phone1);
        $this->obj->phone2 = preg_replace('/[^0-9]/', '', $this->obj->phone2);
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
}
