<?php

    function f() {
        session_destroy();
        require_once "login.php";
    }

    session_start();

    require_once "header.php";

    if ((isset($_SESSION['cargo']) && $_SESSION['cargo'] < 8)) {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            require_once "menu2.php";
            require_once $page . '.php';
        } else {
            require_once "menu2.php";
            require_once 'pag2.php';
        }
    }else{
        if (isset($_GET['page']) and $_GET['page'] === "esqueci") {
            require_once 'esqueci.php';
        } else {
            f();
        }
    }

    require_once "footer.php";

