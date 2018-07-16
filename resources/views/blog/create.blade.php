@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Lugar Turistico</div>
                <div class="panel-body">
                    <div class="jumbotron how-to-create">
                        {!! Form::open(['route'=>[ 'blog.store',$model ], 'method' => 'POST', 'files'=>'true' , 'class' => '']) !!}
                        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('nombre','Nombre :', ['class' => '']) )!!}
                            <div class="">
                                {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="file-lugares" name="file[]" type="file" multiple>
                            </div>
                        </div>
                        <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('descripcion','Descripcion :', ['class' => 'control-label']) )!!}
                            <div class="">
                                {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#file-lugares').fileinput({
            theme: 'fa',
            language: 'es',
            uploadUrl: '#',
            showAjaxErrorDetails: false,
            allowedFileExtensions: ['jpg', 'png', 'gif']
        });
    </script>
@endpush