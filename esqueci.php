

<body>

<br>
<br>
<br>
<div class="card">
    <div class="card-body">

        <h1>Esqueci a senha</h1><br>
        <form method="get" action="novasenha.php">
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="siape">Siape</label>
                <input type="text" class="form-control" name="siape" id="siape" placeholder="siape" value="<?php ?>" required>
                <br>
            </div>
            <!--   <div class="form-group col-lg-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="<?php /**/?>" required>
            </div>-->
            <div class="form-group col-lg-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="">
            </div>
            <div class="form-group">
                <input class="btn btn-success float-right" type="submit" name="verificar" value="verificar" required>
                <a href="index.php?page=novasenha"></a>

                <!--<button class="btn btn-success float-lg-right float-right" type="submit" name="verificar" value="verificar" href="novasenha.php">Verificar</button>-->
                <a href="index.php?page=<?php if (isset($_GET['http_referer'])) { echo $_GET['http_referer'];} ?>"><button type="button" class="btn btn-danger float-left" name="cancelar">Cancelar</button></a>
            </div>
        </div>
    </form>
    </div>
</div>
</body>
