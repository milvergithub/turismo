@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.placelist')</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="message-table">
                        <thead>
                        <tr>
                            <th width="5%">@lang('resource.id')</th>
                            <th>@lang('resource.name')</th>
                            <th>@lang('resource.subject')</th>
                            <th>@lang('resource.phone')</th>
                            <th>@lang('resource.message')</th>
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
            $('#message-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                language: {
                    "url": 'i18n/'+$('#language_value').val()+'.json'
                },
                ajax: '{!! route('datosmessages') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'subject', name: 'subject' },
                    {data: 'phone', name: 'phone'},
                    {data: 'message', name: 'message'},

                ]
            });
        });
    </script>
@endpush