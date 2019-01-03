<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 03/01/2019
 * Time: 15:59
 */
require_once "classes/Aluno.php";

if (isset($_POST['turma'])) {
    $alunos = new Aluno();
    echo json_encode($alunos->listaAlunosDaTurma($_POST['turma']));
}else{
    echo false;
}
