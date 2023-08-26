@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Refacciones </h1>
@stop

@section('content')

@stop

@section('css')
    @include('layouts.theme.styles')
@stop

@section('js')
    @include('layouts.theme.scripts')
    @livewireScripts
@stop
