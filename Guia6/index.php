<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "Config/Autoload.php";

use Config\Autoload as Autoload;
use Repository\UserRepository as UserRepository;

Autoload::Start();

session_start();

if(!isset($_SESSION["userLogged"])){
    if(!isset($_SESSION["userRepository"])){
        $_SESSION["userRepository"] = new UserRepository();
    }
}
else{
    echo "<script> alert('Ya se encuentra loggeado');";
    echo "window.location.href='public_html/Main.php'; </script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <form action="public_html\LoginProcess.php" method="POST" id="form1">
                <section>
                    <h2>Ingreso Administrador</h2>
                    <label for="usuario">Usuario: </label><input type="text" name="usuario" required /> <br><br>
                    <label for="password">Contraseña: </label><input type="password" name="password" required /><br><br>
                    <input type="submit" value="Login" />
                    <br><br>
                </section>
            </form>
            <form action="procesar2.php" method="POST" id="form2"></form> <!-- No usado por el momento -->
                <section>
                    <h2>Ingreso de Usuario</h2>
                    <label for="usuario">Legajo: </label><input type="text" name="usuario" required /> <br><br>
                    <input type="submit" value="Login" />
                    <br><br>
                </section>
            </form>
        </div>
    </body>
</html>
