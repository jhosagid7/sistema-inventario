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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4-4.6.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/r-2.5.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/r-2.5.0/sl-1.7.0/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{ asset('plugins/nicescroll/nicescroll.js')}}"></script>
<script src="{{ asset('plugins/currency/currency.js')}}"></script>

<script>
    function noty(msg, option = 1)
    {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'CERRAR',
            actionTextColor: '#fff',
            backgroundColor: option == 1 ? '#3b3f5c' : '#e7515a',
            pos: 'top-right'
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('global-msg', msg => {
            noty(msg)
        });
    })

    // cuando la modal se haya cargado, ponemos focus en el input search
    $('#modalSearchProduct').on('shown.bs.modal', function() {
    $('#modal-search-input').focus();
    })


</script>



<script src="{{ asset('plugins/flatpickr/flatpickr.js')}}"></script>


@livewireScripts
    <script>
        $(function() {



            const languages = {
                'es': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn btn-sm'
            })
            $.extend(true, $.fn.dataTable.defaults, {
                responsive: true,
                language: {
                    url: languages['es']
                },
                pageLength: 5,
                dom: 'lBfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'btn-light',
                        text: 'Copiar',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-light',
                        text: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-light',
                        text: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-light',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-light',
                        text: 'Imprimir',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-light',
                        text: 'Visibilidad Columnas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });
        });
    </script>

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
