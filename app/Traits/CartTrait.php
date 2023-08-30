<?php

namespace App\Traits;

use App\Models\Refaccion;
use Darryldecode\Cart\Facades\CartFacade as Cart;

trait CartTrait {

    public function ScanearCode($id, $cant = 1)
    {

        $refaccion = Refaccion::where('id', $id)->first();


        if ($refaccion == null || empty($refaccion)) {
            $this->emit('scan-notfound', 'La refacciono no está registrada');
        } else {

            if ($this->InCart($refaccion->id)) {
                $this->IncreaseQuantity($refaccion);
                return;
            }

            if ($refaccion->stock < 1) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }


            Cart::add($refaccion->id, $refaccion->name, 1, $cant);

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $car = Cart::getTotalQuantity();

            $this->emit('scan-ok', 'Refaccion agregada');

        }
    }

    public function InCart($itemId)
    {
        $exist = Cart::get($itemId);
        return $exist ? true : false;
    }

    public function IncreaseQuantity($refaccion, $cant = 1)
    {
        $title = '';

        $exist = Cart::get($refaccion->id);
        if ($exist)
            $title = 'Cantidad actualizada';
        else
            $title = 'Refaccion agregada';

        if ($exist) {
            if ($refaccion->stock < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }
        }

        Cart::add($refaccion->id, $refaccion->name, $cant, $cant);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', $title);
    }

    public function updateQuantity($refaccion, $cant = 1)
    {
        $title = '';
        $exist = Cart::get($refaccion->id);
        if ($exist)
            $title = 'Cantidad Actualizada';
        else
            $title = 'Refaccion agregada';

        if ($exist) {
            if ($refaccion->stock < $cant) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }
        }

        $this->removeItem($refaccion->id);

        if ($cant > 0) {
            Cart::add($refaccion->id, $refaccion->name, $cant, $cant);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('scan-ok', $title);
        }
    }

    public function removeItem($itemId)
    {
        Cart::remove($itemId);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'Refacción eliminada');
    }

    public function decreaseQuantity($itemId)
    {
        $item = Cart::get($itemId);
        Cart::remove($itemId);

        $newQty = ($item->quantity) - 1;

        if ($newQty > 0)
            Cart::add($item->id, $item->name, $item->price, $newQty);


        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Cantidad actualizada');
    }

    public function trashCart()
    {
        Cart::clear();
        $this->comment = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'La operación se cancelo*');
    }
}
