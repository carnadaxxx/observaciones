$(function() {

    var urlParams = window.location.href;

    var arguments = urlParams.split('?').pop().split('=').pop();

    $("button").attr("disabled");

    $('#userTipo').change(function(){

        var tipoUsuarioValue = $('#userTipo').val();

        switch (tipoUsuarioValue) {
            case '0':
                $("nav").removeClass("bg-alumno bg-docente").addClass("bg-neutral");
                $(".card-header").removeClass("bg-alumno bg-docente").addClass("bg-neutral");
                $("form").attr("action", 'null');
                if ($("button").attr('disabled')) {

                } else {
                    $("button").attr('disabled', '');
                }

                break;

            case '1':
                $("nav").removeClass("bg-docente bg-neutral").addClass("bg-alumno");
                $(".card-header").removeClass("bg-docente bg-neutral").addClass("bg-alumno");
                $("button").removeAttr("disabled");
                break;

            case '2':
                $("nav").removeClass("bg-alumno bg-neutral").addClass("bg-docente");
                $(".card-header").removeClass("bg-alumno bg-neutral").addClass("bg-docente");
                $("button").removeAttr("disabled");
                break;

            default:
                console.log("es default");

        };

    })


});
