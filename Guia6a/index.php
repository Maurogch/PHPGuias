<?php
    require_once("Config/Autoload.php");

    use Model\User as User;

    $errorMessage = "";

    if($_POST){
        $userName = isset($_POST["userName"]) ? $_POST["userName"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $defaultUser = "a";
        $defaultPassword = "a";

        if($userName == $defaultUser && $password == $defaultPassword){
            session_start();
            $user = new User();
            $user->setUserName($userName);
            $user->setPassword($password);

            $_SESSION["userLogged"] = $user;
            //var_dump($_SESSION["userLogged"]);
            header("location:main.php");
        } else $errorMessage = "Usuario o clave incorrectos";
        
    }else{
        $code = isset($_GET["code"]) ? $_GET["code"] : "";

        if($code == "Error")
            $errorMessage = "No hay sesión";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            *{
                text-align: center;
                /*width: 100%*/
                box-sizing: border-box;
            }
            .wrapper{
                width: 400px;
                margin: 0 auto;
                border: 1px;
                border-style: solid;
            }
            section{
                border: 1px;
                border-style: solid;
                margin: 5px;
                padding: 10px;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="?" >
            <section>
                <label for="userName">Usuario: </label><input type="text" name="userName" /><br><br>
                <label for="password">Password: </label><input type="password" name="password" /><br><br>
                <input type="submit" value="Login">
            </section>
            <div><?= $errorMessage ?></div>
        </form>
    </div>
</body>
</html>