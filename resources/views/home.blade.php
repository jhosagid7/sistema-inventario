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
                    <table class="table table-bordered table-striped refaccions_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Alert</th>
                                <th scope="col">Acciones</th>
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'stock',
                    name: 'stock',
                },
                {
                    data: 'alerts',
                    name: 'alerts',
                },
                {
                    data: 'actions',
                    name: 'actions',
                    searchable: false,
                    orderable: false
                }
            ],
        })
    })
</script>


@stop
