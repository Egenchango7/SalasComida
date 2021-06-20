// VAR
let deletePlatoMenu = '<span class="material-icons-round" onclick="changePlatoMenu(this)">clear</span>';
// FUNCTIONS
const changePlatoMenu = async (icon) => {
    let td = $(icon).closest('tr').find('td:first-child'),
        tipoPlato = td.data('type'),
        pm = platosMenu[tipoPlato];
    if ($(icon).text() == 'add') {
        pm.num++;
        let select = $(`.newPlatoTipo${tipoPlato}`)[0].cloneNode(true);
        select.removeAttribute('hidden');
        let newInputPlato = `<tr>
                                <td data-type="${tipoPlato}"><input type="text" name="platosMenu[]" value="${pm.src[0].idPlato}" hidden></td>
                                <td class="itemMenu"></td>
                            </tr>`,
            tr = $(icon).closest('tr');
        tr.after(newInputPlato);
        tr.next().find('.itemMenu').append(select).append(deletePlatoMenu);
        pm.data.push(pm.src[0]);
    } else {
        pm.num--;
        $(icon).closest('tr').remove();
        let idPlato = td.find('input').val();
        pm.data = pm.data.filter(p => p.idPlato != idPlato);
    }
    checkMaxPlatos();
}
const updateSrcPlatos = async (idRest) => {
    let data = await fillTablePlatos(`/platos/tipo/0/rest/${idRest}`,true);
    platosMenu.src = data;
	platosMenu.new = [];
    $('.newPlatoTipo1, .newPlatoTipo2').html('');
    $('.tipoPlatoMenu').map(t => {
        let pm = platosMenu[(t+1)];
        pm.src = platosMenu.src.filter(p => p.idTipoPlato == (t+1))
        pm.max = pm.src.length;
        pm.src.map(p => {
            let option = new Option(p.nombre,p.idPlato);
            $(`.newPlatoTipo${p.idTipoPlato}`).append(option);
        });
    });

}
const checkMaxPlatos = () => {
    let tiposPlato = $('.tipoPlatoMenu'); 
    tiposPlato.map(t => {
        let {num, max} = platosMenu[(t+1)]; 
        $(tiposPlato[t]).next().remove();
        if (num < max) {
            let add = '<td><span class="material-icons-round" onclick="changePlatoMenu(this)">add</span></td>';
            $(tiposPlato[t]).parent().append(add);
        }
    });
}
const selectIdPlato = (select) => {
    let idPlato = $(select).val();
    $(select).closest('tr').find('input[type="text"]')[0].defaultValue = idPlato;
}
const refreshMenu = async (idRest, tipoMenu) => {
    await getTiposMenuByRest(idRest);
    let tm = tipoMenu != null ? tipoMenu : $(`${idSection} h2 .tipoMenu`).val();  
    await fillTableMenu(idRest,tm);
    updateSrcPlatos(idRest);
    $(`#formNewMenu input`).val('');
    if (isEdit) {
        toggleEditMode(isEdit)
    }
}
// EVENTS
$('#editMenu .btnGreen').on('click', async function () {
    if (!isEdit) {
        toggleEditMode(isEdit);
    } else {
        updateInfo('editMenu');
    }
});
$('td .btnAdd .material-icons-round').on('click', function () {
    let td = $(this).closest('td'),
        tipoPlato = td.data('type')
        idPlato = td.find('select').val();
    if (!platosMenu.new.find(p => p.id == idPlato)) {
        platosMenu.new.push({ id: idPlato, tipo: tipoPlato });
        let msg = td.find('.msg'),
            select = td.find('select');
        select.css('opacity', 0);
        msg.css('z-index', 1)
        msg.css('opacity', 1);
        setTimeout(() => {
            msg.css('opacity', 0);
            msg.css('z-index', -1);
            select.css('opacity', 1);
    }, 1500);
    }
});
$(`#formNewMenu .btnSave`).on('click', async function () {
    let formName = 'formNewMenu',
        idRest = $(`${idSection} select[name="listRest"]`).val(),
        inputsForm = `<input type="text" name="listRest" value="${idRest}" hidden>`;
    await platosMenu.new.map(p => {
        inputsForm += `<input type="text" name="platosMenu[]" value="${p.id}" hidden>`;
    });
    $(`#${formName} .inputsHidden`).html(inputsForm);
    updateInfo(formName);
});