let jsonMenus;
// FUNCTIONS
const fillTableMenu = (idRest, tipoMenu, changeDayMenu) => {
    $.ajax({
        url: "/menus/rest/"+ idRest,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            jsonMenus = JSON.parse(response);
            let selectedMenu = jsonMenus.find(m => m.menu.idTipoMenu == Number(tipoMenu)),
                m = selectedMenu.menu,
                precioReducido = m.precioReducido == 0 ? m.precio : m.precioReducido,
                platos = selectedMenu.platos,
                notDayMenu = ':not(#infoRest',
                divMenu = '.divMenu table' + (!changeDayMenu ? `${notDayMenu} table)` : ''),
                precioMenu = ".precioMenu h2" + (!changeDayMenu ? `${notDayMenu} .precioMenu)` : ''); 
            $(precioMenu).text("S/ " + precioReducido.toFixed(2));
            $(".precioNormal h2").text("Normal: S/" + m.precio.toFixed(2));
            $('h2 .tipoMenu').val(tipoMenu);
            let table = "<tr>" + "<td>" + "<h3>Entrada:</h3>" + "</td>" + "</tr>";
            platos.map((p) => {
                if (p.idTipoPlato == 1) {
                    table +=
                        "<tr>" +
                        "<td></td>" +
                        '<td class="itemMenu">' +
                        p.nombre +
                        "</td>" +
                        "</tr>";
                }
            });
            table += "<tr>" + "<td>" + "<h3>Segundo:</h3>" + "</td>" + "</tr>";
            platos.map((p) => {
                if (p.idTipoPlato == 2) {
                    table +=
                        "<tr>" +
                        "<td></td>" +
                        '<td class="itemMenu">' +
                        p.nombre +
                        "</td>" +
                        "</tr>";
                }
            });
            $(divMenu).html(table);
        },
    });
}
const fillTablePlatos = (url) => {
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            let jsonPlatos = JSON.parse(response), 
                table = '';
            jsonPlatos.map((p) => {
                table += '<tr>' +
                            '<td class="itemMenu">' + p.nombre + '</td>' +
                            '<td class="itemMenu">S/ ' + p.precio.toFixed(2) + '</td>' +
                        '</tr>';
            });
            $('.detallePlatos table').html(table);
            if (jsonPlatos.length == 1) $('.detallePlatos td').css('border-radius', '1.5rem');
        }
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
});