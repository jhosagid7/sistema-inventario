<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HistoryOutputController extends Component
{

    public $componentName, $data, $details = [], $sumDetails, $countDetails,
        $reportType, $userId, $dateFrom, $dateTo, $saleId, $origens;
    public function render()
    {
        return view('livewire.detailoutput.history-output');
    }

    public function fillTable($origens)
{
  // Actualiza la tabla con los datos recibidos
  $this->origens = $origens;
  $this->emit('updateTable');
}
    public function updateTable()
    {
        // Actualiza la tabla
        $this->render();
    }
}
