<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 28/11/2018
 * Time: 16:48
 */

$senha = "pao";
$bool = true;
$criptando = base64_encode($senha);
echo $criptando;

echo "<br>";

$senha = $criptando;

$desencriptando =base64_decode($senha);
echo $desencriptando;