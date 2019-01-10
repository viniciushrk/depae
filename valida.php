<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

    ini_set('Display_errors' , 'On');
    error_reporting(E_ALL);
    require_once("classes/Servidor.php");
    print_r($_POST);
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = $_POST['email'];
        $senha =$_POST['senha'];
    }else{
        header("location:index.php?aqui");
    }

    $servidor = new Servidor();

    if($servidor->autenticarLogin($email, $senha)){
        session_start();
        $_SESSION['cargo'] = $servidor->getCargoIdcargo();

        header("location:index.php?page=pag2");
    }else{
        header("location:index.php?erroLogin");
    }


?>
</body>
</html>