@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <a href="{{ route('lugaresturisticos.create') }}" class="btn btn-info"> @lang('resource.new')</a>
        <div class="panel panel-default">
                <div class="panel-heading">Lista de Lugares Turisticos</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="lugar-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>@lang('home.place')Nombre</th>
                            <th>Descripcion</th>
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
            $('#lugar-table').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": 'i18n/'+$('#language_value').val()+'.json'
                },
                ajax: '{!! route('datostudisticos') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'descripcion', name: 'descripcion' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>
@endpush