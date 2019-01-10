<!-- Geral -->

<?php
    require_once "header.php";
    require_once "classes/Faltas.php";
    $faltas = (new Faltas())->listaFaltas();
?>
    <div class="form-group mx-auto mt-6">
        <label for="filtro">Filtros</label>
        <input name="filtroNome" class="form-control col-xl-2 col-lg-2 col" type="search" autofocus>
        <button class="btn btn-success my-2" name="exportBtn" type="submit" value="Exportar">Pesquisar</button>
    </div>
        <div class="col-auto mx-auto">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Numero de Matrícula</th>
                        <th class="col-xl-3" scope="col" style="text-align: center">Nome</th>
                        <th scope="col" style="text-align: center">Turma</th>
                        <th class="col-xl-2" scope="col" style="text-align: center">Curso</th>
                        <th scope="col-xl-3" style="text-align: center">Turno</th>
                        <th scope="col" style="text-align: center">Nível da falta</th>
                        <th scope="col-xl-" style="text-align: center">Motivo</th>
                        <th scope="col" style="text-align: center">Inicio da penalidade</th>
                        <th scope="col" style="text-align: center">Fim da penalidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "classes/Aluno.php";
                        require_once "classes/Turma.php";
                        require_once "classes/Curso.php";
                        require_once "classes/Turno.php";
                        require_once "classes/Nivel_falta.php";
                        require_once "classes/Motivo.php";
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
                                <td scope="row">
                                    <?php
                                    echo $falta['aluno_num_matricula'];
                                    ?>
                                </td>

                                <!--                    mostra o nome do discente-->
                                <td>
                                    <?php
                                        $aluno->seleciona($falta['aluno_num_matricula']);
                                        echo $aluno->getNome();
                                    ?>
                                </td>

                                <!--                    mostra a turma do discente-->
                                <td>
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
                                <td>
                                    <?php
                                        $turma->selecionaPorIdTurma($_disciplina_aluno['turma_idTurma']);
                                        $curso->selecionaPorIdCurso($turma->getCursoIdCurso());
                                        echo $curso->getNomeCurso();
                                    ?>
                                </td>

                                <!--                    mostra o turno do discente-->
                                <td>
                                    <?php
                                        $turno->seleciona($turma->getTurnoIdturno());
                                        echo $turno->getTurno();
                                    ?>
                                </td>

                                <!--                    mostra o nivel da falta causada pelo discente-->
                                <td>
                                    <?php
                                        $motivo->seleciona($falta['motivo_idMotivo']);
                                        $nivel_falta->selecionaPorId($motivo->getNivelfaltaIdNivelFalta());
                                        echo $nivel_falta->getNivelFalta();
                                    ?>
                                </td>

                                <!--                    mostra o motivo da falta-->
                                <td>
                                    <?php
                                        echo $motivo->getNome();
                                    ?>
                                </td>

                                <!--                    mostra a data de inicio da penalidade-->
                                <td>
                                    <?php
                                        $la_data = explode("-", $falta['data_inicio']);

                                        echo $la_data[2]."/".$la_data[1]."/".$la_data[0];
                                    ?>
                                </td>

                                <!--                    mostra a data final da penalidade-->
                                <td>
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




