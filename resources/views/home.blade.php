@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Refacciones</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Refacciones</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped refaccions_table" style="width: 100%;">
                        <thead class=" text-white"  style="background: #343a40">
                            <tr>
                                <th class="text-center" scope="col">N°</th>
                                <th class="text-center" scope="col">Operador</th>
                                <th class="text-center" scope="col">Cant</th>
                                <th class="text-center" scope="col">Comentario</th>
                                <th class="text-center" scope="col">Fecha</th>
                                <th class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   @include('common.detailsOutput')
</div>

@stop

@section('css')
    @include('layouts.theme.styles')
@stop

@section('js')
    @include('layouts.theme.scripts')
    @livewireScripts

    <script>
    $(document).ready(function() {
        var id
        $('.refaccions_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{route('home')}}",
            dataType: 'json',
            type: "POST",
            columns: [{
                    data: 'id',
                    name: 'id',
                    className: 'text-center'
                },
                {
                    data: 'user.name',
                    name: 'user.name',
                },
                {
                    data: 'items',
                    name: 'items',
                    className: 'text-center'
                },
                {
                    data: 'comment',
                    name: 'comment',
                },

                {
                    data: 'created_at',
                    name: 'created_at',
                    visible: false,
                    className: 'text-center'
                },
                {
                    data: 'id',
                    name: 'id',
                    className: 'text-center',
                    searchable: false,
                    orderable: false,
                    render: function (data, type) {
                        if (type === 'display') {
                            id = data
                            return '<td class="text-center"><button onclick="getDetail('+data+')" class="btn btn-dark btn-sm"><i class="fas fa-list"></i></button></td>';
                        }

                        return data;
                    }
                }
            ],
        })


    })
</script>

<script>
    function getDetail(id){
        $("#modalDetails").modal("show");
        if ($.trim(id != '')) {
                $.ajax({
                    type: 'get',
                    url: '{{ url ("details") }}',
                    data: "id=" + id,
                    success: function (origens) {
                        $("#tbodi>tbody").empty();
                        $("#tbodi>tfoot").empty();
                        let count = 1
                        let total = 0
                        $("#numSalida").html('N° ' + id)
                        for(var i = 0; i < origens.length; i++){
                            total += origens[i].quantity
                            $("#tbodi>tbody").append("<tr><td class='text-center'><h6>"+count+"</h6></td><td class='text-center'><h6>"+origens[i].refaccion.name+"</h6></td><td class='text-center'><h6>"+origens[i].quantity+"</h6></td></tr>");
                            count++
                        }
                        $("#tbodi>tfoot").append('<tr><td colspan="2"><h5 class="text-center font-weight-bold">TOTAL REFACCIONES CAMBIADAS</h5></td><td><h5 class="text-center">'+total+'</h5></td></tr>');
                    }
                });

            }

    }

{{--  $("#tbodi>tbody").append("<tr><td class='text-center'><h6>"+origens[i].i+"</h6></td><td class='text-center'><h6>"+origens[i]..refaccion.name+"</h6></td><td class='text-center'><h6>"+origens[i]..refaccion.name+"</h6></td></tr>");  --}}
</script>
@stop
