
<head>
    <meta charset="UTF-8">

</head>
<body>
    <form method="post">
        <h1>Atualizar usuário</h1><br>

        <div class="form-row">

            <div class="form-group col-lg-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="<?php echo $servidor->getNome();?>" required>
            </div>

            <div class="form-group col-lg-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $servidor->getLoginEmail();?>" required>
            </div>
        </div>
    </form>
</body>
