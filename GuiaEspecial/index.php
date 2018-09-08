<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Guía Especial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
            *{
                text-align: center;
                /*width: 100%*/
                box-sizing: border-box;
            }
            .wrapper{
                width: 600px;
                margin: 0 auto;
                border: 1px;
                border-style: solid;
            }
            section{
                border: 1px;
                border-style: solid;
                margin: 5px;
            }
            div{
                margin: 10px;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <form action="procesar.php" method="POST">
            <section>
                <h1>Saludando</h1>
            </section>
            <section>
                <div>SELECCIONE UN IDIOMA</div>
                <div>
                    <input type="radio" name="radioIdioma" value="arg" checked /> Argentino
                    <input type="radio" name="radioIdioma" value="ing" /> Ingles
                    <input type="radio" name="radioIdioma" value="por" /> Portugues
                    <hr>
                    <div>SELECCIONE UNA ACCIÓN</div>
                    <input type="radio" name="radioAccion" value="saludar" checked /> Saludar
                    <input type="radio" name="radioAccion" value="despedirse" /> Despedirse
                    <input type="radio" name="radioAccion" value="otro" /> Otro
                    <div><textarea name="textArea" rows="4" cols="50" placeholder="Mensaje|Message|Mensagem"></textarea></div>
                </div>
            </section>
            <section>
                <div>ACCION</div>
                <div><input type="submit" value="PROCESAR" /></div>
            </section>
        </form>
    </div>
</body>
</html>