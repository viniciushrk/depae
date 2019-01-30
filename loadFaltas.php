<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 30/01/2019
 * Time: 17:33
 */

if (isset($_POST['ano'])){
    require_once "classes/Faltas.php";
    echo json_encode((new Faltas())->selecionaFaltasDoAno($_POST['ano']));
}