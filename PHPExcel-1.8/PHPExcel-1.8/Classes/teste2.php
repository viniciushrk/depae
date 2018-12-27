<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>
    <?php
    /**
     * Created by PhpStorm.
     * User: lmart
     * Date: 27/10/2018
     * Time: 19:15
     */
    set_time_limit(300);
require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Servidor.php";
require_once "../../../Classes/Aluno.php";
require_once "../../../Classes/Curso.php";
require_once "../../../Classes/Disciplina.php";
require_once "../../../Classes/Disciplina_aluno.php";
require_once "../../../Classes/Turma.php";
require_once "../../../Classes/Tipo_vinculo.php";
//$mostrar = new LendoExcel();
//$mostrar = $mostrar->InserirAluno();
require_once "PHPExcel.php";

$objreader = new PHPExcel_Reader_Excel5();
$objreader->setReadDataOnly(true);
$objPHPExcel = $objreader->load("Teste3.xls");

$colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
$total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

//echo"".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,16)->getValue());


$matricula = null;
$numTurma = null;
$materia = null;

for ($linha = 0; $linha<=$total_linhas; $linha++) {
    //Inseriro no Aluno
    $textoColuna1 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue();
    $textoColuna1 = iconv(mb_detect_encoding($textoColuna1), 'UTF-8', $textoColuna1);

    $textoColuna7 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $linha)->getValue();
    $textoColuna7 = iconv(mb_detect_encoding($textoColuna7), 'UTF-8', $textoColuna7);

    $textoColuna8 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $linha)->getValue();
    $textoColuna8 = iconv(mb_detect_encoding($textoColuna8), 'UTF-8', $textoColuna8);

    $textoColuna3 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $linha)->getValue();
    $textoColuna3 = iconv(mb_detect_encoding($textoColuna3), 'UTF-8', $textoColuna3);

    $textoColuna6 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha)->getValue();
    $textoColuna6 = iconv(mb_detect_encoding($textoColuna6), 'UTF-8', $textoColuna6);

    $textoColuna18 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $linha)->getValue();
    $textoColuna18 = iconv(mb_detect_encoding($textoColuna18), 'UTF-8', $textoColuna18);

    $textoColuna27 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha)->getValue();
    $textoColuna27 = iconv(mb_detect_encoding($textoColuna27), 'UTF-8', $textoColuna27);




    if(preg_match("/\ Nome:\ (.*?)/", $textoColuna1) == 1){
        $matricula = null;
        $numTurma = null;
        $materia = null;
        echo "<table border='2'>";
        echo"<br/>";

        //nome dos alunos
        $nome = substr(($textoColuna1),7);
        echo "<th>" . substr(($textoColuna1),7);
        echo "</th>";

    }
    if (preg_match("/\ D.\ Nascimento:\ (.*?)/", $textoColuna1) == 1){
        echo "<table border='2'>";

        //mostra as datas de nascimento
        $nasc = substr(str_replace(' ','',$textoColuna1),13);
        $vetNasc = explode('/',$nasc);
        $nasc = $vetNasc[2].'-'.$vetNasc[1].'-'.$vetNasc[0];
        echo "<th>" . substr(str_replace(' ','',$textoColuna1),13);
        echo "</th>";

        //mostra os numeros do rg
        $rg = substr(str_replace(' ','', $textoColuna6),3,7);
        echo "<th>" . substr(str_replace(' ','', $textoColuna6),3,7);
        echo "</th>";

        //mostra o orgao expeditor
        $org = substr(str_replace(' ','',$textoColuna6),10);
        echo "<th>" . substr(str_replace(' ','',$textoColuna6),10);
        echo "</th>";

        //mostra o cpf
        $cpf = substr( str_replace(' ','',str_replace('-','',str_replace('.','', $textoColuna27))),4);
        echo "<th>" .substr( str_replace(' ','',str_replace('-','',str_replace('.','', $textoColuna27))),4);
        echo "</th>";

    }if (preg_match("/\ Curso:\ (.*?)/", $textoColuna1) == 1) {
        echo "<table border='2'>";

        //mostra curso
        $nomeCurso = substr(($textoColuna1),8);
        echo "<th>" . substr(($textoColuna1),8);
        echo "</th>";

        //mostra numero de matricula
        $matricula = substr(str_replace(' ','',str_replace('-','',$textoColuna27)),11);
        echo "<th>" . substr(str_replace(' ','',str_replace('-','',$textoColuna27)),11);
        echo "</th>";

    }if (preg_match("/\ Turma:\ (.*?)/", $textoColuna1) == 1) {
        echo "<table border='2'>";

        //mostra numero da turma
        $numTurma = substr(str_replace(' ','',$textoColuna1),6);
        echo "<th>" . substr(str_replace(' ','',$textoColuna1),6); //'turma'.turma
        echo "</th>";

        //mostra turno
        $turno = substr(str_replace(' ','',$textoColuna6),6);
        echo "<th>" . substr(str_replace(' ','',$textoColuna6),6); //'turma'.turno_idturno
        echo "</th>";

        //mostra periodo letivo
        $periodoLetivo = substr(str_replace(' ','',$textoColuna18),15);
        echo "<th>" . substr(str_replace(' ','',$textoColuna18),15);
        echo "</th>";

        //mostra ano
        $serie = substr(str_replace(' ','',$textoColuna27),7);
        echo "<th>" . substr(str_replace(' ','',$textoColuna27),7);
        echo "</th>";

    }if (preg_match("/[1-4](.*?)/", $textoColuna3) == 1){
        echo "<table border='2'>";
        echo"<br/>";

        //mostra disciplinas
        $materia = substr(($textoColuna3),2);
        echo "<th>" . substr(($textoColuna3),2); // 'materias'
        echo"</th>";

        //mostra carga horaria
        $cargaHoraria = str_replace(' ','',$textoColuna7);
        echo "<th>" . str_replace(' ','',$textoColuna7);
        echo"</th>";

        //mostra status da materia
        $status = str_replace(' ','',$textoColuna8);
        echo "<th>" . str_replace(' ','',$textoColuna8);
        echo"</th>";

    }

   if($matricula !== null){
            $aluno = new Aluno();
            $aluno->seleciona($matricula);

            $aluno->setNome($nome);
            $aluno->setCpf($cpf);
            $aluno->setDataNascimento($nasc);
            $aluno->setOrgexp($org);
            $aluno->setRg($rg);

            $curso = new Curso();
            if($curso->selecionaPorNomeCurso($nomeCurso))
            {
                $curso->setNomeCurso($nomeCurso);
                $curso->salvar();
            }

            if ($aluno->getNumMatricula() == "" or $aluno->getNumMatricula() ==  null){
                $aluno->setNumMatricula($matricula);
                $aluno->salvar();
            }else{
                $aluno->atualizar();
            }


        }


        if($numTurma !== null){
            $turma = new Turma();
            if ($turma->selecionaPorIdTurma($numTurma)){
                $turma->setIdTurma($numTurma);
                $turma->setSerie($serie);
                $turma->setPeriodoLetivo($periodoLetivo);
                $turma->setCursoIdCurso($curso->getIdCurso());
                if($turno == "MATUTINO"){
                    $turma->setTurnoIdturno(1);
                }elseif($turno == "VESPERTINO"){
                    $turma->setTurnoIdturno(2);
                }
                //$turma->setTurnoIdturno(((new Turno())->selecionaTurnosPorTurno($turno))[0]['turno']);

                $turma->salvar();
            }
        }

        if($materia !== null){
            $disciplina = new Disciplina();
            $discAluno = new Disciplina_aluno();

            //for ($c = 0; $c < $numeroDeDisciplinas; $c++) {
                //$materia = "";
                $turmaDP = "";
                if ($status !== 'RG'){
                    $materia = explode(' - ', $materia);
                    $turmaDP = $materia[1];
                    $materia = $materia[0];

                }
                $query = $disciplina->selecionaDisciplinasPorMateriaECargaHoraria($materia, $cargaHoraria, $curso->getIdCurso());

                if (is_array($query)) {
                    $discAluno->setDisciplinaIdDisciplina($query[0]['idDisciplina']); //arrumar
                }else{


                    $disciplina->setMateria($materia);
                    $disciplina->setCargaHoraria($cargaHoraria);
                    $disciplina->setCursoIdCurso($curso->getIdCurso());
                    $disciplina->salvar();

                    $discAluno->setDisciplinaIdDisciplina($disciplina->getIdDisciplina());

                }

                $discAluno->setAlunoNumMatricula($aluno->getNumMatricula());

                $tipoVinculo = new Tipo_vinculo();
                $tipoVinculo->selecionaPorTipoVinculo($status);


                $discAluno->setTipoVinculoIdTipoVinculo($tipoVinculo->getIdTipoVinculo());
                if ($turmaDP !== ""){
                    $discAluno->setTurmaIdTurma($turmaDP);
                }else{
                    $discAluno->setTurmaIdTurma($turma->getIdTurma());
                }

                if ($discAluno->verificaSeNaoExiste()){
                    $discAluno->salvar();
                }
            //}
        }

    }
    echo "</table>";
?>
</body>
</html>