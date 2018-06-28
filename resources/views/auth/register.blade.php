@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('home.register')</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('usuario.name')</label>

                            <div class="col-md-6">
                                <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required autofocus>

                                @if ($errors->has('nombre_usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('usuario.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contrasenia') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('usuario.password')</label>

                            <div class="col-md-6">
                                <input id="contrasenia" type="password" class="form-control" name="contrasenia" required>

                                @if ($errors->has('contrasenia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contrasenia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">@lang('usuario.confirmpassword')</label>

                            <div class="col-md-6">
                                <input id="contrasenia-confirm" type="password" class="form-control" name="contrasenia_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('usuario.send')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
