<!-- Geral -->

<?php require_once "header.php";
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
                    <th scope="col">#</th>
                    <th class="col-xl-3" scope="col">Nome</th>
                    <th scope="col">Turma</th>
                    <th class="col-xl-2" scope="col">Curso</th>
                    <th scope="col-xl-3">Turno</th>
                    <th scope="col">Nível da falta</th>
                    <th scope="col-xl-">Motivo</th>
                    <th scope="col">Inicio da penalidade</th>
                    <th scope="col">Fim da penalidade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row"></td>

<!--                    mostra o nome do discente-->
                    <td>
                        <?php
                            require_once "classes/Aluno.php";
                            $aluno = new Aluno();
                        ?>
                    </td>

<!--                    mostra a turma do discente-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra o curso do discente-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra o turno do discente-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra o nivel da falta causada pelo discente-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra o motivo da falta-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra a data de inicio da penalidade-->
                    <td>
                        <?php

                        ?>
                    </td>

<!--                    mostra a data final da penalidade-->
                    <td>
                        <?php

                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>




