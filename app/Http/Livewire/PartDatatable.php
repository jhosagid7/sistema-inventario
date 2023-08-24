<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Part;

class PartDatatable extends DataTableComponent
{
    protected $model = Part::class;

    // public bool $dumpFilters = true;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setFilterLayoutSlideDown();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Stock", "stock")
            ->searchable()
                ->sortable(),

        ];
    }
}
