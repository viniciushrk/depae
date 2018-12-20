<!-- Cadastro de faltas -->
<script src="assets/js/jquery.min.js"></script>
<script type="application/javascript">

    function mycallback (curso, turno) {
        alert(curso + " " + turno);
        $.ajax({
            url: "queries_turma.php",
            data: {
                curso: curso,
                turno: turno
            },
            type: 'POST',
            success: function (result) {

                var turmas = JSON.parse(result);//alert(result);

                $('#serie > .f5').remove();
                for(var c = 0; c < turmas.length; c++) {

                    //alert(jo);
                    $('<option>', {value: turmas[c]['serie'], class: 'f5'}).appendTo('#serie').html(turmas[c]['serie'] + "° Ano");
                }

            }
        });
    }

    // $(document).ready(function() {
    //     $("#serie").click(mycallback);
    //     $("[name='curso']").change(mycallback);
    //     $("[name='turno']").change(mycallback);
    // });
</script>
<?php

if(isset($_SESSION['cargo'])){


    require_once "classes/Servidor.php";
    require_once "classes/Curso.php";
    require_once "classes/Aluno.php";
    require_once "classes/Turma.php";
    require_once "classes/Turno.php";
    require_once "classes/Nivel_falta.php";
    require_once "classes/Motivo.php";

    $cursos = new Curso();
    $turnos = new Turno();
    $turma = new Turma();
    $aluno = new Aluno();
    $nivel_falta = new Nivel_falta();
    $motivo = new Motivo();

    $cursos = $cursos->listaCurso();
    $turnos = $turnos->listaTurnos();
    $turma = $turma->listaTurma();
    $re = $aluno->listaAluno();
    $nivel_falta = $nivel_falta->listaFaltas();
    $motivo = $motivo->listaMotivo();

    $numDeMotivos = count($motivo);
    echo "<script>";
    echo "var motivos = new Array(".$numDeMotivos.");";
    echo "for (var c = 0; c < ".$numDeMotivos.";c++){
                motivos[c] = {
                                idMotivo: '', 
                                nome: '', 
                                servidor_idServidor: '', 
                                nivel_falta_idNivel_falta: ''
                            };
            }
    ";
    for ($c = 0; $c < $numDeMotivos; $c++) {
        echo   "motivos[".$c."]['idMotivo'] = ".$motivo[$c]['idMotivo'].";
                motivos[".$c."]['nome'] = \"".$motivo[$c]['nome']."\";
                motivos[".$c."]['servidor_idServidor'] = ".$motivo[$c]['servidor_idServidor'].";
                motivos[".$c."]['nivel_falta_idNivel_falta'] = ".$motivo[$c]['nivel_falta_idNivel_falta'].";
        ";
    }
    echo "</script>";


?>
<script src="assets/js/lixo.js"></script>
<div class="mx-auto mt-6">
    <div class="card ">
        <div class="card-body ">

            <form action="salvadorDeFaltas2000.php" method="post">




                    <h1>Cadastro de faltas</h1><br>

                    <div class="form-row ">

                        <div class="form-group col-xl-5">

                            <label for="curso">Curso</label>

                            <select name="curso" id="curso" class="form-control" onchange="mycallback(this.value, turno.value)">
                                <option value="" disabled selected >Escolha...</option>
                                <?php
                                    foreach ($cursos as $row) {
                                        echo "<option value='".$row['idCurso']."'>".$row['nome_curso']."</option>";
                                    }
                                ?>

                            </select>

                        </div>

                        <div class="form-group col-lg-3">
                            <label for="turno">Turno</label>
                            <select name="turno" id="turno" class="form-control" onchange="mycallback(curso.value, this.value)">
                                <option value="" disabled selected >Escolha...</option>
                                <?php
                                foreach ($turnos as $row) {
                                    echo "<option value='".$row['idTurno']."'>".$row['turno']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-2">
                            <label>Série</label>
                            <select name="serie" id="serie" class="form-control option">
                                <option value="" disabled selected>Escolha...</option>

                                <?php
                                    foreach($turma as $turma1){
                                        echo "<option value='".$turma1['idTurma']."'>".$turma1['serie']."</option>";
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-lg-2">
                            <label>Turma</label>
                            <select name="turma" class="form-control">
                                <option value="" disabled selected>Escolha...</option>
                                <?php
                                    foreach ($turma as $turma2){
                                        echo "<option value='".$turma2['idTurma']."'>".$turma2['idTurma']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-lg">

                            <label for="nome">Nome</label>

                            <select name="nome" class="form-control">

                                    <option value="" disabled selected> escolha</option>
                                    <?php
                                        foreach( $re  as $linha){
                                    ?>
                                        <option value="1" id="nome"><?php echo $linha['nome'];?></option>
                                    <?php }?>
                            </select>
                            <!--<input type="text" class="form-control" name="nome" placeholder="nome" required>-->

                        </div>

                        <div class="form-group col-lg-3">
                            <label for="nivelfalta">Nível da Falta</label>
                            <select name="nivel_falta" class="form-control" id="nivel_falta" onchange="ns()">
                                <option value="0" disabled selected>Escolha...</option>
                                <?php
                                    foreach ($nivel_falta as $faltas){
                                        echo "<option value='".$faltas['idNivel_falta']."'>".$faltas['nivel_falta']."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="motivo">Motivo</label>

                                <select name="motivo" class="form-control" id="pena">
                                    <option value="" disabled selected>Escolha...</option>
                                    <option value="" class="apagarAposSelecaoNivelFalta" disabled >Leve:</option>

                                    <?php

                                    $nvl2 = true;
                                    $nvl3 = true;
                                    foreach ($motivo as $motivo1){
                                        if ($motivo1['nivel_falta_idNivel_falta'] == 2){
                                            if ($nvl2){
                                                echo "<option value=\"\" class='apagarAposSelecaoNivelFalta' disabled >Média:</option>";
                                                $nvl2 = false;
                                            }
                                            echo "<option nivel_falta='2' value='".$motivo1['idMotivo']."'>".$motivo1['nome']."</option>";
                                        }elseif ($motivo1['nivel_falta_idNivel_falta'] == 3) {
                                            if ($nvl3){
                                                echo "<option value=\"\" class='apagarAposSelecaoNivelFalta' disabled >Grave:</option>";
                                                $nvl3 = false;
                                            }
                                            echo "<option nivel_falta='3' value='".$motivo1['idMotivo']."'>".$motivo1['nome']."</option>";
                                        }else{
                                            echo "<option nivel_falta='1' value='".$motivo1['idMotivo']."'>".$motivo1['nome']."</option>";
                                        }

                                    }


                                    ?>


                                </select>
                            </div>


                            <!--                    <label for="exampleFormControlTextarea1">Motivo</label>-->
                            <!--                    <textarea class="form-control" name="motivo"></textarea>-->

                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success float-right" value="Confirmar" name="confirmar">
                            <a href="index.php?page=<?php if (isset($_GET['http_referer'])) { echo $_GET['http_referer'];} ?>"><button type="button" class="btn btn-danger float-left" name="cancelar">Cancelar</button></a>
                        </div>

                    </div>
            </form>

        </div>
        </div>
    </div>


<?php

}else{
    header("location: index.php");

} ?>
