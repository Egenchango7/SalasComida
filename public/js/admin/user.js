const updateTableUser = () => {
    $.ajax({
        url: "usuario/list",
        success: function (response) {
            let jsonUser = JSON.parse(response);
            Rows = '';
            jsonUser.map((u)=>{
                Rows += '<tr onclick="selectRow(this)">' + 
                            '<td class="idRow">' + u.id + '</td>' +
                            '<td>' + u.nombre + '</td>' +
                            '<td>' + u.cargo + '</td>' +
                            '<td>' + u.username + '</td>' +                            
                            '<td><input type="password" value="' + u.pwd + '"></td>' +
                        '<tr>';
            $('.rows table').html(Rows);
            })
        }
    });
}
$('#formNewUser .btnSave').on('click', function () {
    let form = 'formNewUser';
    updateInfo(form);

});
$('#editUser .btnEdit').on('click', async function () {
    if (!isEdit) {
        toggleEditMode(isEdit);
    } else {
        let isSaved = await updateInfo('editUser');
        if (isSaved) {
            toggleEditMode(isEdit);
        }
    }
});