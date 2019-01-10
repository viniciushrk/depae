<?php
/**
 * Created by PhpStorm.
 * User: k4io_
 * Date: 08/10/2018
 * Time: 15:58
 *
 */
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: green">
  <a class="navbar-brand text-white text-light:hover" href="index.php?page=pag2">RDD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php
        if($_SESSION['cargo'] < 3){?>
            <li class="nav-item">
                <a class="nav-link text-white text-light:hover<?php if($page == "pag11"){ echo "active";}?>" href="index.php?page=pag11">
                    Usuários
                </a>
            </li>
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link text-white text-dark:hover<?php if($page == "pag4"){ echo "active";}?>" href="index.php?page=pag4&http_referer=<?php echo $page;?>">
                Cadastro de falta
            </a>
        </li>

      <li class="nav-item text-dark:hover">
        <a class="nav-link text-white text-dark:hover<?php if($page == "pag6"){ echo "active";}?>" href="index.php?page=pag6&http_referer=<?php echo $page;?>" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Relatório de falta
        </a>
<!--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--              <a class="dropdown-item --><?php //if($page == "pag6"){ echo "active";}?><!--" href="index.php?page=pag6">Geral</a>-->
<!--              <a class="dropdown-item --><?php //if($page == "pag7"){ echo "active";}?><!--" href="index.php?page=pag7">Curso</a>-->
<!--              <a class="dropdown-item --><?php //if($page == "pag10"){ echo "active";}?><!--" href="index.php?page=pag10">Turma</a>-->
<!--              <a class="dropdown-item --><?php //if($page == "pag8"){ echo "active";}?><!--" href="index.php?page=pag8">Turno</a>-->
<!--              <a class="dropdown-item --><?php //if($page == "pag9"){ echo "active";}?><!--" href="index.php?page=pag9">Falta</a>-->
<!--            </div>-->
      </li>
        <?php if($_SESSION['cargo'] < 3){  ?>
        <li class="nav-item">
                <a class="nav-link text-white text-dark:hover<?php if ($page == "pag4") {
                    echo "active";
                } ?>" href="index.php?page=Inserir_aluno&http_referer=<?php echo $page; ?>">
                    Inserir aluno
                </a>
        </li>
        <?php }?>
    </ul>
    <a href="logout.php" class="my-2 my-lg-0">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">Sair</button>
    </a>
  </div>
</nav>