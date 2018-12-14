//import 'jquery.js' or 'jquery.min.js' first!
function ns() {
    $('.fufufufufu').remove();
    var nivelDeFalta = $('#nivel_falta')[0].value;
    switch (nivelDeFalta) {
        case 0:
            break;
        case 1:
            $('[joao=x2]').remove();
            $('[joao=x3]').remove();
            break;
        case 2:
            $('[joao=x1]').remove();
            $('[joao=x3]').remove();
            break;
        case 3:
            $('[joao=x1]').remove();
            $('[joao=x2]').remove();
            break;

    }
}