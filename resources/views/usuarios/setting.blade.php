@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Editar cuenta {!! $model->nombre_usuario !!}</div>

                <div class="panel-body col-sm-10 col-sm-offset-1">
                    {!! Form::open( ['route' => ['usuario.updatedata',$model],'method' =>'PUT', 'class' => 'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                        <label for="nombre" class="control-label col-sm-4">@lang('resource.name')</label>
                        <div class="col-sm-8">
                            {!! Form::text('nombre_usuario',$model->nombre_usuario, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                            @if ($errors->has('nombre_usuario'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
                        <label for="apellido_paterno" class="control-label col-sm-4">@lang('resource.lastname')</label>
                        <div class="col-sm-8">
                            {!! Form::text('apellido_paterno',$model->apellido_paterno, ['class'=>'form-control','placeholder'=>'Apellido paterno']) !!}
                            @if ($errors->has('apellido_paterno'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{  $errors->first('email') ? ' has-error' : '' }}" >
                        <label for="email" class="control-label col-sm-4">@lang('resource.email')</label>
                        <div class="col-sm-8">
                            {!! Form::text('email',$model->email, ['class'=>'form-control','placeholder'=>'ejemplo@gmail.com']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="genero" class="control-label col-sm-4">@lang('resource.gender')</label>
                        <div class="col-sm-8">
                            {{ Form::select('genero', \App\User::getGeneros(),$model->genero,
                            array(  'class' => 'chosen-select form-control',
                                    'data-placeholder' => ' .. Selecciona...',
                                    'tabindex' => '2',
                                    'id'=>'genero'
                            ))
                        }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary pull-right" type="submit">@lang('resource.update')</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
</div>
@endsection
