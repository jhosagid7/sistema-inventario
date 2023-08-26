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
                                <th class="text-center" scope="col">Status</th>
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
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    className: 'text-center'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    className: 'text-center',
                    searchable: false,
                    orderable: false
                }
            ],
        })
    })
</script>


@stop
