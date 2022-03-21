<?php
session_start();

if (!empty($_SESSION['active'])) {
    header('location: index.php');
}

if (!empty($_POST)) {

    require "login/buscarLogin.php";
    $consulta = array($_POST['usuario'], $_POST['password']);

    $datos = new Sentencia();
    $array_datos = $datos->get_datos($consulta);

    if ($array_datos[1] == 1) {
        $_SESSION['active'] = true;
        $_SESSION['user'] = $array_datos;

        header('location: index.php');
    } else {
        $error = 'El usuario no existe';
        session_destroy();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="login/login.css">

</head>

<body>
    <div class="columns is-vcentered">
        <div id="particles-js" class="interactive-bg column is-8"></div>
        <script src="login/js/particles.js"></script>
        <script src="login/js/app.js"></script>
        <div class="login column is-4 ">
            <section class="section">
                <form method="post" action="">
                    <div class="has-text-centered">
                        <img class="login-logo" src="login/user_icon.png">
                    </div>
                    <div class="alert"><?php echo (isset($error) ? $error : '') ?></div>

                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control has-icons-right">
                            <input class="input is-primary" name="usuario" type="text">
                            <span class="icon is-small is-right">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-right">
                            <input class="input is-primary" name="password" type="password">
                            <span class="icon is-small is-right">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                    </div>
                    <div class="has-text-centered">
                        <input type="submit" name="submit_btn" class="button is-vcentered is-primary is-outlined">
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>

</html>