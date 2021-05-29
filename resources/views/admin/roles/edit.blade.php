@extends('adminlte::page')
@section('title', 'Coders free')

@section('content_header')
    <h1>Editar Role {{ $role->name}}</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role,['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}
             @include('admin.roles.partials.form')
            {!! Form::submit("Editar Role", ["class"=>"btn btn-primary mt-2"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop