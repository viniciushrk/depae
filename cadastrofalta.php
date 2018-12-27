<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    require_once"classes/Aluno.php";
    require_once "classes/Servidor.php";
    require_once "classes/Turma.php";
    session_start();
    if(!isset($_SESSION['cargo'])){
        header('location:index.php');
    }

    $aluno = new Aluno();
    $turma = new Turma();
    if(isset($_POST['id'])){

    }else
        $aluno->setNome($_POST['nome']);
        $turma->setSerie($_POST['serie']);
        $turma->setTurma($_POST['turma']);
        $turma->setPeriodoLetivo(2018);
        $turma->setTurnoIdTurno($_POST['turno']);
        $turma->setCursoIdCurso($_POST['curso']);

?>
</body>
</html>