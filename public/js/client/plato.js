const fillTablePlatos = async (url, getData) => {
    return await $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            let jsonPlatos = JSON.parse(response), 
                table = '';
            if (getData) return jsonPlatos;
            jsonPlatos.map((p) => {
                table += '<tr onclick="selectRow(this)">' +
                            `<td class="itemMenu">${p.nombre}</td>` +
                            `<td class="idRow" hidden>${p.idPlato}</td>` +
                            '<td class="itemMenu">S/ ' + p.precio.toFixed(2) + '</td>' +
                        '</tr>';
            });
            $('.detallePlatos table').html(table);
            if (jsonPlatos.length == 1) $('.detallePlatos td').css('border-radius', '1.5rem');
        }
    });
}