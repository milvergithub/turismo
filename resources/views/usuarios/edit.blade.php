@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario <strong>{!! $model->nombre_usuario !!}</strong></div>
                <div class="panel-body">
                    {!! Form::open( ['route' => ['usuario.update',$model],'method' =>'PUT', 'class' => 'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-3">Nombre</label>
                        <div class="col-sm-7">
                            {!! Form::text('nombre_usuario',$model->nombre_usuario, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                            @if ($errors->has('nombre_usuario'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nombre_usuario') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Apellido Paterno</label>
                        <div class="col-sm-7">
                            {!! Form::text('apellido_paterno',$model->apellidos, ['class'=>'form-control','placeholder'=>'Apellido paterno']) !!}
                        </div>
                    </div>
                    <div class="form-group{{  $errors->first('email') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-7">
                            {!! Form::text('email',$model->email, ['class'=>'form-control','placeholder'=>'ejemplo@gmail.com']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Genero</label>
                        <div class="col-sm-7">
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
                        <label class="col-sm-3 control-label">Rol</label>
                        <div class="col-sm-7">
                            {{ Form::select('rol', \App\User::getRoles(),$model->rol,
                            array(  'class' => 'chosen-select form-control',
                                    'data-placeholder' => 'Selecciona...',
                                    'tabindex' => '2',
                                    'id'=>'rol_id'
                            ))
                        }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-7">{!! Form::submit('Registrar',['class' => 'btn btn-primary pull-right']) !!}</div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
