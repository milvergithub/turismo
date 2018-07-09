@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <legend>Lista de Roles</legend>
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <th>Nombre rol</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="/roles/{{$role->id}}/edit">Editar <span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection