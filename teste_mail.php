<?php
/**
 * Created by PhpStorm.
 * User: viniciushrk
 * Date: 28/12/2018
 * Time: 16:52
 */
include('PHPMailer\_lib\class.phpmailer.php');
require_once ('classes/Servidor.php');

$servidor = new Servidor();

$msg = "Olá ".$servidor->selecionaSiape('siape').", foi efetuada a solicitação de recuperação de senha.<br><h3>Senha: </h3>".$servidor->getSenha();

$mail = new PHPMailer();

//$mail->IsSMTP();

try {
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'depae.calama4@gmail.com';
    $mail->Password = 'depaecalama4';

    $mail->From = 'depae.calama4@gmail.com';
    $mail->FromName = 'DEPAE';
    $mail->AddReplyTo('depae.calama4@gmail.com', 'DEPAE');
    $mail->Subject = 'Recuperação de senha';

    $mail->AddAddress($servidor->getLoginEmail());

    $mail->MsgHTML($msg);

    if($mail->send()){
        echo "enviado";
    }else{
        echo "não enviado";
    }

} catch (PHPExcel_Exception $e) {
    echo $e->getMessage(); //Mensagem de erro costumizada do PHPMailer
}