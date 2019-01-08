<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

</head>
<body>
<?php
require_once "classes/Servidor.php";
session_start();
if(!isset($_SESSION['cargo'])){
    header('location:index.php');
}

$servidor = new Servidor();

if($_POST['senha'] === $_POST['senhaC'])
{
    if (isset($_POST['id'])) {
        $servidor->selecionaPorIdServidor($_POST['id']);
        $servidor->setNome($_POST['nome']);
        $servidor->setCargoIdcargo($_POST['cargo']);
        $servidor->setLoginEmail($_POST['email']);
        $servidor->setSenha($_POST['senha']);
        $servidor->setSiape($_POST['siape']);
        $servidor->atualizar();
        header("Location: index.php?page=pag11");
    } else {
        $servidor->setNome($_POST['nome']);
        $servidor->setCargoIdcargo($_POST['cargo']);
        $servidor->setLoginEmail($_POST['email']);
        $servidor->setSenha($_POST['senha']);
        $servidor->setSiape($_POST['siape']);
        $servidor->setStatus('A');
        $servidor->salvar();
        header("Location: index.php?page=pag11");
    }
}else{
    header("Location: ".$_SERVER['HTTP_REFERER']."&erro");
}
?>
</body>
</html>