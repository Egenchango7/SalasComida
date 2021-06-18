// VAR
let isEdit = isNewMarker = isChangeImg = false;
// FUNCTIONS
const saveNewRest = () => {
    //ADD VALIDATION...
    let posNew = myMap.newMarker.getPosition();
    $('#marker').val(posNew);
    $('#formNewSalaComida').submit();
}
// EVENTS
$('select[name="listRest"]').on('change', async function () {
    let idRest = $(this).val();
        rest = rests.find(r => r.id == idRest);
    switch (indexSection) {
        case 1: fillInfoRest(rest); break;
        case 2: 
            refreshMenu(idRest,1)
            break;
        case 3: 
            fillTablePlatos(`/platos/tipo/1/rest/${idRest}`);
            $('p select[name="tipoPlato"]').val(1);
            break;
    }
});
$('#editSalaComida .btnGreen').on('click', async function () {
    if (!isEdit) {
        toggleEditMode(isEdit);
    } else {
        let isSaved = await updateInfo('editSalaComida',indexSection);
        if (isSaved) {
            toggleEditMode(isEdit);
        }
    }
});
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
    isChangeImg = true;
    let img = $(this)[0].files[0],
        src = URL.createObjectURL(img);
    $(`${idSection} img`)[0].src = src;
});