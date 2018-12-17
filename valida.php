<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    require_once("classes/Servidor.php");
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = $_POST['email'];
        $senha = crypt($_POST['senha'], "password");
    }else{
        header("location:index.php&aqui");
    }

    $servidor = new Servidor();
    if($servidor->autenticarLogin($email, $senha)){
        session_start();
        $_SESSION['cargo'] = $servidor->getCargoIdcargo();
        if($servidor->getCargoIdcargo() < 3){
            header("location:index.php?page=pag2");
        }elseif($servidor->getCargoIdcargo() == 3){
            header("location:index.php?page=pag2");

        }else{
            header("location:index.php?page=pag2");
        }

    }else{
        header("location:index.php?erroLogin");
    }


?>
</body>
</html>