<?php
    include_once("Argentino.php");
    include_once("Ingles.php");
    include_once("Portugues.php");

    $noPost = false;

    if($_POST){
        $idioma = isset($_POST["radioIdioma"]) ? unserialize(base64_decode($_POST["radioIdioma"])) : ""; //recibe el objeto del respectivo idioma
        $accion = isset($_POST["radioAccion"]) ? $_POST["radioAccion"] : ""; //recibe el nombre del metodo
        $text = isset($_POST["textArea"]) ? $_POST["textArea"] : ""; //recibe el texto opcional del metodo "Otro"
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guia Especial Resultado</title>
    <style>
        *{
            text-align: center;
            box-sizing: border-box;
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
            border: 3px;
            border-style: solid;
        }
        h1{
            color: darkred;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>
            <?php echo call_user_func_array(array($idioma, $accion), array($text));  //deben siempre ir ambos array, incluso si el segundo debe estar vacio ?>
        </h1>
        <button onclick="window.location.href='index.php'">RETURN</button>
        <br><br>
    </div>
</body>
</html>
