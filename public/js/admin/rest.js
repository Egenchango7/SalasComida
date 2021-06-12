// FUNCTIONS
const updateInfoRest = (form) => {
    return Swal.fire({
        title: 'Está seguro de guardar los cambios?',
        position: 'top-end',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
        cancelButtonText: `Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Guardado',
                icon: 'success',
                timer: 500
            });
            $(form).append($('#divImg input[type="file"]'));
            $.ajax({
                url: $(form)[0].action,
                method: 'post',
                data: $(form).serialize(),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    fillInfoRest(response);
                }
            });
        }   
        return result.isConfirmed;
      })
}
const saveNewRest = () => {
    //ADD VALIDATION...
    let posNew = myMap.newMarker.getPosition();
    $('#marker').val(posNew);
    $('#formNewSalaComida').submit();
}
// EVENTS
$('select[name="listRest"]').on('change', function () {
    let idRest = $(this).val();
        rest = rests.find(r => r.id == idRest);
    switch (indexSection) {
        case 1: fillInfoRest(rest); break;
        case 2: 
            getTiposMenuByRest(idRest);
            // tipoMenu = $('.tipoMenu').val();
            fillTableMenu(idRest, 1); 
            break;
        case 3: 
            fillTablePlatos(`/platos/tipo/1/rest/${idRest}`);
            $('p select[name="tipoPlato"]').val(1);
            break;
    }
});
let isEdit = false;
$('#editSalaComida .btnGreen').on('click', async function () {
    if (!isEdit) {
        $('#editSalaComida input, textarea').removeAttr('readonly');
        $(this).css('background-color', colors.red);
        $('#permisos .material-icons-round').hide();
        $('#permisos input').removeAttr('hidden');
        $('#divImg .btnGreen').css('display','flex');
        isEdit = !isEdit;
    } else {
        let isSaved = await updateInfoRest('#editSalaComida');
        if (isSaved) {
            $('#editSalaComida input, textarea').attr('readonly','true');
            $(this).css('background-color', colors.green);
            $('#permisos .material-icons-round').show();
            $('#permisos input').attr('hidden', 'true');
            $('#divImg .btnGreen').css('display','none');
            isEdit = !isEdit;
        }
    }
});
let isNewMarker = false;
$('#map + .btnRed').on('click', function (e) {
    if (!isNewMarker) {
        $(this).css('background-color', 'var(--myGreen)');
        $(this).find('span').text('Guardar');
        myMap.addMarker(myMap.map,myMap.map.getCenter(),true);
    } else {
        saveNewRest();
    }
    isNewMarker = !isNewMarker;
});
$('#changeImg').on('change', function () {
    let img = $(this)[0].files[0],
        src = URL.createObjectURL(img);
    $('#divImg img')[0].src = src;
});