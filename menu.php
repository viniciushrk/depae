<!-- Menu/ Barra de navegação -->

<nav id="navegação">

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a id="menu1" class="nav-link <?php if($page == "pag2"){ echo "active";}?>" href="index.php?page=pag2">
                Home
            </a>
        </li>

        <?php
        if(isset($_GET['admin'])){?>
            <li class="nav-item">
                <a id="menu2" class="nav-link <?php if($page == "pag11"){ echo "active";}?>" href="index.php?page=pag11">
                    Usuários
                </a>
            </li>
        <?php } ?>

        <li class="nav-item">
            <a id="menu3" class="nav-link <?php if($page == "pag4"){ echo "active";}?>" href="index.php?page=pag4">
                Cadastro de falta
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Relatório de faltas
            </a>

            <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php if($page == "pag6"){ echo "active";}?>" href="index.php?page=pag6">
                    Geral
                </a>

                <a class="dropdown-item <?php if($page == "pag8"){ echo "active";}?>" href="index.php?page=pag8">
                    Curso
                </a>

                <a class="dropdown-item <?php if($page == "pag10"){ echo "active";}?>" href="index.php?page=pag10">
                    Turno
                </a>

                <a class="dropdown-item <?php if($page == "pag7"){ echo "active";}?>" href="index.php?page=pag7">
                    Série
                </a>
                <a class="dropdown-item <?php if($page == "pag9"){ echo "active";}?>" href="index.php?page=pag9">
                    Falta
                </a>
            </div>
        </li>

        <li>
            <a class="<?php if($page == "menu"){ echo "active";}?>" href="index.php">
                Sair
            </a>
        </li>

    </ul>
</nav>