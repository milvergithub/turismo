@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Usuarios</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha de Registro</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": 'i18n/Spanish.json'
                },
                ajax: '{!! route('datos') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nombre_usuario', name: 'nombre_usuario' },
                    { data: 'apellido_paterno', name: 'apellido_paterno' },
                    { data: 'genero', name: 'genero' },
                    { data: 'email', name: 'email' },
                    { data: 'rol', name: 'rol' },
                    { data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush