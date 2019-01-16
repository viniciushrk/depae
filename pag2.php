<!-- Administrador -->

<div class="row position-relative">
            <?php
            if($_SESSION['cargo'] < 3){?>
                <!-- lista de usuários -->
                <div class="col-auto mt-7">
                    <a href="index.php?page=pag11&http_referer=<?php echo $page?>">
                        <button type="button" class="btn btn-success ButHome">
                            <img class="img1 iconbranco" src="open-iconic-master/svg/people.svg">
                            Usuários
                        </button>
                    </a>
                </div>
            <?php } ?>

            <?php
            if($_SESSION['cargo'] < 3){?>
            <!-- Botão de Cadrastro de usuário página do Administrador -->
            <div class="col-auto mt-7">
               <a href="index.php?page=pag5&http_referer=<?php echo $page?>">
                   <button type="button" class="btn btn-success ButHome">
                       <img class="img1 iconbranco" src="open-iconic-master/svg/person.svg">
                       Cadastro de usuário
                   </button>
               </a>
            </div>
            <?php } ?>
            <!-- Botão de Cadrastro de falta página do Administrador -->
            <?php if($_SESSION['cargo'] < 4) {?>
            <div class="col-auto mt-7">
                <a href="index.php?page=pag4&http_referer=<?php echo $page?>">
                    <button type="button" class="btn btn-danger ButHome">
                        <img class="img1 iconbranco" src="open-iconic-master/svg/plus.svg">
                        Cadastro de falta
                    </button>
                </a>
            </div>
            <?php }?>
            <!-- Botão de Relatório de falta página do Administrador -->
            <div class="col-auto mt-7">
                <a href="index.php?page=pag6&http_referer=<?php echo $page?>">
                    <button type="button" class="btn btn-primary ButHome">
                        <img class="img1 iconbranco" src="open-iconic-master/svg/book.svg">
                        Relatório de falta
                    </button>
                </a>
            </div>
        <?php if($_SESSION['cargo'] <3){?>
        <div class="col-auto mt-7">
            <a href="index.php?page=Inserir_aluno&http_referer=<?php echo $page?>">
                <button type="button" class="btn btn-secondary">
                    <img class="img1 iconbranco" src="open-iconic-master/svg/plus.svg">
                    Inserir aluno
                </button>
            </a>
        </div>
        <?php }?>
</div>





