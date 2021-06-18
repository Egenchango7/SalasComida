// FUNCTIONS
const updateInfo = (form) => {
    return Swal.fire({
        title: 'Está seguro de guardar los cambios?',
        position: 'top-end',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            let f = document.forms.namedItem(form);
                formData = new FormData(f);
			$.ajax({
                type: "post",
                contentType: false,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: f.action,
                data: formData,
                processData: false,
                success: function (data) {
					console.log(data)
                    switch (indexSection) {
                        case 1: fillInfoRest(data); break;
                        case 2: 
							refreshMenu(data.listRest,data.tipoMenu);
							break;
						case 3:
							url = `/platos/tipo/${data.tipoPlato}/rest/${data.listRest}`;
							fillTablePlatos(url);
							$('p select[name="tipoPlato"]').val(data.tipoPlato);
							$('td select[name="tipoPlato"]').val(1);
							break;
						case 4: 
							updateTableUser();
							break;
                    }
					if (indexSection > 2) {
						$(`#${form} input`).val('');
						if (isEdit) {
							toggleEditMode(isEdit);
						} 
					}
					Swal.fire({
						title: 'Guardado',
						icon: 'success',
						timer: 500
					});
                }
            });
        }   
        return result.isConfirmed;
    })
}
const toggleEditMode = (bool) => {
	isEdit = !isEdit;
	if (bool) {
		// TURN OFF
		$(`${idSection} .btnEdit`).css('background-color', colors.green);
		switch (indexSection) {
			case 1:
				$('#editSalaComida input[type="text"], #editSalaComida textarea').attr('readonly','true');
				$('#permisos .material-icons-round').show();
				$('#permisos input').attr('hidden', 'true');
				$('#divImg .btnGreen').css('display','none');
				break;
			case 2:
				updateSrcPlatos($(`${idSection} select[name="listRest"]`).val());
				$('.itemMenu').find('.material-icons-round').remove(); 
				break;
			case 4:
				updateTableUser();
				break;
		}
	} else {
		// TURN ON
		$(`${idSection} .btnEdit`).css('background-color', colors.red);
		let btnDelete = '<span class="material-icons-round" onclick="deleteRow(this)">delete</span>';
		switch (indexSection) {
			case 1:
				$('#editSalaComida input[type="text"], textarea').removeAttr('readonly');
				$('#permisos .material-icons-round').hide();
				$('#permisos input').removeAttr('hidden');
				$('#divImg .btnGreen').css('display','flex');
				break;
			case 2:
				checkMaxPlatos();
				let platos = $('.itemMenu');
				platos.map((p) => {
					$(platos[p]).append(deletePlatoMenu);
				});
				break;
			case 3:
				$('.detallePlatos tr td:last-child').append(btnDelete);
				break;
			case 4:
				$('.rows tr td:first-child').append(btnDelete);
				break;
		}
	}
}
const selectRow = (row) => {
    let div = $(row).closest('div')[0].classList[0];
    if (isEdit && !$(row).hasClass('selected')) {
        $(row).addClass('selected');
        let tds = $(row).find('td');
        tds.map(i => {
            let td = $(tds[i]),
				readOnly = i == 0 && div == 'rows' ? 'readonly' : '',
                val = td.text(),
                input = `<input type="text" name="txtEdit[]" ${readOnly} value="${val}">`;
				btnDelete = td.find('.material-icons-round');
			td.html(input);				
			if (btnDelete.length > 0) {
				td.append(btnDelete[0]);
			}
        });
		
    }
}
const deleteRow = async (row) => {
	let id;
	if (indexSection > 2) {
		let idRow = $(row).closest('tr').find('.idRow');
		id = idRow.text();
	} else {
		id = indexSection == 1
				? $(`${idSection} select[name="listRest"]`).val()
				: $('#idMenu').val();
	}
	let sections = {
		1: 'rest',
		2: 'menu',
		3: 'plato',
		4: 'user'
	},
	url = `${sections[indexSection]}/delete/${id.substr(0,4)}`;
	window.location = url;
}
// EVENTS
		var renderPage = true;
	if(navigator.userAgent.indexOf('MSIE')!==-1
		|| navigator.appVersion.indexOf('Trident/') > 0){
   		/* Microsoft Internet Explorer detected in. */
   		alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
   		renderPage = false;
	}
	var sidebarVisible = false;
	var currentPageID = "#tm-section-1";
$('#btnSalir').on('click', function () {
	window.location = '/login';
});