@extends('layouts.site')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar Lugar Turistico</div>

                <div class="panel-body">
                    <div class="form-group">
                        {{$model->nombre}}
                    </div>
                    <div class="form-group">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($fotoLugares as $fotolugar)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$contador}}"
                                        class="{{$contadoractive}}"></li>
                                @endforeach

                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach($fotoLugares as $fotolugar)
                                    <div class="item {{ $yourVar }}">
                                        <img src="{{$fotolugar->getUrl()}}" class="img img-responsive" width="100%" alt="...">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    {{ $yourVar = '' }}
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="next">
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
                    <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                        {{$model->descripcion}}
                    </div>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')


@endpush

