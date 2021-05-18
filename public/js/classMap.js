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
    addMarker(map, pos) {
        return new Promise((resolve, reject) => {
            let marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: pos.title,
                icon: urlIcon // https://i.postimg.cc/L6rY4Vwm/marker2-copia.png
            });
            resolve(marker);
        });
    }
    addEvent(marker,location,rest) {
        marker.addListener("click", () => {
            $('#divRest').css('left', 0);
            $('#divRest').css('transition', '1s');
            $('#infoRest h1').text(rest.nombre);
            $('#infoRest p').text(rest.desc);
            marker.setIcon(biggerIcon);
            myMap.markers.find((m) => m.id == location.id).selected = true;
            let anotherSelected = myMap.markers.find((m) => m.selected && m.id != location.id);
            if (anotherSelected) {
                anotherSelected.marker.setIcon(urlIcon);
                anotherSelected.selected = false;
            }
        });
    }
}