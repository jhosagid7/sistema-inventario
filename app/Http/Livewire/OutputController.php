<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OutputController extends Component
{
    public $ver, $pageTitle, $componentName;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Refactiones';
        $this->ver = 'ver';
    }

    public function render()
    {
        return view('livewire.outputs.output')
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
