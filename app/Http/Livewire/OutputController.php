<?php

namespace App\Http\Livewire;

use App\Models\Output;
use Livewire\Component;
use App\Models\Refaccion;
use App\Traits\CartTrait;
use App\Models\OutputDetail;

use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class OutputController extends Component
{

    use CartTrait;

    public $pageTitle, $componentName, $total, $itemsQuantity, $comment;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Salidas';
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::gettoTalQuantity();
    }

    public function render()
    {
        return view('livewire.outputs.output', [
            'cart' => Cart::getContent()->sortBy('name')
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function ScanCodeById(Refaccion $refaccion)
    {
        $this->IncreaseQuantity($refaccion);
    }

    protected $listeners = [
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveOutput' => 'saveOutput',
        'scan-code' => 'ScanCode'
    ];


    public function increaseQty(Refaccion $refaccion, $cant = 1)
    {
        $this->IncreaseQuantity($refaccion, $cant);
    }


    public function updateQty(Refaccion $refaccion, $cant = 1)
    {
        if ($cant <= 0)
            $this->removeItem($refaccion->id);
        else
            $this->UpdateQuantity($refaccion, $cant);
    }



    public function decreaseQty($productId)
    {
        $this->decreaseQuantity($productId);
    }

    public function clearCart()
    {
        $this->trashCart();
    }



    public function saveOutput()
    {
        if ($this->itemsQuantity <= 0) {
            $this->emit('sale-error', 'AGREGA RREFACCIONES');
            return;
        }
        // dd($this->itemsQuantity);
        if ($this->itemsQuantity > 0 && $this->comment == '') {
            // dd('si');
            $this->emit('sale-error', 'EL COMENTARIO ES OBLIGATORIO PARA PROCESAR LA OPERACION');
            return;
        }
        // dd('no');

        DB::beginTransaction();

        try {

            $output = Output::create([
                'items' => $this->itemsQuantity,
                'comment' => $this->comment,
                'status' => 'APPROVED',
                'user_id' => Auth()->user()->id
            ]);

            if ($output) {
                $items = Cart::getContent();
                foreach ($items as  $item) {
                    OutputDetail::create([
                        'quantity' => $item->quantity,
                        'output_id' => $output->id,
                        'refaccion_id' => $item->id,
                    ]);

                    //update stock
                    $refaccion = Refaccion::find($item->id);
                    $refaccion->stock = $refaccion->stock - $item->quantity;
                    $refaccion->save();
                }
            }


            DB::commit();
            $this->comment = '';
            Cart::clear();
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('output-ok', 'Operación registrada con éxito');

        } catch (Exception $e) {
            DB::rollback();
            $this->emit('output-error', $e->getMessage());
        }
    }
}
