// VAR
let platosMenu = {
        src: null,
        1: {
            num: 0, 
            max: 0, 
            src: [], 
            data: [], 
        },
        2: {
            num: 0, 
            max: 0, 
            src: [], 
            data: [], 
        },
        new: []
    }
// FUNCTIONS
const fillTableMenu = (idRest, tipoMenu, changeDayMenu) => {
    $.ajax({
        url: "/menus/rest/"+ idRest,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            let jsonMenus = JSON.parse(response),
                selectedMenu = jsonMenus.find(m => m.menu.idTipoMenu == Number(tipoMenu));
                if (!selectedMenu) return;
            let m = selectedMenu.menu,
                precioReducido = m.precioReducido == 0 ? m.precio : m.precioReducido,
                platos = selectedMenu.platos,
                notDayMenu = ':not(#infoRest',
                divMenu = '.divMenu table' + (!changeDayMenu ? `${notDayMenu} table)` : ''),
                precioMenu = ".precioMenu h2" + (!changeDayMenu ? `${notDayMenu} .precioMenu)` : ''); 
            $(precioMenu).text("S/ " + precioReducido.toFixed(2));
            $(".precioNormal h2").text("Normal: S/" + m.precio.toFixed(2));
            $('h2 .tipoMenu').val(tipoMenu);
            $('#idMenu').val(m.idMenu);
            let table = "<tr><td class='tipoPlatoMenu' data-type='1'><h3>Entrada:</h3></td></tr>";
            platosMenu[1].num = platosMenu[2].num = 0;
            platos.map((p) => {
                if (p.idTipoPlato == 1) {
                    platosMenu[1].num++;
                    platosMenu[1].data.push(p);
                    table +=
                        "<tr>" +
                        `<td data-type="1"><input type="text" name="platosMenu[]" value="${p.idPlato}" hidden></td>` +
                        `<td class="itemMenu">${p.nombre}</td>` +
                        "</tr>";
                }
            });
            table += "<tr><td class='tipoPlatoMenu' data-type='2'><h3>Segundo:</h3></td></tr>";
            platos.map((p) => {
                if (p.idTipoPlato == 2) {
                    platosMenu[2].num++;
                    platosMenu[2].data.push(p);
                    table +=
                        "<tr>" +
                        `<td data-type="2"><input type="text" name="platosMenu[]" value="${p.idPlato}" hidden></td>` +
                        `<td class="itemMenu">${p.nombre}</td>` +
                        "</tr>";
                }
            });
            $(divMenu).html(table);
        },
    });
}
const getTiposMenuByRest = async (idRest) => {
    await $.ajax({
        url: "/tipos_menu/rest/" + idRest,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            let options = '',
                jsonTiposMenu = JSON.parse(response);
            jsonTiposMenu.map(tm => {
                options += `<option value="${tm.idTipoMenu}">${tm.nombre}</option>`;
            })
            $(".tipoMenu").html(options);
        }
    });
}
// EVENTS
$("h2 .tipoMenu").on("change", function () {
    let tipoMenu = $(this).val(),
        rest = myMap.restSelected,
        idRest = !rest ? $(this).closest('section').find('select[name="listRest"]').val() : rest.id;
    fillTableMenu(idRest,tipoMenu,false);
    if (isEdit) {
        toggleEditMode(isEdit)
    }
});