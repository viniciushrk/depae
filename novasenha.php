<body>
<form method="post" action="insereAtualiza.php">
    <?php
    if(isset($_GET['erro'])){ ?>
        <div class="alert alert-danger">Senhas não conferem</div>
    <?php }
    if(isset($_GET['id'])){
    require_once "classes/Servidor.php";
    require_once "classes/Cargo.php";
    $servidor = new Servidor();
    $servidor->selecionaPorIdServidor($_GET['id']);

    ?>

    <h1>Atualizar usuário</h1><br>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="<?php echo $servidor->getNome();?>" disabled>
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
            <select name="cargo" class="form-control" disabled>
                <option value="" disabled selected>Escolha...</option>
                <?php
                //require_once "classes/Cargo.php";
                $cargo = new Cargo();
                $cargos = $cargo->listaCargos();
                foreach ($cargos as $cargo) {?>
                    <?php if ($_SESSION['cargo'] != 1 && $cargo['idCargo'] == 1) {continue;}?>
                    <option value=<?php echo $cargo['idCargo']; if($servidor->getCargoIdcargo() == $cargo['idCargo']) echo "selected"; ?>><?php echo $cargo['cargo']?></option>

                <?php }?>
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
</body>
