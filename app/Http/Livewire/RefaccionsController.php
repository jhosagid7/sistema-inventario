<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Refaccion;
use Livewire\WithPagination;

class RefaccionsController extends Component
{

    use WithPagination;

    public $name, $search, $selected_id, $pageTitle, $componentName, $stock, $alerts;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Refactiones';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {

        if (strlen($this->search) > 0)
        $data = Refaccion::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Refaccion::orderBy('id', 'desc')->paginate($this->pagination);


        return view('livewire.refaccion.refaccions', ['refaccions' => $data])
            ->extends('home')
            ->section('content');
    }

    public function Edit($id)
    {
        $record = Refaccion::find($id, ['id', 'name', 'stock', 'alerts']);
        $this->name = $record->name;
        $this->stock = $record->stock;
        $this->alerts = $record->alerts;
        $this->selected_id = $record->id;

        $this->emit('show-modal', 'show modal!');
    }



    public function Store()
    {
        $rules = [
            'name' => 'required|unique:refaccions|min:3',
            'stock' => 'required'
        ];

        $messages = [
            'name.required' => 'Nombre de la refaccion es requerido',
            'name.unique' => 'Ya existe el nombre de la refaccion',
            'name.min' => 'El nombre de la refaccion debe tener al menos 3 caracteres',
            'stock.required' => 'Nombre de la refaccion es requerido'
        ];

        $this->validate($rules, $messages);

        $category = Refaccion::create([
            'name' => $this->name,
            'stock' => $this->stock,
            'alerts' => $this->alerts
        ]);

        $category->save();

        $this->resetUI();
        $this->emit('refaccion-added', 'Refaccion Registrada');
    }


    public function Update()
    {
        $rules = [
            'name' => "'required|unique:refaccions|min:3",
            'stock' => "required|min:1"
        ];

        $messages = [
            'name.required' => 'Nombre de refaccion requerido',
            'name.min' => 'El nombre de la refaccion debe tener al menos 3 caracteres',
            'name.unique' => 'El nombre de la refaccion ya existe',
            'stock.required' => 'Stock es requerido'
        ];

        $this->validate($rules, $messages);


        $category = Refaccion::find($this->selected_id);
        $category->update([
            'name' => $this->name,
            'stock' => $this->stock,
            'alerts' => $this->alerts
        ]);

        $this->resetUI();
        $this->emit('refaccion-updated', 'Refaccion Actualizada');
    }


    public function resetUI()
    {
        $this->name = '';
        $this->stock = '';
        $this->alerts = '';
        $this->search = '';
        $this->selected_id = 0;
    }



    protected $listeners = ['deleteRow' => 'Destroy'];


    public function Destroy(Refaccion $refaccion)
    {
        $refaccion->delete();

        $this->resetUI();
        $this->emit('refaccion-deleted', 'Refaccion Eliminada');
    }
}
