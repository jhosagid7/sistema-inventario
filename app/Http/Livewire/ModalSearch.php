<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Refaccion;

class ModalSearch extends Component
{
    public $search, $refaccions = [];

    public function render()
    {

        $this->liveSearch();
        return view('livewire.modalsearch.modalsearch');
    }

    public function addAll()
    {
        if (count($this->refaccions) > 0) {
            foreach ($this->refaccions  as $refaccion) {
                $this->emit('Add-ModalSearch-ById', $refaccion->id);
            }
        }
    }

    public function liveSearch()
    {
        if (strlen($this->search) > 0) {
            $this->refaccions = Refaccion::where('name', 'like', "%{$this->search}%")
            ->orderBy('name', 'asc')
            ->select('id', 'name', 'stock')->get();
        } else {
            return $this->refaccions = [];
        }
    }


}
