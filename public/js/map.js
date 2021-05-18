function initMap() {
    myMap.myLocation().then((pos) => {
        let myLatLng = { lat: pos.latitude, lng: pos.longitude };
        let zoom =  isMediumWindow ? 17 : 16;
        let map = new google.maps.Map(document.getElementById("map"), {
            zoom: zoom,
            center: myLatLng,
            disableDefaultUI: true,
            styles: [
                {
                    "featureType": "poi",
                    "stylers": [
                        { "visibility": "off" }
                    ]
                }
            ]
        });
        myMap.map = map;
        $.ajax({
            url: "/locations",
            success: function (response) {
                let jsonLocations = JSON.parse(response);
                jsonLocations.map((location) => {
                    let rest = location.rest;
                    let ll = {
                        lat: Number(location.lat),
                        lng: Number(location.lng),
                        title: rest.nombre
                    };
                    myMap.addMarker(map, ll).then((marker) => {
                        myMap.markers.push({
                            'id': location.id,
                            'idRest': rest.id, 
                            'marker': marker, 
                            'selected': false
                        });
                        myMap.addEvent(marker,location,rest);             
                    });
                });
            }
        });
    });
}
