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
                padding: 10px;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <h1>Bienvenido</h1>
        <section>
            <div><a href="addStudent.php">Agregar Alumno</a></div>
        </section>
        <section>
            <div><a href="listStudents.php">Listar Alumnos</a></div>
        </section>
    </div>
</body>
</html>