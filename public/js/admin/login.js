// EVENTS
$('#marker').on('click', function () {
    window.location = hostUrl;
});
$("#loginAdmin").on('submit', function (e) {
    e.preventDefault();
    let f = document.forms.namedItem('loginAdmin'),
        formData = new FormData(f);
    $.ajax({
        type: "post",
        contentType: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: f.action,
        data: formData,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response == 'error') {
                Swal.fire({
                    title: 'Credenciales incorrectas',
                    icon: 'error',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                window.location = `${hostUrl}/admin`;
            }
        }
    });
});