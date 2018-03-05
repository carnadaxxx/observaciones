$(function () {

    var files = $('#files');

    $('#fileupload').fileupload({

        url: 'index.php?controller=Upload',
        dataType: 'json',
        autoUpload: false

    }).on('fileuploadadd', function (e, data) {

        var fileTypeAllowed = /.\.(pdf)$/i;

        var fileName = data.originalFiles[0]['name'];

        var fileType = data.originalFiles[0]['type'];

        console.log(fileType + "  " + fileName);

        if (!fileTypeAllowed.test(fileName)) {

            $('#fileupload').addClass('is-invalid').after('<div class="invalid-tooltip">El archivo que as adjuntado no es *.pdf.</div>');
            console.log("esto NOOOOOO es un pdf");

        } else {

            $('#fileupload').addClass('is-valid');
            $('#fileupload').removeClass('is-invalid');

            console.log("esto es un pdf");

        }

    }).on('fileuploaddone', function (e, data) {



    }).on('fileuploadprogressall', function(e, data) {


    });
});
