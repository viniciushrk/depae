<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="card container position-relative" style="text-align: center">
    <div class="card-body">

<?php
//require_once "PHPMailer\_lib\class.phpmailer.php";
require_once ("classes/Servidor.php");
require_once "header.php";
$servidor = new Servidor();
$servidor->selecionaSiape($_POST['siape']);
$msg = "Olá ".$servidor->getNome().", foi efetuada a solicitação de recuperação de senha.<br><h3>Senha: </h3>".$servidor->getSenha();
echo $msg;
?>
    <br>
    <br>
    <br>
    <a class="btn btn-success" href="index.php">Fazer login</a>
</div>
</div>
</body>
