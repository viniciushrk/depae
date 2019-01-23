
<?php
/**
 * Created by PhpStorm.
 * User: viniciushrk
 * Date: 23/10/2018
 * Time: 16:16
 */
//if (isset($_SESSION['cargo']) && $_SESSION['cargo'] > 0 && $_SESSION['cargo'] < 8) {
if(true){

    require_once "classes/Curso.php";
    require_once "classes/Turno.php";
    require_once "classes/Turma.php";



    if (isset($_POST['curso'])){
        $turmas = new Turma();

        if (isset($_POST['turno'])) {
            echo json_encode($turmas->selecionaTurmasPorIdCursoETurno($_POST['curso'],$_POST['turno']));
        }else{
            echo json_encode($turmas->selecionaTurmasPorIdCurso($_POST['curso']));
        }
    }
}else{
    header("location: index.php");
}
?>