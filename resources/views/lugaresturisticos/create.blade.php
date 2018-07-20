@extends('layouts.admin')
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8vPUF8KLTt3i839_lF9qoDfdDIlvp7aA&libraries=places&callback=initMap"
        async defer></script>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Lugar Turistico</div>

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
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13
            });
            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input'));


            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
// User entered the name of a Place that was not suggested and
// pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

// If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));

                $('#latitud').val(place.geometry.location.lat())
                $('#longitud').val(place.geometry.location.lng())
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

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                radioButton.addEventListener('click', function () {
                    autocomplete.setTypes(types);
                });
            }

        }
    </script>

@endpush