@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.createplace')</div>
                <div class="panel-body">
                    <div class="jumbotron how-to-create">
                        {!! Form::open(['route'=>[ 'blog.store',$model ], 'method' => 'POST', 'files'=>'true' , 'class' => '']) !!}

                        @if(App::getLocale() === 'es')
                            <div class="form-group {{ $errors->has('nombre_es') ? ' has-error' : '' }}">
                                {!!  htmlspecialchars_decode( Form::label('nombre_es','Nombre (es):', ['class' => '']) )!!}
                                <div class="">
                                    {!! Form::text('nombre_es',$model->nombre_es, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                                    @if ($errors->has('nombre_es'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('nombre_es') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                {!!  htmlspecialchars_decode( Form::label('nombre','Name (en) :', ['class' => '']) )!!}
                                <div class="">
                                    {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'Name']) !!}
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="form-group{{  $errors->first('file') ? ' has-error' : '' }}">
                            <div class="file-loading">
                                <input id="file-lugares" name="file[]" type="file" multiple>
                            </div>
                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                        @if(App::getLocale() === 'es')
                            <div class="form-group{{  $errors->first('descripcion_es') ? ' has-error' : '' }}">
                                {!!  htmlspecialchars_decode( Form::label('descripcion_es','Descripcion (es):', ['class' => 'control-label']) )!!}
                                <div class="">
                                    {!! Form::textarea('descripcion_es',$model->descripcion_es, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                                    @if ($errors->has('descripcion_es'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('descripcion_es') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                                {!!  htmlspecialchars_decode( Form::label('descripcion','Descritcion (en):', ['class' => 'control-label']) )!!}
                                <div class="">
                                    {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Description']) !!}
                                    @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('resource.save')</button>
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