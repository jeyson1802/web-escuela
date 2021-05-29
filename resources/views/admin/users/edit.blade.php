@extends('adminlte::page')
@section('title', 'Coders free')

@section('content_header')
    <h1>Editar {{ $user->name }}</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
        <h1 class="text-2xl">Nome:</h1>
        <p class="form-control">{{ $user->name }}</p>
        <h1 class="text-2xl">Email:</h1>
        <p class="form-control">{{ $user->email }}</p>
        <div class="form-group">
            {!! Form::password("password", ['class'=>'form-control']) !!}
        </div>
        <h1 class="h5">Lista de roles</h1>
        {!! Form::model($user,['route'=>['admin.users.update', $user], 'method'=>'PUT']) !!}
          @foreach ($roles as $role)
             <div>
                 <label>
                    {!! Form::checkbox("roles[]", $role->id, null, ['class'=>'mr-1']) !!}
                    {{ $role->name }}
                 </label>
             </div>
          @endforeach
          {!! Form::submit("Editar user", ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
  </div>
@stop
