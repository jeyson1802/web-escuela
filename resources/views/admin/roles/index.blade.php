@extends('adminlte::page')
@section('title', 'Coders free - Roles')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>Atenção!</strong> {{session('info')}}
</div>
@endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.roles.create') }}">Cadastrar uma role</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2">#</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($roles as $role)
                       <tr>
                           <td>{{ $role->id }}</td>
                           <td>{{ $role->name }}</td>
                           <td width="10px"><a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">Editar</a></td>
                           <td width="10px"><form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                </td>
                       </tr>
                   @empty
                       <tr><td colspan="4">Nenhuma role registrado :)</td></tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
