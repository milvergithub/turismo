@extends('layouts.admin')
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8vPUF8KLTt3i839_lF9qoDfdDIlvp7aA&libraries=places&callback=initMap"
        async defer></script>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.createplace')</div>

                <div class="panel-body">
                    {!! Form::open( ['route' => ['lugaresturisticos.store',$model],'method' =>'POST']) !!}

                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('nombre','Name (en): ') )!!}
                        {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'name']) !!}
                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('nombre_es') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('nombre_es','Nombre (es): ') )!!}
                        {!! Form::text('nombre_es',$model->nombre, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nombre_es') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('latitud') ? ' has-error' : '' }}">
                        {!! Form::hidden('latitud',$model->nombre, ['class'=>'form-control','placeholder'=>'latitud', 'id' => 'latitud']) !!}
                    </div>

                    <div class="form-group{{ $errors->has('longitud') ? ' has-error' : '' }}">
                        {!! Form::hidden('longitud',$model->longitud, ['class'=>'form-control','placeholder'=>'longitud','id' => 'longitud']) !!}
                    </div>
                    <div class="form-group">
                        <input id="pac-input" class="form-control" type="text"
                               placeholder="Buscar Direcciones">
                        @if ($errors->has('longitud'))
                            <span class="help-block">
                                        <strong class="text-danger">Ingrese una lugar a registar</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div id="map" style="height: 350px;"></div>
                    </div>

                    <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('nombre','Description (en): ') )!!}
                        {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Description']) !!}
                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{  $errors->first('descripcion_es') ? ' has-error' : '' }}">
                        {!!  htmlspecialchars_decode( Form::label('descripcion_es','Descripcion (es): ') )!!}
                        {!! Form::textarea('descripcion_es',$model->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                        @if ($errors->has('descripcion_es'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('descripcion_es') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">@lang('resource.save')</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        var ICON_RED = '{!! asset('/img/map-red.png') !!}';
        var ICON_GREEN = '{!! asset('/img/map-green.png') !!}';
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:  -17.3937938, lng: -66.15696059999999},
                zoom: 13
            });
            var input = (document.getElementById('pac-input'));
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
            });
            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                streetViewAvailable(place.geometry.location);
                $('#latitud').val(place.geometry.location.lat());
                $('#longitud').val(place.geometry.location.lng());
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);
            });
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                radioButton.addEventListener('click', function () {
                    autocomplete.setTypes(types);
                });
            }

            function streetViewAvailable(latLng) {
                var gstService = new google.maps.StreetViewService();
                gstService.getPanorama({
                    location: latLng,
                    source: google.maps.StreetViewSource.OUTDOOR
                }, function (data, status) {
                    if (status === google.maps.StreetViewStatus.OK) {
                        console.log('STREET_VIEW');
                        marker.setIcon(ICON_GREEN)
                    } else {
                        console.log('NO_STREET_VIEW');
                        marker.setIcon(ICON_RED)
                    }
                });
            }

            google.maps.event.addListener(map,'click',function(event) {
                streetViewAvailable(event.latLng);
                marker.setPosition(event.latLng);
                $('#latitud').val(event.latLng.lat());
                $('#longitud').val(event.latLng.lng());
            });

            marker.addListener('click', function(event) {
            });
        }
    </script>

@endpush