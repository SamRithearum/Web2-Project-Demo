var map;
var marker;
function initMap() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 11.61789,
            lng: 104.926513
        },
        zoom: 15,
        clickableIcons: false,
        mapTypeId: 'roadmap'
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    listenToPlaceChanged(input)

    // Bias the SearchBox results towards current map's viewport.
    // map.addListener('bounds_changed', function() {
    //     searchBox.setBounds(map.getBounds());
    // });


    if ($('#coordinates-show').text() != $('#coordinates-hide').val()) {
        const coordinates = $('#coordinates-hide').val().split(',');
        var pos = {
            lat: parseFloat(coordinates[0]),
            lng: parseFloat(coordinates[1])
        };
        map.setCenter(pos);
        setMarker(pos);
    }
    map.addListener('click', function(e) {
        const latLng = e.latLng.toJSON();
        setMarker(latLng);

    });
}
function setMarker(latLng) {
    if (!marker) {
        marker = new google.maps.Marker(
        {
            position: latLng,
            draggable: true,
            map: map
        });
        marker.addListener('drag', function(e) {
            showCoordinates(e.latLng.toJSON());
        });
    }
    marker.setPosition(latLng);
    showCoordinates(latLng);
}
function showCoordinates(latLng) {
    $('#coordinates-show').text("Latitude: " + latLng.lat + ", Longitude: " + latLng.lng);
    $('#coordinates-hide').val(latLng.lat + ',' + latLng.lng);
}

function listenToPlaceChanged(input) {
    var searchBox = new google.maps.places.SearchBox(input);
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                return;
            }
            console.log(place.geometry.location);
            self.setMarker(place.geometry.location.toJSON())
            // var icon = {
            //     url: place.icon,
            //     size: new google.maps.Size(71, 71),
            //     origin: new google.maps.Point(0, 0),
            //     anchor: new google.maps.Point(17, 34),
            //     scaledSize: new google.maps.Size(25, 25)
            // };
            //
            // // Create a marker for each place.
            // markers.push(new google.maps.Marker({
            //     map: map,
            //     icon: icon,
            //     title: place.name,
            //     position: place.geometry.location
            // }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });

}
