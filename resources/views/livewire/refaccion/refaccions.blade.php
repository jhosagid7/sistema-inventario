
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

				<div class="table-responsive">
					<table class="table table-bordered table striped mt-1">
						<thead class="text-white" style="background: #3B3F5C">
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
									<a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Edit">
										<i class="fas fa-edit"></i>
									</a>

									<a href="javascript:void(0)" class="btn btn-dark" title="Delete">
										<i class="fas fa-trash"></i>
									</a>


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
        window.livewire.on('refaccion-added', msg =>{
            $('#theModal').modal('hide');
            noty(msg)
        })

        window.livewire.on('refaccion-updated', msg =>{
            $('#theModal').modal('hide');
            noty(msg)
        })

        window.livewire.on('refaccion-deleted', msg =>{
            noty(msg)
        })

        window.livewire.on('hide-modal', msg =>{
            $('#theModal').modal('hide');
        })

        window.livewire.on('show-modal', msg =>{
            $('#theModal').modal('show');
        })

        window.livewire.on('hide-modal', msg =>{
            $('#er').css('display', 'none');
        })


	});

    function Comfirms(id)
    {
        swal({
            title: 'COMFIRMAR',
            text: 'CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3B3FC'
        }).then(function(result){
            if(result.vaue){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
