$(function () {

    var files = $('#files');
    $( '.custom-file-label' ).append('Selecciona un Archivo *.pdf' );

    $('#fileupload').fileupload({

        //Datos de la configuracion del Plugin

        url: 'index.php?controller=Upload',
        dataType: 'json',
        autoUpload: false

    }).on('fileuploadadd', function (e, data) {

        //Esta es la parte que maneja lo que pasa cuando sube el archivo

        var fileTypeAllowed = /.\.(pdf)$/i;

        var fileName = data.originalFiles[0]['name'];

        var fileType = data.originalFiles[0]['type'];

        if (!fileTypeAllowed.test(fileName)) {

            $('#fileupload').addClass('is-invalid').after('<div class="invalid-tooltip">El archivo que as adjuntado no es *.pdf.</div>');

        } else {

            $('#fileupload').addClass('is-valid');
            $('#fileupload').removeClass('is-invalid');

            if ($('.custom-file-label').text().length > 0) {

                $('.custom-file-label').empty().append(fileName);

            }

            data.submit();

        }

    }).on('fileuploaddone', function (e, data) {

        //Aqui se maneja todo lo que pasa despues de que la subida termino

        var status = data.jqXHR.responseJSON.status;

        var msg = data.jqXHR.responseJSON.msg;

        switch (status) {

            case 0:

                $('#testing').fadeIn().append('<div class="alert alert-danger" role="alert">' + msg + '</div>');

                $('#fileupload').addClass('is-invalid');

                break;

            case 1:

                var path = data.jqXHR.responseJSON.path;

                var fileName = data.jqXHR.responseJSON.fileName;

                $('.card').fadeOut();

                $('#testing').fadeIn().append('<div class="alert alert-success" role="alert">' + msg + ' ' + fileName + '</div>');

                break;

            default:

                $('#testing').fadeIn().append('<div class="alert alert-danger" role="alert">Algo esta demasiado extraño</div>');

        }

    }).on('fileuploadprogressall', function(e, data) {

        //Esta es la parte que maneja la barra de progreso

        var progress = parseInt(data.loaded / data.total * 100, 10);

        $('.progress-bar').width(progress + "%").attr('aria-valuenow', progress);

    });
});
