@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group">
            <a href="{{ route('lugaresturisticos.create') }}" class="btn btn-info"> Nuevo</a>
        </div>
        <div class="panel panel-default">
                <div class="panel-heading">Lista de Lugares Turisticos</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="lugar-table">
                        <thead>
                        <tr>
                            <th width="5%">@lang('resource.id')</th>
                            <th>@lang('resource.name')</th>
                            <th>@lang('resource.description')</th>
                            <th>@lang('resource.action')</th>
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
                responsive: true,
                processing: true,
                serverSide: true,
                language: {
                    "url": 'i18n/'+$('#language_value').val()+'.json'
                },
                ajax: '{!! route('datostudisticos') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nombre'+ $('#language_val').val(), name: 'nombre' },
                    { data: 'descripcion'+ $('#language_val').val(), name: 'descripcion' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>
@endpush