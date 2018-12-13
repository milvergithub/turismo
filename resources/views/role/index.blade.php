@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <legend>@lang('place.rolelist')</legend>
        <table class="table table-bordered">
            <tr>
                <th>@lang('resource.name')</th>
                <th>@lang('resource.namerole')</th>
                <th>@lang('resource.description')</th>
                <th>@lang('resource.action')</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="/roles/{{$role->id}}/edit">@lang('resource.edit') <span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection