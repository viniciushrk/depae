<body>
<form method="post" action="insereAtualiza.php">
    <?php
    require_once "header.php";
    if(isset($_GET['erro'])){ ?>
        <div class="alert alert-danger">Senhas não conferem</div>
    <?php }

    require_once "classes/Servidor.php";
    require_once "classes/Cargo.php";

    if(isset($_GET['siape']) and isset($_GET['email'])){
        $servidor = new Servidor();
        $servidor->selecionaSiape($_GET['siape']);
    ?>

    <h1>Atualizar usuário</h1><br>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="<?php echo $servidor->getNome();?>" disabled>
        </div>

        <div class="form-group col-lg-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $servidor->getLoginEmail();?>" disabled>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-lg-3">
            <label for="siape">Siape</label>
            <input type="text" class="form-control" id="siape" name="siape" placeholder="siape" value="<?php echo $servidor->getSiape();?>" disabled>
        </div>

        <div class="form-group col-lg-3">
            <label for="cargo">Cargo</label>
           <!-- <select name="cargo" class="form-control" disabled>-->
                <?php
                     $cargo= new Cargo();
                    /* $cargos = $cargo->seleciona($servidor->getCargoIdCargo());*/
                     $numServidor = $servidor->getCargoIdCargo();
                     $cargos= $cargo->listaCargos();
                    ?>
                    <input class="form-control" value="<?php echo $numServidor; ?>" disabled>

            </select>
        </div>

        <div class="form-group col-lg-3">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id='senha' name="senha" placeholder="senha" value="<?php echo $servidor->getSenha();?>" required>
        </div>

        <div class="form-group col-lg-3">
            <label for="senhaC">Confirmar senha</label>
            <input type="password" class="form-control" id='senhaC' name="senhaC" placeholder="confirmar senha" value="<?php echo $servidor->getSenha();?>" required>
        </div>

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success float-right" value="<?php echo $servidor->getIdServidor();?>" name="id">Atualizar</button>
        <a href="index.php?page=<?php if (isset($_GET['http_referer'])) { echo $_GET['http_referer'];} ?>"><button type="button" class="btn btn-danger float-left" name="cancelar">Cancelar</button></a>
    </div>

</form>
<?php } ?>
</body>
