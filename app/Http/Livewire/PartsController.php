<?php

namespace App\Http\Livewire;

use App\Models\Part;

use Livewire\Component;
// use Livewire\WithPagination;

class PartsController extends Component
{
    // use WithPagination;

    public $name, $stock, $selected_id, $pageTitle, $componentName;
    private $paginattion = 1;


    public function render()
    {
        // $data = Part::all();
        return view('livewire.part.parts')->extends('layouts.app')->section('content');
    }
}
