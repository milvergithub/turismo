@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Editar cuenta {!! $model->nombre_usuario !!}</div>

                <div class="panel-body">
                    {!! Form::open( ['route' => ['usuario.update',$model],'method' =>'PUT']) !!}

                    <div class="form-group{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('nombre','Nombre : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                        {!! Form::text('nombre_usuario',$model->nombre_usuario, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                        @if ($errors->has('nombre_usuario'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!!  Form::label('Apellidos','Apellido Paterno ') !!}
                        {!! Form::text('apellido_paterno',$model->apellidos, ['class'=>'form-control','placeholder'=>'Apellido paterno']) !!}

                    </div>

                    <div class="form-group{{  $errors->first('email') ? ' has-error' : '' }}" >
                        {!!  htmlspecialchars_decode( Form::label('nombre','Email : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                        {!! Form::text('email',$model->email, ['class'=>'form-control','placeholder'=>'ejemplo@gmail.com']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">

                        {{ Form::label('Genero', 'Genero') }}
                        {{ Form::select('genero', \App\User::getGeneros(),$model->genero,
                            array(  'class' => 'chosen-select form-control',
                                    'data-placeholder' => ' .. Selecciona...',
                                    'tabindex' => '2',
                                    'id'=>'genero'
                            ))
                        }}
                    </div>

                    <div  class="form-group">
                        {{ Form::label('Rol', 'Rol') }}
                        {{ Form::select('rol', \App\User::getRoles(),$model->rol,
                            array(  'class' => 'chosen-select form-control',
                                    'data-placeholder' => 'Selecciona...',
                                    'tabindex' => '2',
                                    'id'=>'rol_id'
                            ))
                        }}
                    </div>
                    <div class="form-group">

                        {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
</div>
@endsection
