</div> <!--fecha div do header pra n conflitar com as regras css da página. -->
<!--Pagina que mostra o relatorio -->
<script src="assets/js/jquery.min.js"></script>
<script src="jspdf.js"></script>
<script src="jquery-2.1.3.js"></script>
<script src="pdfFromHTML.js"></script>
<script>
    function salvaPlanilha() {
        var htmlPlanilha = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>PlanilhaTeste</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>' + document.getElementById("tabela").innerHTML + '</table></body></html>';

        //var htmlPlanilha = "<table>"+document.getElementById("tabela").innerHTML+"</table>";

        var htmlBase64 = btoa(htmlPlanilha);
        var link = "data:aplicattion/vdd.ms-excel;base64,"+htmlBase64;
        //window.open(link);
        var hyperlink = document.createElement("a");
        hyperlink.download = "ArquivoTeste"+".xls";
        hyperlink.href = link;
        hyperlink.style.display = 'none';

        document.body.appendChild(hyperlink);
        hyperlink.click();
        document.body.removeChild(hyperlink);
    }
</script>

<!-- Geral -->

<?php
    require_once "header.php";
    require_once "classes/Faltas.php";
    $faltas = (new Faltas())->listaFaltas();

if(isset($_SESSION['cargo'])&& $_SESSION['cargo'] < 8){


    require_once "classes/Servidor.php";
    require_once "classes/Curso.php";
    require_once "classes/Aluno.php";
    require_once "classes/Turma.php";
    require_once "classes/Turno.php";
    require_once "classes/Nivel_falta.php";
    require_once "classes/Motivo.php";

    require_once "classes/Cargo.php";

    $turnos = new Turno();
    $turma = new Turma();
    $aluno = new Aluno();
    $nivel_falta = new Nivel_falta();

    $cursos = new Curso();
    $cargo = new Cargo();

    $nivel_falta = $nivel_falta->listaFaltas();


    $cargo->seleciona($_SESSION['cargo']);

    $turnos = $turnos->listaTurnos();
    $anos = $turma->getTodasSeriesApenas();
    $turmas = [];

    if ($_SESSION['cargo'] < 4) {
        $cursos = $cursos->listaCurso();
        $turmas = $turma->listaTurma();

    }else{
        $cursos = $cursos->_selecionaPorNomeCurso(substr($cargo->getCargo(), 20));
        $turmas = $turma->selecionaTurmasPorIdCurso($cursos[0]['idCurso']);
    }

    echo "<script>";

    $numDeTurmas = count($turmas);
    echo "var turmas = new Array(".$numDeTurmas.");";
    echo "for (var c = 0; c < ".$numDeTurmas.";c++){
                    turmas[c] = {
                                    idTurma: '',
                                    serie: '',
                                    periodo_letivo: '',
                                    curso_idCurso: '',
                                    turno_idTurno: ''
                                };
                }
        ";
    for ($c = 0; $c < $numDeTurmas; $c++) {
        echo   "turmas[" . $c . "]['idTurma'] = \"" . $turmas[$c]['idTurma'] . "\";
                    turmas[" . $c . "]['serie'] = \"" . $turmas[$c]['serie'] . "\";
                    turmas[" . $c . "]['periodo_letivo'] = \"" . $turmas[$c]['periodo_letivo'] . "\";
                    turmas[" . $c . "]['curso_idCurso'] = " . $turmas[$c]['curso_idCurso'] . ";
                    turmas[" . $c . "]['turno_idTurno'] = " . $turmas[$c]['turno_idTurno'] . ";
            ";
    }

//    $numDeTurnos = count($turnos);
//    echo "var turnos = new Array(".$numDeTurnos.");";
//    echo "for (var c = 0; c < ".$numDeTurnos.";c++){
//                    turnos[c] = {
//                                    idTurno: '',
//                                    turno: ''
//                                };
//                }
//        ";
//    for ($c = 0; $c < $numDeTurnos; $c++) {
//        echo   "turnos[" . $c . "]['idTurno'] = " . $turnos[$c]['idTurno'] . ";
//                    turnos[" . $c . "]['turno'] = \"" . $turnos[$c]['turno'] . "\";
//            ";
//    }




    echo "</script>";

    function searchStringInArray($str, $arr) {
        foreach ($arr as $el) {
            if (strpos($el, $str) !== false){
                return true;
            }
        }
        return false;
    }
?>

<script type="text/javascript">
    function searchStringInArray(str, arr) {
        for (var c = 0; c < arr.length; c++) {
            if (arr[c].indexOf(str) != -1){
                return true
            }
        }
        return false;
        // return arr.some(function(word) {
        //     return str.match(new RegExp(word));
        // });
    }

    function searchNumberInArray(n, arr) {
        for (var c = 0; c < arr.length; c++) {
            if (arr[c] == n){
                return true
            }
        }
        return false;
    }

    // function loadSerie(arr_idCurso) { //MECHER AINDA!!!!!!!!
    //     // $('#serie > .f5').remove();
    //     var series = [];
    //
    //     for (var c = 0; c < turmas.length; c++) {
    //         if (!searchStringInArray(turmas[c]['serie'], series)){
    //             series[series.length] = turmas[c]['serie'];
    //             $("<option>", {
    //                 value: series[series.length -1]//,
    //                 // class: "f5"
    //             }).appendTo($('#ano')).html(series[series.length -1]);
    //         }
    //     }
    //
    // }

    var faltas = [];

    function loadFaltasDoAno(_ano) {
        $.ajax({
            url: "loadFaltas.php",
            data: {
                ano: _ano
            },
            type: "POST",
            success: function (result) {
                faltas = JSON.parse(result);
            }
        });
    }
</script>


<br/>
    <div class="form-group mx-auto mt-5 container">
<!--        <label for="filtro">Filtros</label>-->
<!--        <input name="filtroNome" class="form-control col-xl-2 col-lg-2 col" type="search" autofocus>-->
<!--        <button class="btn btn-success my-2" name="exportBtn" type="submit" value="Exportar">Pesquisar</button>-->
        <script type="text/javascript">
            function desativaFiltros() {
                // $('.multiselects').attr('disabled', 'true');

                $('.multiselects').removeClass("re-enable-mouse-interaction");
                $('.multiselects').addClass("disable-mouse-interaction");

                console.log("disabled multiselects");
            }
            function ativaFiltros() {
                // $('.multiselects').removeAttr("disabled");
                $('.multiselects').removeClass("disable-mouse-interaction");
                $('.multiselects').addClass("re-enable-mouse-interaction");
                console.log("enabled multiselects");
            }
            $(document).ready(function() {
                for (var c = 0; c < $(".multiselects").length; c++) { //nem tenta, só aceita
                    $(".multiselects")[c].style.height = ($($(".multiselects")[c].children[0]).outerHeight() + $($(".multiselects")[c].children[1]).outerHeight()) +"px";
                }

                $(".multiselects").addClass("x-scroll-them");

                $('#radiobutton_relatorio_geral').attr('onclick', "desativaFiltros();");
                $('#radiobutton_relatorio_especifico').attr('onclick', "ativaFiltros();");
                desativaFiltros();

                periodo.value = (new Date).getFullYear();
                loadFaltasDoAno(periodo.value);
            });
        </script>
        <form class="width-fill-parent">
            <table class="table table-striped table-bordered table-hover" id="filtros" name="filtros">
                <thead>
                    <tr>
                        <th colspan="4" scope="col-auto">
                            <div class="btn col-auto" onclick="radiobutton_relatorio_geral.click()"><input type="radio" class="radio" name="rel_type" value="geral" id="radiobutton_relatorio_geral" checked>&nbsp Geral &nbsp&nbsp&nbsp&nbsp</div>
                            <div class="btn col-auto" onclick="radiobutton_relatorio_especifico.click()"><input type="radio" class="radio" name="rel_type" value="especifico" id="radiobutton_relatorio_especifico">&nbsp Específico &nbsp&nbsp&nbsp&nbsp</div>

                            <div class="col-auto float-right">
                                <select class="form-control" name="periodo" id="periodo">
                                    <?php
                                        $anos = array();
                                        foreach ($faltas as $_falta) {
                                            $_ano_teste = date('Y', strtotime($_falta['data_inicio']));
                                            if (!searchStringInArray($_ano_teste, $anos)){
                                                $anos[count($anos)] = $_ano_teste;
                                                echo "<option value='$_ano_teste'>".$_ano_teste."</option>";

                                            }


                                        }
                                    ?>
                                </select>
                            </div>

                        </th>
                    </tr>
                    <tr id="filtros_multiselect" >

                        <th scope="col-auto" class="align-content-center ">
                            <div class="filtros">
    <!--                            multiselect dos cursos-->
                                <label for="curso">Curso:</label>
                                <ul class="multiselects list-group" name="curso" id="curso">
                                    <?php
                                        foreach ($cursos as $_curso) {
                                            echo "<li class='btn list-group-item text-left' onclick='idCurso_".$_curso['idCurso'].".click()' value='".$_curso['idCurso']."'>".$_curso['nome_curso']."&nbsp&nbsp&nbsp&nbsp<input id='idCurso_".$_curso['idCurso']."' type='checkbox' class='float-right _disable-mouse-interaction'/></li>";
                                        }
                                    ?>

                                </ul>
                            </div>
                        </th>
                        <th scope="col-auto" class="align-content-center ">
                            <div class="filtros">
    <!--                            multiselect dos turnos-->
                                <label for="turno">Turno:</label>
                                <ul class="multiselects list-group" name="turno" id="turno">
                                    <?php
                                        foreach ($turnos as $_turno) {
                                            echo "<li class='btn list-group-item text-left' onclick='idTurno_".$_turno['idTurno'].".click()' value='".$_turno['idTurno']."'>".$_turno['turno']."&nbsp&nbsp&nbsp&nbsp<input id='idTurno_".$_turno['idTurno']."' type='checkbox' class='float-right _disable-mouse-interaction'/></li>";
                                        }
                                    ?>

                                </ul>
                            </div>
                        </th>
                        <th scope="col-auto" class="align-content-center ">
                            <div class="filtros">
    <!--                            multiselect dos anos-->
                                <label for="ano">Ano:</label>
                                <ul class="multiselects list-group" name="ano" id="ano">
                                    <?php
                                        foreach ($anos as $_ano) {
                                            echo "<li class='btn list-group-item text-left' onclick='serie_".substr($_ano, 0, 1).".click()' value='".$_ano."'>".$_ano."&nbsp&nbsp&nbsp&nbsp<input id='serie_".substr($_ano, 0, 1)."' type='checkbox' class='float-right _disable-mouse-interaction'/></li>";
                                        }
                                    ?>

                                </ul>
                            </div>
                        </th>
                        <th scope="col-auto" class="align-content-center ">
                            <div class="filtros">
    <!--                            multiselect das turmas-->
                                <label for="turma">Turma:</label>
                                <ul class="multiselects list-group" name="turma" id="turma">
                                    <?php
                                        foreach ($turmas as $_turma) {
                                            echo "<li class='btn list-group-item text-left' onclick='turma_".$_turma['idTurma'].".click()' value='".$_turma['idTurma']."'>".$_turma['idTurma']."&nbsp&nbsp&nbsp&nbsp<input id='turma_".$_turma['idTurma']."' type='checkbox' class='float-right _disable-mouse-interaction'/></li>";
                                        }
                                    ?>

                                </ul>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4"><input type="button" name="btn_busca_filtro" id="btn_busca_filtro" class="btn btn-success float-right" value="Busca"></th>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
    <div  class="m-auto width-fill-parent" id="alvo">
        <div id="HTMLtoPDF">
            <table id="tabela" class="table table-striped table-bordered table-hover table-condensed width-fill-parent">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Numero de Matrícula</th>
                        <th class="col-xl-auto" scope="col" style="text-align: center">Nome</th>
                        <th scope="col" style="text-align: center">Turma</th>
                        <th class="col-xl-auto" scope="col" style="text-align: center">Curso</th>
                        <th scope="col-xl-auto" style="text-align: center">Turno</th>
                        <th scope="col" style="text-align: center">Nível da falta</th>
                        <th scope="col-xl-auto" style="text-align: center">Motivo</th>
                        <th scope="col" style="text-align: center">Inicio da penalidade</th>
                        <th scope="col" style="text-align: center">Fim da penalidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "classes/Disciplina_aluno.php";

                        $aluno = new Aluno();
                        $turma = new Turma();
                        $curso = new Curso();
                        $turno = new Turno();
                        $nivel_falta = new Nivel_falta();
                        $motivo = new Motivo();
                        $disciplina_aluno = new disciplina_aluno();

                        function verificaAnoBissexto($ano){
                                $_1st = ($ano % 4 == 0 && $ano % 100 != 0);
                                $_2nd = ($ano % 4 == 0 && $ano % 100 == 0 && $ano % 400 == 0);
                                if ($_1st || $_2nd) //condições para anos bissextos!
                                    return true;
                                else
                                    return false;

                        }

                        foreach ($faltas as $falta) {
                            ?>
                            <tr>
    <!--                                mostra o numero de matrícula do aluno -->
                                <td scope="row" style="text-align: center">
                                    <?php
                                    echo $falta['aluno_num_matricula'];
                                    ?>
                                </td>

                                <!--                    mostra o nome do discente-->
                                <td style="text-align: center">
                                    <?php
                                        $aluno->seleciona($falta['aluno_num_matricula']);
                                        echo $aluno->getNome();
                                    ?>
                                </td>

                                <!--                    mostra a turma do discente-->
                                <td style="text-align: center">
                                    <?php
                                        $_disciplina_aluno = $disciplina_aluno->selecionaDisciplinaAlunosPorIdAluno($aluno->getNumMatricula());
                                        foreach ($_disciplina_aluno as $da)
                                            if ($da['tipo_vinculo_idTipo_vinculo'] == 1) {
                                                $_disciplina_aluno = $da;
                                                break;
                                            }
                                            echo $_disciplina_aluno['turma_idTurma'];
                                    ?>
                                </td>

                                <!--                    mostra o curso do discente-->
                                <td style="text-align: center">
                                    <?php
                                        $turma->selecionaPorIdTurma($_disciplina_aluno['turma_idTurma']);
                                        $curso->selecionaPorIdCurso($turma->getCursoIdCurso());
                                        echo $curso->getNomeCurso();
                                    ?>
                                </td>

                                <!--                    mostra o turno do discente-->
                                <td style="text-align: center">
                                    <?php
                                        $turno->seleciona($turma->getTurnoIdturno());
                                        echo $turno->getTurno();
                                    ?>
                                </td>

                                <!--                    mostra o nivel da falta causada pelo discente-->
                                <td style="text-align: center">
                                    <?php
                                        $motivo->seleciona($falta['motivo_idMotivo']);
                                        $nivel_falta->selecionaPorId($motivo->getNivelfaltaIdNivelFalta());
                                        echo $nivel_falta->getNivelFalta();
                                    ?>
                                </td>

                                <!--                    mostra o motivo da falta-->
                                <td style="text-align: center">
                                    <?php
                                        echo $motivo->getNome();
                                    ?>
                                </td>

                                <!--                    mostra a data de inicio da penalidade-->
                                <td style="text-align: center">
                                    <?php
                                        $la_data = explode("-", $falta['data_inicio']);

                                        echo $la_data[2]."/".$la_data[1]."/".$la_data[0];
                                    ?>
                                </td>

                                <!--                    mostra a data final da penalidade-->
                                <td style="text-align: center">
                                    <?php
                                        echo date('d/m/Y', strtotime('+'.$nivel_falta->getDiasPenalidade().' days', strtotime($la_data[2]."-".$la_data[1]."-".$la_data[0])));
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
?>
<div> <!--reabre div para siular a div do header pro footer. -->