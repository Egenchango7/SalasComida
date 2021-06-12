// FUNCTIONS
const showDetalle = (numDetalle, idRest, tipoMenu) => {
    let detalles = {
        1: { div: 'detalleMenu', text: 'Ver detalle', icon: 'menu_book' },
        2: { div: 'detallePlatos', text: 'Platos a la carta', icon: 'dinner_dining' },
        3: { div: 'detallePostres', text: 'Postres', icon: 'cake' } 
    };
    $('#detalleOptionRest h1').text(detalles[numDetalle].text);
    $('#detalleRight > div:not(".scrollBar")').css('display','none');
    if (numDetalle != 1) {
        let url = `/platos/tipo/${Number(numDetalle) + 1}/rest/${idRest}`;
        fillTablePlatos(url);
    } else {
        getTiposMenuByRest(idRest);
        fillTableMenu(idRest, tipoMenu, false);
    }
    $('.fondoModal').css('bottom', 0);
    $('#' + detalles[numDetalle].div).css('display','block');
    $('#detalleRight .material-icons-round').text(detalles[numDetalle].icon);
    setTimeout(() => {
            $('#optionsRest button').css('z-index', 3);
    }, 700);
}