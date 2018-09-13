<?php
    require_once("autoload.php");

    use Classes\User as User;

    if($_POST){
        $user = isset($_POST["user"]) ? $_POST["user"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $defaultUser = "a";
        $defaultPassword = "a";

        if($user == $defaultUser && $password == $defaultPassword){
            session_start();
            $user = new User();
            $user->setUser($user);
            $user->setPassword($password);

            $_SESSION["userLogged"] = $user;

            header("location:main.php");
        } else echo "Usuario o clave incorrectas";
        
    }else{
        echo "No hay post";   
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
                <label for="user">Usuario: </label><input type="text" name="user" /><br><br>
                <label for="password">Password: </label><input type="password" name="password" /><br><br>
                <input type="submit" value="Login">
            </section>
        </form>
    </div>
</body>
</html>