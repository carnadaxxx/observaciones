$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        acceptFileTypes: '/(\.|\/)(pdf)$/i',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }
    });
});
