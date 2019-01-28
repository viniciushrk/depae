<!-- lista de usuarios ativados -->
<?php
    if (isset($_SESSION['cargo']) && $_SESSION['cargo'] < 3) {
        ?>
        <div class="mx-auto mt-6">

           <div class="mx-auto mt-6">
                    <a class="<?php if ($page == "pag11") {
                        echo "active";
                    } ?>" href="index.php?page=pag12">
                        <button type="button" class="btn btn-outline-success float-left mb-3" >
                            - Ir para lista de usuários desativados
                        </button>
                    </a>
                    <a class="<?php if ($page == "pag11") {
                        echo "active";
                    } ?>" href="index.php?page=pag5">
                        <button type="button" class="btn btn-outline-success float-right mb-3">
                            + Adicionar novo usuário
                        </button>
           </div>
            </a>

            <div class="table">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once('classes/Servidor.php');
                    $servidor = new Servidor();
                    $servidores = $servidor->listaServidoresAtivados();

                    foreach ($servidores as $linha) {
                        if($_SESSION['cargo'] != 1 && $linha['cargo_idCargo'] > 1){
                        ?>

                        <tr>
                            <td>
                                <a href="index.php?page=desativa&id=<?php echo $linha['idServidor']; ?>"><img class="img2"
                                                                                                   src="open-iconic-master/svg/x.svg"></a>
                            </td>
                            <td><?php echo $linha['nome']; ?></td>
                            <td><?php echo $linha['login_email'];?></td>
                            <td>
                                <a href="index.php?page=pag5&id=<?php echo $linha['idServidor']; ?>&http_referer=<?php echo $page?>"><img class="img2"
                                                                                                          src="open-iconic-master/svg/pencil.svg"></a>
                            </td>
                        </tr>
                    <?php }elseif($_SESSION['cargo'] == 1 && $linha['cargo_idCargo'] >= 1){?>
                            <tr>
                                <td>
                                    <a href="index.php?page=desativa&id=<?php echo $linha['idServidor']; ?>"><img class="img2"
                                                                                                                  src="open-iconic-master/svg/x.svg"></a>
                                </td>
                                <td><?php echo $linha['nome']; ?></td>
                                <td><?php echo $linha['login_email'];?></td>
                                <td>
                                    <a href="index.php?page=pag5&id=<?php echo $linha['idServidor']; ?>&http_referer=<?php echo $page?>"><img class="img2"
                                                                                                                                              src="open-iconic-master/svg/pencil.svg"></a>
                                </td>
                            </tr>


                            <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }else{
        header("Location: index.php");
    }
?>