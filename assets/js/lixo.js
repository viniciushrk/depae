//import 'jquery.js' or 'jquery.min.js' first!

function searchStringInArray(str, arr) {
    return arr.some(function(word) {
        return str.match(new RegExp(word));
    });
}

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

function mecheTurma(idCurso, idTurno, serie) {
    $('select[name=turma] > option');
    if (idCurso !== "" && idTurno !== "" && serie !== "") { //todos
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] != idCurso || turmas[c]['turno_idTurno'] != idTurno || turmas[c]['serie'] != serie){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso !== "" && idTurno !== "" && serie === "") { //curso e turno
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] != idCurso || turmas[c]['turno_idTurno'] != idTurno){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso !== "" && idTurno === "" && serie !== "") { //curso e serie
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] != idCurso || turmas[c]['serie'] != serie){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso !== "" && idTurno === "" && serie === "") { //curso
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] != idCurso){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso === "" && idTurno !== "" && serie !== "") { //turno e serie
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['turno_idTurno'] != idTurno || turmas[c]['serie'] != serie){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso === "" && idTurno !== "" && serie === "") { //turno
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['turno_idTurno'] != idTurno){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso === "" && idTurno === "" && serie !== "") { //serie
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['serie'] != serie){
                $('select[name=turma] > option[value=' + turmas[c]['idTurma'] + ']').remove();
            }else{
                $("<option>", {
                    value: turmas[c]['idTurma']
                }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
            }
        }
    }else if (idCurso === "" && idTurno === "" && serie === "") { //nenhum
        for (var c = 0; c < turmas.length; c++) {
            $("<option>", {
                value: turmas[c]['idTurma']
            }).appendTo($('select[name=turma] > option')).html(turmas[c]['idTurma']);
        }
    }
}

function mecheSerie(idCurso, idTurno) {
    $('#serie > .f5').remove();
    var series = {};

    if (idCurso !== "" && idTurno !== "") { //curso e turno
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] == idCurso && turmas[c]['turno_idTurno'] == idTurno && !searchStringInArray(turmas[c]['serie'], series)){
                series[series.length] = turmas[c]['serie'];
                $("<option>", {
                    value: series[series.length -1]
                }).appendTo($('#serie > .f5')).html(series[series.length -1]);
            }
        }
    }else if (idCurso !== "" && idTurno === "") { //curso
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] == idCurso && !searchStringInArray(turmas[c]['serie'], series)){
                series[series.length] = turmas[c]['serie'];
                $("<option>", {
                    value: series[series.length -1]
                }).appendTo($('#serie > .f5')).html(series[series.length -1]);
            }
        }
    }else if (idCurso === "" && idTurno !== "") { //turno
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idTurno'] == idTurno && !searchStringInArray(turmas[c]['serie'], series)){
                series[series.length] = turmas[c]['serie'];
                $("<option>", {
                    value: series[series.length -1]
                }).appendTo($('#serie > .f5')).html(series[series.length -1]);
            }
        }
    }else{ //nenhum
        for (var c = 0; c < turmas.length; c++) {
            if (!searchStringInArray(turmas[c]['serie'], series)){
                series[series.length] = turmas[c]['serie'];
                $("<option>", {
                    value: series[series.length -1],
                    class: "f5"
                }).appendTo($('#serie')).html(series[series.length -1]);
            }
        }
    }
}

function mecheTurno(idCurso) {
    $('#turno > option').remove();
    var idTurnos1 = {};
    var turnos1 = {};

    if (idCurso !== "") { //curso
        for (var c = 0; c < turmas.length; c++) {
            if (turmas[c]['curso_idCurso'] == idCurso && !searchStringInArray(turmas[c]['turno_idTurno'], idTurnos1)) {
                idTurnos1[idTurnos1.length] = turmas[c]['turno_idTurno'];
            }
        }
        for (var c = 0; c < turnos1.length; c++)
            $("<option>", {value: idTurnos1[c]}).appendTo($("#turno")).html(turnos1[c]);

    }else{ //nenhum
        for (var c = 0; c < turmas.length; c++) {
            if (!searchStringInArray(turmas[c]['turno_idTurno'], idTurnos1)) {
                idTurnos1[idTurnos1.length] = turmas[c]['turno_idTurno'];
            }
        }
        for (var c = 0; c < turnos1.length; c++)
            $("<option>", {value: idTurnos1[c]}).appendTo($("#turno")).html(turnos1[c]);
    }

}

