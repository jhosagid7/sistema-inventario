<div wire:ignore.self class="modal fade" id="modalDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <b>Detalle de Salida <b id='numSalida'></b> </b>
                </h5>

            </div>
            <div class="modal-body">

                <div class="table-sm table-responsive tblscroll" style="max-height:450px">
                    <table  id="tbodi" class="table table-bordered table striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-center">N°</th>
                                <th class="table-th text-white text-center">NOMBRE</th>
                                <th class="table-th text-white text-center">CANT</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot></tfoot>

                    </table>
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark close-btn text-info" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
