<div class="row mt-3">
    <div class="col-sm-12">
        <div class="connect-sorting">
            <h5 class="text-center mb-2"><b class="text-red">*</b>AGREGAR COMENTARIO</h5>

            <div class="connect-sorting-content mt-4">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <textarea id="comment" cols="30" rows="2"
                        wire:model.debounce.1000ms='comment'
                        wire:keydown.enter="saveOutput"
                        class="form-control text-bold text-muted"
                        placeholder="El comentario es obligatorio..."
                        >{{ $comment }}</textarea>

                    </div>
                    <div class="row justify-content-between mt-3 p-1">
							<div class="col-sm-12 col-md-12 col-lg-6">
								@if($itemsQuantity > 0)
								<button onclick="Confirm('','clearCart','¿SEGURO DE ELIMINAR LA OPERACIÓN?')"
								class="btn btn-dark btn-sm mtmobile">
								CANCELAR
							</button>
							@endif
						</div>

						<div class="col-sm-12 col-md-12 col-lg-6">
							@if($comment!= '' && $itemsQuantity > 0)
							<button wire:click.prevent="saveOutput" class="btn btn-dark btn-sm btn-block">GUARDAR</button>
							@endif
						</div>
                </div>
            </div>
        </div>
    </div>
</div>

