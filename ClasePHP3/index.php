<?php
    /*
    Topics
    Namepaces / use
    spl_upload_register
    Interfaces
    Session
    Login and Session Example
    */

    //NAMESPACE a method to categorize classes (DAO)

    //require_once("Model\Person.php");
    //require_once("Model\Pet.php");  //not needed because of autoload.php
    require_once("autoload.php"); //loads dynamicaly the required files as it needs them
    //require_once("../autoload.php"); //if autoload or what you want is one folder up in the tree

    use Model\Person as Person; //alias so you not need to use Model/Person everytime
    use Model\Pet as Pet;  //by setting this line not only you use the namespace, but you give instructions for autoload
    use Model\User as User;

    $error;
    $person = new Person();

    $person->setLastName("Perez");

    $pet = new Pet();

    //call a Pet method here

    //SESSION//

    $user =  new User();

    if($_POST){
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $defaultEmail = "a@a.com";
        $defaultPassword = "1234";

        if($email == $defaultEmail && $password == $password){
            $user = new User();  //try not to use constructors
            $user->setEmail($email);
            $user->setPassword($password);

            session_start(); //function must be used to start a session

            $_SESSION["userLogged"] = $user; //saves the variable $user in the session

            header("location:main.php");  //redirections to another page, can be internal or external (google.com)
            //restriction, there can NOT be html code before this function
        }else {
            $message = "Wrong credentials";
        }
    }else{
        $error = isset($_GET["message"]) ? $_GET["message"] : "";
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="?">
        <table border="1">
        <tr>
            <td colspan="2">Iniciar sesión</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" /></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Login"></td>
        </tr>
        <tr>
            <td><?= $error?></td>
        </tr>
        </table>
    </form>
</body>
</html>