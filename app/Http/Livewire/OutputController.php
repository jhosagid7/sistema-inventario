<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OutputController extends Component
{
    public $pageTitle, $componentName, $cart=[], $total, $itemsQuantity=1, $comment;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Salidas';
    }

    public function render()
    {
        return view('livewire.outputs.output')
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
