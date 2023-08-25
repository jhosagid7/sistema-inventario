@section('content_header')
    <h1>{{ $componentName }} </h1>
@stop

<div class="row layout-top-spacing">
    <div class="col-sm-12 col-md-8">
        {{--  DETAILS  --}}
        @include('livewire.outputs.partials.detail')
    </div>

    <div class="col-sm-12 col-md-4">
        {{--  SUMMARY  --}}
        @include('livewire.outputs.partials.summary')

        {{--  COMMENT  --}}
        @include('livewire.outputs.partials.comment')
    </div>
</div>

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
