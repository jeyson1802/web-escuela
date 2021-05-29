@extends('adminlte::page')
@section('title', 'Coders free')

@section('content_header')
    <h1>Cursos pendente de aprovação</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td><a href="">Revizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="center">
                            {{ $courses->links('vendor.pagination.bootstrap-4')}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop
