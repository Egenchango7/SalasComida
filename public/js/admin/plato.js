// EVENTS
$('p select[name="tipoPlato"]').on('change', function () {
    let tipo = $(this).val(),
        idRest =$(this).parent().parent().find('select[name="listRest"]').val();
        url = `/platos/tipo/${tipo}/rest/${idRest}`;
    fillTablePlatos(url);
});
$('.btnSave').on('click', function () {
    let form = '#formNewPlato';
    let idRest = $(`${idSection} select[name="listRest"]`).val();
    $('#idRestPlato').val(idRest);
    $.ajax({
        url: $(form)[0].action,
        method: 'post',
        data: $(form).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
            let jsonPlato = JSON.parse(response),
            url = `/platos/tipo/${jsonPlato['tipoPlato']}/rest/${jsonPlato['idRest']}`;
            fillTablePlatos(url);
            $('p select[name="tipoPlato"]').val(jsonPlato['tipoPlato']);
            $(`${form} input`).val('');
            $('td select[name="tipoPlato"]').val(1);
        }
    });
});