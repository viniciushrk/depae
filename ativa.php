<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <?php
        if (isset($_SESSION) && $_SESSION['cargo'] > 0 && $_SESSION['cargo'] < 3) {

            require_once "classes/Servidor.php";

            if (isset($_GET['id'])) {
                $servidor = new Servidor();
                $servidor->selecionaPorIdServidor($_GET['id']);
                $servidor->setStatus('A');
                $servidor->atualizar();

                header("Location: index.php?page=pag11");
            } else {
                header("Location: index.php");
            }
        }else{
            header("Location: index.php");
        }

    ?>
</body>
</html>