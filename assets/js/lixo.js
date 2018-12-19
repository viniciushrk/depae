//import 'jquery.js' or 'jquery.min.js' first!
function ns() {
    $('.apagarAposSelecaoNivelFalta').remove();
    var nivelDeFalta = $('#nivel_falta')[0].value;
    switch (nivelDeFalta) {
        case 0:
            break;
        case 1:
            $('[nivel_falta=2]').remove();
            $('[nivel_falta=3]').remove();
            break;
        case 2:
            $('[nivel_falta=1]').remove();
            $('[nivel_falta=3]').remove();
            break;
        case 3:
            $('[nivel_falta=1]').remove();
            $('[nivel_falta=2]').remove();
            break;

    }
}