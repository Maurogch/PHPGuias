<?php

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
            }
            table{
                margin: 15px auto;
                border: 3px;
                border-style: solid;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <section>
            <h1>Agregar Estudiante</h1>
            <form action="?" method="POST">
                <table>
                    <tr>
                        <td><label for="firstName">Nombre: </label><input type="text" name="firstName" /></td>
                    </tr>
                    <tr>
                        <td><label for="lastName">Apellido: </label><input type="text" name="lastName" /></td>
                    </tr>
                    <tr>
                        <td><label for="address">Dirección: </label><input type="text" name="address" /></td>
                    </tr>
                </table>
                <input type="submit" value="Agregar" />  <input type="button" value="Volver" onclick="document.location.href='main.php'"><br><br>
            </form>
        </section>
    </div>
</body>
</html>