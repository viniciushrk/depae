<?php
session_start();
if(isset($_GET['page']) && isset($_SESSION['cargo']) && $_SESSION['cargo'] < 8){
    $page = $_GET['page'];
    require_once "header.php";
    require_once "menu2.php";
    require_once $page.'.php';
}else{
    session_destroy();
    require_once "header.php";
    if(isset($_GET['page']) && $_GET['page'] == 'esqueci'){
        require_once "esqueci.php";
    }else{
        require_once "login.php";
    }

}

require_once "footer.php";
