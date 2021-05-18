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
    $('.fondoModal').css('bottom', 0);
});
$('#btnHideDetalle').click(function (e) { 
    $('.fondoModal').css('bottom', '-100vh');
});