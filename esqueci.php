

<body>

<br>
<br>
<br>
<div class="col-xl-5 col-lg-5 col-md-8 col-sm-10 mx-auto mt-6">
<div class="card text-center">
    <div class="card-body text-center">

        <h1>Esqueci a senha</h1><br>
        <form method="post" action="#">
            <div class="form-row text-center">
                <div class="form-group col-lg-12 text-center" style="padding: 12px;">
                    <label for="siape">Siape</label>
                    <input type="text" class="form-control"  name="siape" id="siape" placeholder="siape" value="<?php ?>" required>
                    <br>
                </div>
                <!--   <div class="form-group col-lg-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="<?php /**/?>" required>
            </div>-->
                <!--<div class="form-group col-lg-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="">
                </div>-->
                <br>


                <div class="form-group col-lg-12">
                    <input class="btn btn-success float-right" type="submit" name="verificar" value="verificar" required>
                    <a href="index.php?page=novasenha"></a>

                    <!--<button class="btn btn-success float-lg-right float-right" type="submit" name="verificar" value="verificar" href="novasenha.php">Verificar</button>-->
                    <a href="index.php?page=<?php if (isset($_GET['http_referer'])) { echo $_GET['http_referer'];} ?>"><button type="button" class="btn btn-danger float-left" name="cancelar">Cancelar</button></a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</body>
<?php
require_once "PHPMailer\_lib\class.phpmailer.php";
require_once ("classes/Servidor.php");
$servidor = new Servidor();
$servidor->selecionaSiape('siape');


$msg = "Olá ".$servidor->getNome().", foi efetuada a solicitação de recuperação de senha.<br><h3>Senha: </h3>".$servidor->getSenha();

$mail = new PHPMailer();

//$mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'depae.calama4@gmail.com';
    $mail->Password = 'depaecalama4';

    $mail->set('depae.calama4@gmail.com', 'DEPAE');
    $mail->AddReplyTo('depae.calama4@gmail.com', 'DEPAE');
    $mail->Subject = 'Recuperação de senha';

    $mail->AddAddress($servidor->getLoginEmail(), $servidor->getNome());

    $mail->MsgHTML($msg);

    $mail->Send();


?>
