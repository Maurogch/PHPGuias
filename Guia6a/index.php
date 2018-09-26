<?php
require_once "Config/Autoload.php";

use Model\User as User;
use Repository\BillRepository as BillRepository;

$errorMessage = "";

if ($_POST) {
    $userName = isset($_POST["userName"]) ? $_POST["userName"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $defaultUser = "user";
    $defaultPassword = "a";

    if ($userName == $defaultUser && $password == $defaultPassword) {
        session_start();

        $user = new User();
        
        $user->setUserName($userName);
        $user->setPassword($password);

        $_SESSION["userLogged"] = $user;
        $_SESSION["billRepository"] = new BillRepository();

        header("location:main.php");
    } else {
        $errorMessage = "Usuario o clave incorrectos";
    }

} else {
    $code = isset($_GET["code"]) ? $_GET["code"] : "";

    if ($code == "Error") {
        $errorMessage = "No hay sesión, debe logearse primero";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="?" >
            <section>
                <div><label for="userName">Usuario: </label><input type="text" name="userName" /><br><br></div>
                <div><label for="password">Password: </label><input type="password" name="password" /><br><br></div>
                <div><input type="submit" value="Login"></div>
            </section>
            <div><?=$errorMessage?></div>
        </form>
    </div>
</body>
</html>