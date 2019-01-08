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
    require_once "../../../Classes/Tipo_vinculo.php";
    require_once "../../../Classes/Turma.php";
    require_once "../../../Classes/Turno.php";
    require_once "../../../Classes/StringList.php";

    //$mostrar = new LendoExcel();
    //$mostrar = $mostrar->InserirAluno();
    require_once "PHPExcel.php";

    $objreader = new PHPExcel_Reader_Excel5();
    $objreader->setReadDataOnly(true);
    $objPHPExcel = $objreader->load("Teste.xls");

    $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
    $total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

    $total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    //echo"".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,16)->getValue());

    function converteParaUTF8($aString) {
        return iconv(mb_detect_encoding($aString), 'UTF-8', $aString);
    }

    $numeroDeDisciplinas = 14;
    for ($linha = 1; $linha<=$total_linhas; $linha += (34 + $numeroDeDisciplinas)) {
        //Inserir no Aluno
        $nome = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha + 14)->getValue();
        $nome = substr(converteParaUTF8($nome), 7);

        $data_nascimento = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha + 15)->getValue();
        $data_nascimento = substr(str_replace(' ', '', converteParaUTF8($data_nascimento)),13);

        $rg = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha + 15)->getValue();
        $rg = substr(str_replace(' ', '', converteParaUTF8($rg)),3,7);

        $org = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha + 15)->getValue();
        $org = substr(str_replace(' ','',converteParaUTF8($org)),10);

        $cpf = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha + 15)->getValue();
        $cpf = substr( str_replace(' ','',str_replace('-','',str_replace('.','', converteParaUTF8($cpf)))),4);

        $nomeCurso = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha + 16)->getValue();
        $nomeCurso = substr(converteParaUTF8($nomeCurso),8);

        $matricula = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha + 16)->getValue();
        $matricula = substr(str_replace(' ','',str_replace('-','',converteParaUTF8($matricula))),11);

        $numturma = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha + 17)->getValue();
        $numturma = substr(str_replace(' ','',converteParaUTF8($numturma)),6); //'turma'.turma

        $turno = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha + 17)->getValue();
        $turno = substr(str_replace(' ','',converteParaUTF8($turno)),6); //'turma'.turno_idturno

        $periodoLetivo = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $linha + 17)->getValue();
        $periodoLetivo = substr(str_replace(' ','',converteParaUTF8($periodoLetivo)),15);

        $serie = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha + 17)->getValue();
        $serie = substr(str_replace(' ','',converteParaUTF8($serie)),7, 8);



        echo "<table border='2'>";
            echo"<br/>";

            //nome dos alunos
            echo "<th>" . $nome;
            echo "</th>";


        echo "<table border='2'>";

            //mostra as datas de nascimento

            $vetNasc = explode('/',$data_nascimento);
            $nasc = $vetNasc[2].'-'.$vetNasc[1].'-'.$vetNasc[0];
            echo "<th>" . $data_nascimento;
            echo "</th>";

            //mostra os numeros do rg

            echo "<th>" . $rg;
            echo "</th>";

            //mostra o orgao expeditor
            echo "<th>" . $org;
            echo "</th>";

            //mostra o cpf
            echo "<th>" .$cpf;
            echo "</th>";


        echo "<table border='2'>";

            //mostra curso
            echo "<th>" . $nomeCurso;
            echo "</th>";

            //mostra numero de matricula
            echo "<th>" . $matricula;
            echo "</th>";


        echo "<table border='2'>";

            //mostra numero da turma
            echo "<th>" . $numturma;
            echo "</th>";

            //mostra turno
            echo "<th>" . $turno; //'turma'.turno_idturno
            echo "</th>";

            //mostra periodo letivo
            echo "<th>" . $periodoLetivo;
            echo "</th>";

            //mostra ano
            echo "<th>" . $serie;
            echo "</th>";

        $linha2 = $linha + 23;
        $numeroDeDisciplinas = 0;

        $materias = new StringList;
        $cargas_horarias = new StringList;
        $tipos_vinculos = new StringList;

        while (preg_match("/[1-4](.*?)/", ($materia = converteParaUTF8($materia = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $linha2)->getValue()))) == 1) {

            $carga_horaria = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $linha2)->getValue();
            $carga_horaria = str_replace(' ','', converteParaUTF8($carga_horaria));

            $tipo_vinculo = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $linha2)->getValue();
            $tipo_vinculo = str_replace(' ','',converteParaUTF8($tipo_vinculo));

            echo "<table border='2'>";
            echo"<br/>";

            //mostra disciplinas
            echo "<th>" . $materia; // 'materias'
            echo"</th>";

            //mostra carga horaria
            echo "<th>" . $carga_horaria;
            echo"</th>";

            //mostra (status da materia) tipos de vinculo
            echo "<th>" . $tipo_vinculo;
            echo"</th>";

            $materias[] = $materia;
            $cargas_horarias[] = $carga_horaria;
            $tipos_vinculos[] = $tipo_vinculo;


            $linha2++;
            $numeroDeDisciplinas++;

        }

        if(isset($matricula)){
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


        if(isset($numturma)){
            $turma = new Turma();
            if ($turma->selecionaPorIdTurma($numturma)){
                $turma->setIdTurma($numturma);
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

        if(isset($materias)){
            $disciplina = new Disciplina();
            $discAluno = new Disciplina_aluno();

            for ($c = 0; $c < $numeroDeDisciplinas; $c++) {
                $materia = "";
                $turmaDP = "";
                if ($tipos_vinculos->offsetGet($c) !== 'RG'){
                    $materia = explode(' - ', $materias->offsetGet($c));
                    $turmaDP = $materia[1];
                    $materia = $materia[0];
                    
                }else{
                    $materia = $materias->offsetGet($c);
                }
                $query = $disciplina->selecionaDisciplinasPorMateriaECargaHoraria($materia, $cargas_horarias->offsetGet($c), $curso->getIdCurso());

                if (is_array($query)) {
                    $discAluno->setDisciplinaIdDisciplina($query[0]['idDisciplina']); //arrumar
                }else{
                    
                    
                    $disciplina->setMateria($materia);
                    $disciplina->setCargaHoraria($cargas_horarias->offsetGet($c));
                    $disciplina->setCursoIdCurso($curso->getIdCurso());
                    $disciplina->salvar();

                    $discAluno->setDisciplinaIdDisciplina($disciplina->getIdDisciplina());

                }

                $discAluno->setAlunoNumMatricula($aluno->getNumMatricula());

                $tipoVinculo = new Tipo_vinculo();
                $tipoVinculo->selecionaPorTipoVinculo($tipos_vinculos->offsetGet($c));


                $discAluno->setTipoVinculoIdTipoVinculo($tipoVinculo->getIdTipoVinculo());
                if ($turmaDP !== ""){
                    $discAluno->setTurmaIdTurma($turmaDP);
                }else{
                    $discAluno->setTurmaIdTurma($turma->getIdTurma());
                }

                $discAluno->salvar();

            }
        }

    }

    echo "</table>";

    echo"</body>";
echo"</html>";