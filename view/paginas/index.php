<html lang="pt">
    <head>
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/login.css" rel="stylesheet">
        <script src="https://use.typekit.net/ayg4pcz.js"></script>
        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }</script>
    </head>
    <body>


        <?php
        if ($_GET) {
            if (!empty($_GET['erro'])) {
                require_once '../../utils/Message.php';
                Message::error("Login ou senha incorretos !");
            }
        }
        ?>
        <div class="container">
            <h1 class="welcome text-center">Bem vindo ao <br> Sistema</h1>
            <div class="card card-container">
                <h2 class='login_title text-center'>Login</h2>
                <hr>

                <form class="form-signin" action="../../controller/login/ValidaLogin.php" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <p class="input_title">Email</p>
                    <input type="text" id="inputEmail" name="inp_email" class="login_box" placeholder="" required autofocus>
                    <p class="input_title">Password</p>
                    <input type="password" id="inputPassword" name="inp_senha" class="login_box" placeholder="" required>

                    <button class="btn btn-lg btn-primary" type="submit">Login</button>
                    <label class="text-center">                      
                        <a href="../../view/paginas/CadastroUsuario.php"> Cadastre Aqui</a>
                    </label>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->
    </body>
</html>

