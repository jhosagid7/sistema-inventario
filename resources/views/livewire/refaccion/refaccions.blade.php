
<div class="row sales layout-top-spacing">
	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b>{{ $componentName }} | {{ $pageTitle }}</b>
				</h4>
				<ul class="tabs tab-pills">
					<li>
						<a href="javascript:void(0)" class="btn btn-dark btn-sm float-right" data-toggle="modal" data-target="#theModal">Agregar</a>
					</li>
				</ul>
			</div>
			@include('common.searchbox')

			<div class="widget-content">

				<div class="table-responsive table-sm">
					<table class="table table-sm table-bordered table striped mt-1">
						<thead class="text-white" style="background: #343a40">
							<tr>
								<th class="table-th text-white">REFACCION</th>
								<th class="table-th text-white">STOCK</th>
								<th class="table-th text-white">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($refaccions as $refaccion)
                                <tr>
								<td><h6>{{ $refaccion->name }}</h6></td>
								<td><h6>{{ $refaccion->stock }}</h6></td>

								<td class="text-center">
									<a href="javascript:void(0)" wire:click.prevent="Edit({{$refaccion->id}})"
									class="btn btn-dark mtmobile btn-sm" title="Edit">
									<i class="fas fa-edit"></i>
								    </a>

                                    <button type="button" wire:click.prevent="ScanCode('{{$refaccion->id}}')" class="btn btn-dark btn-sm"><i class="fas fa-wrench"></i>
									</button>
                                </td>
							</tr>
                            @endforeach

						</tbody>
					</table>
					{{ $refaccions->links() }}
				</div>

			</div>
			</div>


		</div>

        @include('livewire.refaccion.form')
	</div>




<script>
	document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('show-modal', msg =>{
			$('#theModal').modal('show')
		})
		window.livewire.on('hide-modal', msg =>{
			$('#theModal').modal('hide')
		})

		window.livewire.on('refaccion-added', msg =>{
			$('#theModal').modal('hide')
            noty(msg)
		})
		window.livewire.on('refaccion-updated', msg =>{
			$('#theModal').modal('hide')
            noty(msg)
		})
		window.livewire.on('refaccion-deleted', msg =>{
            noty(msg)
		})


		$('#theModal').on('hidden.bs.modal', function(e) {
			$('.er').css('display', 'none')
		})
		$('#theModal').on('shown.bs.modal', function(e) {
			$('.refaccion-name').focus()
		})

        window.livewire.on('no-stock', Msg => {
        noty(Msg, 2)
        })

        window.livewire.on('scan-ok', Msg => {
        noty(Msg)
        })


	});

    function Confirm(id, products)
	{
		swal({
			title: 'CONFIRMAR',
			text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
			type: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Cerrar',
			cancelButtonColor: '#fff',
			confirmButtonColor: '#3B3F5C',
			confirmButtonText: 'Aceptar'
		}).then(function(result) {
			if(result.value){
				window.livewire.emit('deleteRow', id)
				swal.close()
			}

		})
	}
</script>
