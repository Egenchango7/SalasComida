$('#btnHideRest').click(function (e) { 
    $('#divRest').css('left', '-35%');
    let ms = myMap.markers.find((m) => m.selected);
    ms.selected = false;
    ms.marker.setIcon(urlIcon);
});
$('#optionsRest button').click(function (e) {     
    let numOption = $(this).val();
    let optionSelected = $(this).text();
    $('#detalleOptionRest h1').text(optionSelected);
    $('#detalleRight > div').css('display','none');
    let divShow = (numOption == 1 ? 'detalleMenu' : (numOption == 2 ? 'detallePlatos' : 'detallePostres'));
    $('#' + divShow).css('display','block');
    $('.fondoModal').css('bottom', 0);
    setTimeout(() => {
        $('#optionsRest button').css('z-index', 2);
    }, 400);
});
$('#btnHideDetalle').click(function (e) { 
    $('#optionsRest button').css('z-index', 0);
    setTimeout(() => {
        $('.fondoModal').css('bottom', '-100vh');
    }, 200);
});