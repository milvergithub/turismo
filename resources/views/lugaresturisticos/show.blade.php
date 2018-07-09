@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar Lugar Turistico </div>

                <div class="panel-body">
                    {!! Form::open( ['route' => ['lugaresturisticos.store',$model],'method' =>'POST']) !!}

                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('nombre','Nombre : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                        {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('latitud') ? ' has-error' : '' }}">
                          {!! Form::hidden('latitud',$model->latitud, ['class'=>'form-control','placeholder'=>'latitud', 'id' => 'latitud']) !!}
                        @if ($errors->has('latitud'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('latitud') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('longitud') ? ' has-error' : '' }}">
                         {!! Form::hidden('longitud',$model->longitud, ['class'=>'form-control','placeholder'=>'longitud','id' => 'longitud']) !!}
                        @if ($errors->has('longitud'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('longitud') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group" style="width: 100%;">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach($fotos as $fotolugares)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$contador}}" class="{{$contadoractive}}"></li>
                                @endforeach

                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @foreach($fotos as $fotolugar)
                                    <div class="item {{ $yourVar }}">
                                        <img src="{{$fotolugar->getUrl()}}" class="img img-responsive" width="100%" alt="...">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                    {{ $yourVar = '' }}
                                @endforeach
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>



                  <div class="form-group">
                      <div style="width: 100%; height: 500px;">
                          {!! Mapper::render() !!}
                        </div>
                    </div>

                    <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}" >
                        {!!  htmlspecialchars_decode( Form::label('nombre','Descripcion : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                        {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                        @endif
                    </div>


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
</div>

@endsection

@push('scripts')
@endpush

