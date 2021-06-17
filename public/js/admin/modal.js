$('.divForm + .btnAdd .material-icons-round').on('click', function (e) {
    $('.fondoModal').css('bottom', 0);    
});
$('#btnHideDetalle').on('click', function (e) { 
    $('.fondoModal').css('bottom', '-100vh');    
    $('#map + .btnRed').css('background-color', '#ea4335');
    $('#map + .btnRed span').text('Agregar');
});
$('#fotoRest').on('change', function () {
    let pathFile = $(this).val(),
        nameFile = pathFile.substr(pathFile.lastIndexOf('\\') + 1),
        span = $(this).parent().find('.btnGreen span:not(".material-icons-round")');
    if (nameFile != '') {
        span.text('');
        $('#nameFile').css('width', '65%');
    } else {
        span.text('Seleccionar');
        $('#nameFile').css('width', 0);
    }
    $('#nameFile').val(nameFile);
});