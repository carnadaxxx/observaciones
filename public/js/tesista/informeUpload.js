$(function () {

    var files = $('#files');
    $( '.custom-file-label' ).append('Selecciona un Archivo *.pdf' );

    $('#fileupload').fileupload({

        url: 'index.php?controller=Upload',
        dataType: 'json',
        autoUpload: false

    }).on('fileuploadadd', function (e, data) {

        var fileTypeAllowed = /.\.(pdf)$/i;

        var fileName = data.originalFiles[0]['name'];

        var fileType = data.originalFiles[0]['type'];

        if (!fileTypeAllowed.test(fileName)) {

            $('#fileupload').addClass('is-invalid').after('<div class="invalid-tooltip">El archivo que as adjuntado no es *.pdf.</div>');
            console.log("esto NOOOOOO es un pdf");

        } else {

            $('#fileupload').addClass('is-valid');
            $('#fileupload').removeClass('is-invalid');

            if ($('.custom-file-label').text().length > 0) {

                $('.custom-file-label').empty().append(fileName);

            }

            data.submit();

            //console.log("esto es un pdf");

        }

    }).on('fileuploaddone', function (e, data) {



    }).on('fileuploadprogressall', function(e, data) {

        var progress = parseInt(data.loaded / data.total * 100, 10);

        $('.progress-bar').width(progress + "%").attr('aria-valuenow', progress);

        //console.log(data);

    });
});
