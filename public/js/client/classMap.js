class Maps {
    markers = [];
    myLocation() {
        return new Promise((resolve, reject) => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((pos) =>
                    resolve(pos.coords)
                );
            } else {
                const error = new Error("Error");
                reject(error);
            }
        });
    }
    addMarker(map, pos, isNew) {
        return new Promise((resolve, reject) => {
            let marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: isNew,
                // title: pos.title,
                icon: isNew ? newMarkerIcon : urlIcon // https://i.postimg.cc/L6rY4Vwm/marker2-copia.png
            });
            if (isNew) this.newMarker = marker;
            resolve(marker);
        });
    }
    addEvent(marker,location,rest) {
        marker.addListener("click", () => {
            showDivRest(location.id,rest);
        });
        let infoWindow = new google.maps.InfoWindow({
            content: '<h3 style="padding: .5rem">' + rest.nombre + '</h3>'
        })
        marker.addListener('mouseover', function() {
            infoWindow.open(map, this);
        });
        marker.addListener('mouseout', function() {
            infoWindow.close();
        });
    }
}