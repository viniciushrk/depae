//import 'jquery.js' or 'jquery.min.js' first!
function ns() {
    var x = $('.apagarAposSelecaoNivelFalta');
    if (x.length != 0) {
        x.remove();
    }

    var nivelDeFalta = $('#nivel_falta')[0].value;

    if (nivelDeFalta == 1) {
        if (($('.nivel_falta1').length) < 1) {
            for (var c = 0; c < motivos.length; c++) {
                if (motivos[c]['nivel_falta_idNivel_falta'] === 1)
                    $('#pena').append("<option class='nivel_falta1' value='"+ motivos[c]['idMotivo'] +"'>"+ motivos[c]['nome'] +"</option>");
            }
        }
        $('.nivel_falta2').remove();
        $('.nivel_falta3').remove();
    }else{ if (nivelDeFalta == 2) {
        if ($('.nivel_falta2').length < 1) {
            for (var c = 0; c < motivos.length; c++) {
                if (motivos[c]['nivel_falta_idNivel_falta'] === 2)
                    $('#pena').append("<option class='nivel_falta2' value='"+ motivos[c]['idMotivo'] +"'>"+ motivos[c]['nome'] +"</option>");
            }
        }
        $('.nivel_falta1').remove();
        $('.nivel_falta3').remove();
    }else{ if (nivelDeFalta == 3) {
        if ($('.nivel_falta3').length < 1) {
            for (var c = 0; c < motivos.length; c++) {
                if (motivos[c]['nivel_falta_idNivel_falta'] === 3)
                    $('#pena').append("<option class='nivel_falta3' value='"+ motivos[c]['idMotivo'] +"'>"+ motivos[c]['nome'] +"</option>");
            }
        }
        $('.nivel_falta1').remove();
        $('.nivel_falta2').remove();
    }}}
}