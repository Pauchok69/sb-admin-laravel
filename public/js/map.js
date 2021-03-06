let geocoder;
let map;
let infoWindow;
let markersArr = [];

$(document).ready(function () {
    initMap();
    showMarkers(map);
});

$(document).on('submit', '#setMarker', function (evt) {
    evt.preventDefault();
    codeAddress();
});

$(document).on('click', '#clearAllMarkers', function (evt) {
    deleteAllMarkers();
});

/*******************************************************************************/

/* FUNCTIONS */

/**
 * Show all markers that existing in db.
 *
 * @param map
 */
function showMarkers(map) {
    if (markers === undefined) {
        return;
    }

    Array.prototype.forEach.call(markers, function (markerElem) {
        let latLng = new google.maps.LatLng(
            parseFloat(markerElem.lat),
            parseFloat(markerElem.lng)
        );

        let id      = markerElem.id;
        let name    = markerElem.name;
        let address = markerElem.address;
        let point   = latLng;

        let marker = showMarker(name, address, point);
        createMarkerInfoWindow(marker, name, address);
    });
}

/**
 * Initialize the Goggle Map
 */
function initMap() {
    geocoder       = new google.maps.Geocoder();
    infoWindow     = new google.maps.InfoWindow;
    let latlng     = new google.maps.LatLng(0, 0);
    let mapOptions = {
        zoom     : 2,
        center   : latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map            = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

/**
 * Create the marker when submitted.
 */
function codeAddress() {
    let input_address = document.getElementById('address').value;
    geocoder.geocode({'address': input_address}, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            let name    = input_address;
            let address = results[0].formatted_address;

            saveMarker(name, address, results[0].geometry.location);
        } else {
            showError('Geocode was not successful for the following reason: ' + status);
        }
    });
}

/**
 * Generate and show error.
 *
 * @param msg
 */
function showError(msg) {
    let alertBox = $('#alert');
    let html     =
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
            + '  <strong>Error!.</strong>'
            + '<p>' + msg + '</p>'
            + '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n'
            + '    <span aria-hidden="true">&times;</span>\n'
            + '  </button>\n'
            + '</div>';

    alertBox.empty().html(html);
    return;
}

/**
 * Create and initialize info window showing when click on the marker
 *
 * @param marker
 * @param name
 * @param address
 */
function createMarkerInfoWindow(marker, name, address) {
    let infowincontent = document.createElement('div');
    let strong         = document.createElement('strong');
    strong.textContent = name;
    infowincontent.appendChild(strong);
    infowincontent.appendChild(document.createElement('br'));

    let text         = document.createElement('text');
    text.textContent = address;
    infowincontent.appendChild(text);

    marker.addListener('click', function () {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
    });

    return;
}

/**
 * Show marker on map
 *
 * @param name
 * @param address
 * @param point
 * @returns {google.maps.Marker}
 */
function showMarker(name, address, point) {
    let marker = new google.maps.Marker({
        map     : map,
        position: point
    });
    markersArr.push(marker);

    return marker;
}

/**
 * Save markers to DB
 *
 * @param name
 * @param address
 * @param location
 */
function saveMarker(name, address, location) {
    let lat = location.lat();
    let lng = location.lng();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type    : 'POST',
        url     : '/map',
        data    : {
            'name'   : name,
            'address': address,
            'lat'    : lat,
            'lng'    : lng
        },
        dataType: 'json',
        success : function (data) {
            let marker = showMarker(name, address, location);
            createMarkerInfoWindow(marker, name, address);
        },
        error   : function (data) {
            console.log(data);
            showError(data.responseJSON.message);
        }
    });
}

/**
 * Init ajax for deleting markers from db and init clear markers from the map
 */
function deleteAllMarkers() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type    : 'DELETE',
        url     : '/map/all',
        dataType: 'json',
        success : function (data) {
            clearMarkers();
        },
        error   : function (data) {
            console.log(data);
            showError(data.responseJSON.message);
        }
    });
}

/**
 * Clear all markers from the nap
 */
function clearMarkers() {
    for (var i = 0; i < markersArr.length; i++) {
        markersArr[i].setMap(null);
    }
    markersArr.length = 0;
}