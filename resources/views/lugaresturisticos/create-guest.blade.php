@extends('layouts.site')
@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8vPUF8KLTt3i839_lF9qoDfdDIlvp7aA&libraries=places&callback=initMap"
            async defer></script>
@endpush
@section('content')
    @include("lugaresturisticos.field")

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

                console.log('latitud', place.geometry.location.lat());
                console.log('longitud', place.geometry.location.lng());

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
        $('#file-lugares').fileinput({
            theme: 'fa',
            language: 'es',
            uploadUrl: '#',
            showAjaxErrorDetails: false,
            allowedFileExtensions: ['jpg', 'png', 'gif']
        });
    </script>

@endpush