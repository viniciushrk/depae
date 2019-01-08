<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 12/12/2018
 * Time: 14:14
 */

require_once "classes/Faltas.php";
require_once "classes/Aluno.php";
require_once "classes/Motivo.php";

set_time_limit(5);

$faltas = new Faltas();
$aluno = new Aluno();
$motivo = new Motivo();

$dataInicio = "";

print_r($_POST);

if ($aluno->seleciona($_POST['nome']) !== 0 && $motivo->seleciona($_POST['motivo']) !== 0) {
    if (preg_match("/20[0-9][0-9]-[0-1][0-9]-[0-3][0-9]/", $_POST['data']) == 1) { // 2000-00-00<->2099-19-39 (quem se encarrega das datas válidas é o datepicker)
        $dataInicio = $_POST['data'];

    }elseif (preg_match("/[0-3][0-9]\/[0-1][0-9]\/[0-2]0[0-9][0-9]/", $_POST['data']) == 1) {
        $data = explode('/', $_POST['data']);
        $dataInicio = $data[2].'-'.$data[1].'-'.$data[0];

    }else{
        echo "Data errada";
        header("Location: index.php?page=pag6");
    }

    $faltas->setDataInicio($dataInicio);
    $faltas->setAlunoNumMatricula($_POST['nome']);
    $faltas->setMotivoIdMotivo($_POST['motivo']);
    $faltas->salvar();
    echo "salvou!";
}else{
    echo "Erro";
    header("Location: index.php?page=pag2");

}

header("Location: index.php?page=pag6");

?>
</body>
</html>
