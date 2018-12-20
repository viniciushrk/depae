<!-- Login -->

<div class="col-lg-4 mx-auto mt-0 position-relative">
    <div class="card">
        <div class="card-body text-center">
<!--            <img src="img/IFA.png" width="50px" class="float-right">-->

                <div class="form-group">
                    <h2>Login</h2>
                        <input type="email" class="form-control" id="email" placeholder="e-mail">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="senha" placeholder="senha">
                </div>

                <label >
                    <input type="checkbox"> Lembrar usuário
                </label><br>

                <a class="<?php if($page == "pag2"){ echo "active";}?> " href="index.php?page=pag2"><button type="submit" class="btn btn-success" >Entrar</button></a>

            </div>
    </div>
</div>

