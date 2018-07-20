@extends('layouts.admin')

@section('content')
    <div class="col-sm-10 col-sm-offset-1">
        <legend>Editar Role</legend>
        {!! Form::open( ['route' => ['roles.update',$role],'method' =>'PUT', 'class' => 'form-horizontal']) !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-sm-3">Rol</label>
            <div class="col-sm-7 form-control-static">
                <span class="">{{$role->name}}</span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-sm-3">Nombre</label>
            <div class="col-sm-7">
                {!! Form::text('Nombre',$role->display_name, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                @if ($errors->has('display_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('display_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label col-sm-3">Descripcion</label>
            <div class="col-sm-7">
                {!! Form::textarea('description',$role->description, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label col-sm-3">Permisos</label>
            <div class="col-sm-7">
                @foreach($permissions as $permission)
                    <div class="checkbox">
                        <label>
                            @if($permission->selected)
                                <input type="checkbox" name="permission[]" value="{{$permission->id}}" checked>{{$permission->display_name}}
                            @else
                                <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->display_name}}
                            @endif
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <button type="submit" class="btn btn-primary pull-right">@lang('resource.update')</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection