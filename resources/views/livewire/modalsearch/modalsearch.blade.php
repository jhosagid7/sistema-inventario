<div wire:ignore.self class="modal fade modal-fullscreen" id="modalSearchRefaccion" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="input-group">
                    <input type="text" wire:model="search" id="modal-search-input" autocomplete="off"
                        placeholder="Agrega nombre de la refaccion..." class="form-control">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-gp">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <div class="row p-2 task-header ui-sortable-handle">
                    <div class="table-responsive task-header table-sm tblscroll" style="max-height: 450px; overflow: hidden">
                        <table class="table table-sm table-bordered table-striped mt-1">
                            <thead class="text-white" style="background: #3B3F5C">
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="table-th text-left text-white">REFACCIÓN</th>

                                    <th class="table-th text-center text-white">STOCK</th>
                                    <th class="table-th text-center text-white">
                                        <button id="addSearchAll" wire:click.prevent="addAll" class="btn btn-info btn-sm" {{count($refaccions)> 0 ?
                                            '' : 'disabled' }}>
                                            <i class="fas fa-check"></i>
                                            TODOS
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($refaccions as $refaccion)
                                <tr>
                                    <td class="text-center">
                                        {{ $refaccion->id }}
                                    </td>
                                    <td class="text-left">
                                        <h6>{{$refaccion->name}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{$refaccion->stock}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <button wire:click.prevent="$emit('Add-ModalSearch-ById',{{$refaccion->id}})"
                                            class="btn btn-dark btn-sm">
                                            <i class="fas fa-wrench mr-1"></i>
                                            AGREGAR
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">SIN RESULTADOS</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-xs" data-dismiss="modal">CERRAR VENTANA</button>
            </div>
        </div>
    </div>
</div>

