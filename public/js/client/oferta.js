$('#btnOfertas').on('click', function (e) { 
    let right = $('#divOfertas').css('right');
    $('#divOfertas').css('right', (right == '0px' ? '-30%' : 0));    
});
hoverScroll('#contentOfertas');