// FUNCTIONS

// EVENTS
$('p select[name="tipoPlato"]').on('change', function () {
    let tipo = $(this).val(),
        idRest = $(`${idSection} select[name="listRest"]`).val();
        url = `/platos/tipo/${tipo}/rest/${idRest}`;
    fillTablePlatos(url);
});
$('#formNewPlato .btnSave').on('click', function () {
    let idRest = $(`${idSection} select[name="listRest"]`).val(),
        formName = 'formNewPlato',
        inputRest = `<input type="text" name="listRest" value="${idRest}" hidden>`;
    $(`#${formName}`).append(inputRest);
    updateInfo('formNewPlato');
});
$('#editPlato .btnEdit').on('click', async function () {
    if (!isEdit) {
        toggleEditMode(isEdit);
    } else {
        let isSaved = await updateInfo('editPlato');
        if (isSaved) {
            toggleEditMode(isEdit);
        }
    }
});