@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('blog.list')</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="users-table" width="100%">
                        <thead>
                        <tr>
                            <th>@lang('resource.id')</th>
                            <th>@lang('resource.name')</th>
                            <th>@lang('resource.description')</th>
                            <th>@lang('resource.date')</th>
                            <th>@lang('resource.datecreated')</th>
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
            $('#users-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                language: {
                    "url": 'i18n/'+$('#language_value').val()+'.json'
                },
                ajax: '{!! route('blogs') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nombre' + $('#language_val').val(), name: 'nombre' },
                    { data: 'descripcion'+ $('#language_val').val(), name: 'descripcion' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush