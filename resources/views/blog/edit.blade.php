@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.createplace')</div>
                <div class="panel-body">
                    <div class="jumbotron how-to-create">
                        {!! Form::open(['route'=>[ 'blog.update',$blog ], 'method' => 'PUT', 'files'=>'true' , 'class' => '']) !!}

                        <div class="form-group {{ $errors->has('nombre_es') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('nombre_es','Nombre (es):', ['class' => '']) )!!}
                            <div class="">
                                {!! Form::text('nombre_es',$blog->nombre_es, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                                @if ($errors->has('nombre_es'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nombre_es') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('nombre','Name (en) :', ['class' => '']) )!!}
                            <div class="">
                                {!! Form::text('nombre',$blog->nombre, ['class'=>'form-control','placeholder'=>'Name']) !!}
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{  $errors->first('descripcion_es') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('descripcion_es','Descripcion (es):', ['class' => 'control-label']) )!!}
                            <div class="">
                                {!! Form::textarea('descripcion_es',$blog->descripcion_es, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                                @if ($errors->has('descripcion_es'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('descripcion_es') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('descripcion','Descritcion (en):', ['class' => 'control-label']) )!!}
                            <div class="">
                                {!! Form::textarea('descripcion',$blog->descripcion, ['class'=>'form-control','placeholder'=>'Description']) !!}
                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('resource.update')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush