$('#btnHideRest').on('click', function (e) { 
    $('#divRest').css('left', '-35%');
    let ms = myMap.markers.find((m) => m.selected);
    ms.selected = false;
    ms.marker.setIcon(urlIcon);
});
$('#optionsRest button').on('click', function (e) {     
    let numOption = $(this).val(),
        optionSelected = $(this).text();
    $('#detalleOptionRest h1').text(optionSelected);
    $('#detalleRight > div').css('display','none');
    let divs = {
        1: 'detalleMenu',
        2: 'detallePlatos',
        3: 'detallePostres'
    },
    icons = {
        1: 'menu_book',
        2: 'dinner_dining',
        3: 'cake'
    }
    divShow = divs[numOption];
    iconShow = icons[numOption];   
    $('.fondoModal').css('bottom', 0);
    $('#' + divShow).css('display','block');
    $('#detalleRight .material-icons-round').text(iconShow);
    // SET DATA REST...
    setTimeout(() => {
            $('#optionsRest button').css('z-index', 2);
    }, 700);
});
$('#btnHideDetalle').on('click', function (e) { 
    $('#optionsRest button').css('z-index', 0);
    setTimeout(() => {
        $('.fondoModal').css('bottom', '-100vh');
    }, 200);
});