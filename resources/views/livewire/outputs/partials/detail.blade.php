<div class="connect-sorting">
    <div class="connect-sortingi-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">
                @if ($itemsQuantity > 0)
                    <div class="table-responsive tblscrol" style="max-height:650px; overflow: hidden">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background:#343a40">
                            <tr>
                                <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                <th class="table-th text-center text-white">STOCK</th>
                                <th width="13%" class="table-th text-center text-white">CANT</th>
                                <th width="13%" class="table-th text-center text-white">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <td class="text-center table-th"></td>
                                <td><h6>{{ $item->name }}</h6></td>
                                <td class="text-center">{{ $item->stock }}</td>
                                <td>
                                    <input type="number" id="r{{ $item->id }}"
                                    wire:change="updateQty({{ $item->id }}, $('#r' + {{ $item->id }}).val())"
                                    style="font-size: 1rem!important"
                                    class="form-control text-center"
                                    value="{{ $item->quantity }}"
                                    >
                                </td>
                                <td class="text-center">
                                    <button onclick="Confirm('{{ $item->id }}', 'removeItem', '¿CONFIRMAS ELIMINAR LA REFACCIÓN?')" class="btn btn-dark mbmobile">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                    <button wire:click.prevent='decreaseQty({{ $item->id }})' class="btn btn-dark mbmobile">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <button wire:click.prevent='increaseQty({{ $item->id }})' class="btn btn-dark mbmobile">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <h5 class="text-center text-muted">Agregar refaccion</h5>
                @endif

                <div wire:loading.inline wire:target='saveOutput'>
                    <h4 class="text-danger text-center">Guardando Operacion...</h4>
                </div>

            </div>
        </div>
    </div>
</div>
