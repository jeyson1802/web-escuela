@extends('adminlte::page')
@section('title', 'Coders free - Roles')

@section('content_header')
    <h1>Lista de users</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>Atenção!</strong> {{session('info')}}
</div>
@endif
    @livewire('admin-users')
@stop