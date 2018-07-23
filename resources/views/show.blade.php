@extends('layouts.site')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.showplace')</div>

                <div class="panel-body">
                    <div class="form-group">
                        {{$model->nombre}}
                    </div>
                    <div class="form-group">
                        @if(count($fotoLugares) > 0)
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
                                            <img src="{{$fotolugar->getUrl()}}" class="img img-responsive" width="100%"
                                                 alt="...">
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
                        @endif
                    </div>
                    <div class="form-group">
                        <div style="width: 100%; height: 500px;">
                            {!! Mapper::render() !!}
                        </div>
                    </div>
                    <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                        {{$model->descripcion}}
                        <input type="hidden" id="placeLugarId" value="{{$model->id}}">
                    </div>
                    <div class="form-group">
                        <button class="helpbutton" id="visitPlaceButton"><span
                                    class="glyphicon glyphicon-road"></span> @lang('resource.visit')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('#visitPlaceButton').click(function () {
            if (navigator.geolocation) {
                $.blockUI({
                    css: {
                        border: 'none'
                    },
                    message: `
                    <div class="preloader">
                        <div class="loader">
                            <div class="loader1">
                                <div class="loader2">
                                    <div class="loader3">
                                        <div class="loader4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                });
                navigator.geolocation.getCurrentPosition(function (position) {
                    window.location = '/roadmap/' + $('#placeLugarId').val() + '/latitude/' + position.coords.latitude + '/longitude/' + position.coords.longitude;
                }, function () {
                    alert('ERROR...')
                });
            }
        });
    </script>
@endpush

