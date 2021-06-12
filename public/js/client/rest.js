// FUNCTIONS
const showDivRest = (idLocation,rest,tipo) => {
    $('#divRest').css('left', 0);
    $('#divRest').css('transition', '1s');
    $('#infoRest h1').text(rest.nombre);
    fillInfoRest(rest);
    fillTableMenu(rest.id, 1, true);
    let mk = myMap.markers.find(m => m.id == idLocation);
    mk.selected = true;
    mk.marker.setIcon(biggerIcon);
    myMap.restSelected = rest;
    let anotherSelected = myMap.markers.find(m => m.selected && m.id != idLocation);
    if (anotherSelected) {
        anotherSelected.marker.setIcon(urlIcon);
        anotherSelected.selected = false;
    }
}
const fillInfoRest = (rest) => {
    $('.descRest').text(rest.descripcion);
    $('.fonoRest').text(rest.telefono);
    $('.dirRest').text(rest.direccion);
    $('.descRest').val(rest.descripcion);
    $('.fonoRest').val(rest.telefono);
    $('.dirRest').val(rest.direccion);
    $('.srcImgRest')[0].src = `img/${rest.foto}`;
    let icon = $('#permisos').find('.material-icons-round');
    icon.css('color', iconPermisos[(rest.permisos ? 1 : 0)].color);
    icon.text(iconPermisos[(rest.permisos ? 1 : 0)].text);
}
hoverScroll('.divRest');
// EVENTS
$('#contentRest .listDiv').on('click', function () {
    let idRest = $(this).find('span').text(),
        idLocation = myMap.markers.find(l => l.idRest == idRest).id,
        rest = rests.find(r => r.id == idRest);
    showDivRest(idLocation,rest);
});
$('#btnHideRest').on('click', function (e) { 
    $('#divRest').css('left', '-35%');
    // $('#contentRest .scrollBar').css('z-index', 0);
    let ms = myMap.markers.find(m => m.selected);
    ms.selected = false;
    ms.marker.setIcon(urlIcon);
});
$('#optionsRest button').on('click', function (e) {
    showDetalle($(this).val(),myMap.restSelected.id,1);
});
$('#btnHideDetalle').on('click', function (e) { 
    $('#optionsRest button').css('z-index', 0);
    setTimeout(() => {
        $('.fondoModal').css('bottom', '-100vh');
    }, 200);
});