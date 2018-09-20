<?php

    session_start();

    if(!isset($_SESSION["userLogged"])){
        session_destroy();
        header("location:index.php?code=Error");
    }else{
    }
    
    $disabled = "";
    
    if(isset($_POST["nombre"]))
    {
        $nombre = $_POST["nombre"];
        $disabled = "disabled";
    }else $nombre = "";
    isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    isset($_POST["DNI"]) ? $_POST["DNI"] : "";
    isset($_POST["email"]) ? $_POST["email"] : "";
    isset($_POST["fechaNacimiento"]) ? $_POST["fechaNacimiento"] : "";
    isset($_POST["tipoFactura"]) ? $_POST["tipoFactura"] : "";

    //cargar datos en clase factura y pasarlos a los campos y desabilitarlos
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
                box-sizing: border-box;
            }
            .wrapper{
                width: 700px;
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
            td{
                border: 1px;
                border-style: solid;
            }
            #cabecera-factura{
                border-radius: 3px;
                font-size: 20px;
                margin: 10px auto;
                width: 160px;
                background-color: #8B4B9B;
                color: white;
                font-weight: bold;
            }
            div{
                margin: 10px;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <section>
            <div id="cabecera-factura">Carga de Factura</div>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Nombre: <input type="text" name="nombre" required <?= $disabled ?>></td>  
                        <td>Apellido: <input type="text" name="apellido"></td>
                    </tr>
                    <tr>
                        <td>DNI: <input type="text" name="DNI"></td>    
                        <td>Email: <input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento: <input type="date" name="fechaNacimiento" ></td>
                        <td>Numero de factura: <input type="number" name="numeroFactura" value="" ></td>
                    </tr>
                    <tr>
                        <td>Factura A <input type="radio" name="tipoFactura"></td>
                        <td>Factura B <input type="radio" name="tipoFactura"></td>
                    </tr>
                </table>
                <div><input type="submit" value="Cargar Datos"></div>
            </form>
        </section>
    </div>
</body>
</html>