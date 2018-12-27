<!-- Login -->
<div class="container">


        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10 mx-auto mt-6">
            <div class="card">
                <div class="card-body text-center">
                    <form method="post" action="valida.php">
                        <div class="form-group">
                        <!-- Titulo -->
                        <h2>Login</h2>

                        <!-- Caixa de texto Email -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="e-mail" required>
                    </div>

                    <!-- Caixa de texto Senha-->
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="senha" required>
                    </div>

                    <!-- Checkbox Esqueci minha senha -->
                    <label>
<<<<<<< HEAD
                        <a  href="index.php?page=esqueci.php">Esqueci minha senha</a>
=======
                        <a href="index.php?page=esqueci">
                            Esqueci minha senha
                        </a>
>>>>>>> 4b6a1ccfc8791da56c8f2bccb55ddc130dd4b434
                    </label>
                        <br>

                    <!-- Botão Entrar -->

                        <button type="submit" class="btn btn-success">
                            Entrar
                        </button>
                    </form>

                    <?php
                    if(isset($_GET['erroLogin'])) {
                        ?>
                        <div class="alert alert-danger">Login ou senha inválido</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>


