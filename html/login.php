<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logiciel De Stock - Authentification</title>
    <link rel="stylesheet" type="text/css" href="design/login.css"/>
    <script type="text/javascript" src="design/jquery.js"></script>
    <script type="text/javascript">
        function startup() {
            $("#wrapper").fadeIn(500);
        }
    </script>
    <?php
    $system_id = "";
    ?>
</head>
<body onload="startup()">
<div id="wrong pass">
    <?php
    $able = 0;
    include 'global.php';
    session_start();
    if (!mysqli_select_db($link,'dap2'))
        header("Location:install/index.php");
    if (isset($_GET['usr_email']) && isset($_GET['pwd'])) {
        $tim = date("H:i", time());
        $dat = date("Y-m-d");
        $pass = "";
        $username = $_GET['usr_email'];
        $password = strtolower($_GET['pwd']);
        $ip = $_SERVER['REMOTE_ADDR'];
        $request = mysqli_query($link,"SELECT * FROM users WHERE user = '" . strtolower($username) . "' ") or die (mysqli_error($link));
        if (mysqli_num_rows($request)) {
            while ($ligne = mysqli_fetch_array($request)) {
                $_SESSION["id_user"] = $ligne["id_user"];
                if (!strcmp($ligne["user"], "System")) {
                    $system_id = $ligne["id_user"];
                } else {
                    $able = $ligne['etat'];
                    $pass = $ligne['pass'];
                    $id_user = $ligne["id_user"];
                    $web = $ligne['web'];
                }
            }
            if (strtolower(($pass)) === strtolower(md5($password))) {
                $_SESSION['username'] = $username;
                $_SESSION["id_user"] = $ligne["id_user"];
                $needle = "192";
                $local_acces = 0;
                if (strncmp($ip, "192", 3) == 0) {
                    $local_acces = 1;
                }
                if (strncmp($ip, "127", 3) == 0) {
                    $local_acces = 1;
                }
                if (strncmp($ip, "::1", 3) == 0) {
                    $local_acces = 1;
                }
                if ($web === "1") {
                    if ($able === "1") {
                        $word = $username . " est en line ( $tim )";
                        header("Location:index.php");
                    } else
                        echo("Compte Desactivé");
                }
                if ($local_acces == 1 && $web === "0") {
                    if ($able === "1") {
                        $word = $username . " est en line ( $tim )";
                        header("Location:index.php");
                    } else
                        echo("Erreur 101 : Compte Desactivé");
                }
                if ($local_acces == 0 && $web === "0") {
                    echo("Erreur 102 : Accés par Web interdit ");
                }
            } else
                echo("<center>Erreur 103 : Mot de passe Incorecte !!</center>");
        } else
            echo("<center>Erreur 104 : Nom d'utilisateur Incorecte !!</center>");
    }
    ?>
</div>
<div id="wrapper">
    <center>
    </center>
    <form name="login-form" class="login-form" action="login.php" method="GET">
        <div class="header">
            <h1>&nbsp;</h1>
            <h1>&nbsp;</h1>
            <h1>Authentification </h1>
        </div>
        <div class="content">
            <input name="usr_email" type="text" autocomplete="off" autofocus="autofocus" class="input username"
                   placeholder="Utilisateur"/>
            <div class="user-icon"></div>
            <input name="pwd" type="password" class="input password" autocomplete="off" placeholder="Mot de Passe"/>
            <div class="pass-icon"></div>
        </div>
        <div class="footer">
            <input type="submit" name="doLogin" id="doLogin3" value="Connecter" class="button"/>
            <!-- <input type="submit" name="doLogin" id="forgot" value="Forgot" class="register" /> -->
            <!--		<input type="BUTTON" value="reset password" class="register" onclick="window.location.href='forgot.php'" />
            -->
        </div>
        <br/>
    </form>
    <div class="gradient"></div>
</div>
</body>
</html>
