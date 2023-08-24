<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Refaccion;
use Livewire\WithPagination;

class RefaccionsController extends Component
{

    use WithPagination;

    public $name, $search, $selected_id, $pageTitle, $componentName;
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

        // $data = Refaccion::all();

        return view('livewire.refaccion.refaccions', ['refaccions' => $data])
            ->extends('home')
            ->section('content');
    }
}
