// FUNCTIONS
hoverScroll('#divOfertas');
// EVENTS
$('#btnOfertas').on('click', function (e) { 
    let right = $('#divOfertas').css('right');
    $('#divOfertas').css('right', (right == '0px' ? '-30%' : 0));    
});
$('.listDiv .btnRed').on('click', function () {
    let idRest = $(this).val().substr(0,4),
        location = myMap.markers.find(l => l.idRest == idRest),
        tipoMenu = $(this).val().substr(5);
        rest = rests.find(r => r.id == idRest);
    showDivRest(location.id,rest);
    showDetalle(1,idRest,tipoMenu); 
});