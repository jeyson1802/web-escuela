@extends('adminlte::page')
@section('title', 'Coders free')

@section('content_header')
    <h1>Role cadastrar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store']) !!}
             @include('admin.roles.partials.form')
            {!! Form::submit("Cadastrar Role", ["class"=>"btn btn-primary mt-2"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
