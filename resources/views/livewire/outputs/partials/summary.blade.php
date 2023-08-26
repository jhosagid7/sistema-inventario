<div class="row">
    <div class="col-sm-12">
        <div>
            <div class="connect-sorting">
                <h5 class="text-center mb-3">
                    RESUMEN DE OPERACION
                </h5>
                <div class="connet-sorting-content">
                    <div class="card simple-title-task ui-sortable-handle">
                        <div class="card-body">
                            <div class="table-responsive task-header tblscroll"  style="max-height:150px; overflow: hidden">
                                <div>
                                    <h5>TOTAL REFACCIONES: {{ $itemsQuantity ?? 0}}</h5>
                                    <input type="hidden" id="hiddentTotalQty" value="{{ $itemsQuantity }}">
                                </div>
                                <div>
                                    <h6 class="mt-3">Operador: <span class="text-muted">{{ auth()->user()->name }}</span></h6>
                                    <h6 class="mt-3">Comentario:</h6>
                                   <span class="text-muted">{{ $comment }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
