<?php 
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Guía 4</title>
        <style>
            *{
                text-align: center;
                /*width: 100%*/
                box-sizing: border-box;
            }
            .wrapper{
                width: 800px;
                margin: 0 auto;
                border: 1px;
                border-style: solid;
            }
            #top{
                border: 1px;
                border-style: solid;
                margin: 5px;
            }
            #bottom{
                border: 1px;
                border-style: solid;
                margin: 5px;
            }
            #tabla-items{
                margin: 15px auto;
                border: 3px;
                border-style: solid;
            }
            td{
                border: 1px;
                border-style: solid;
            }
            #detalle-factura{
                border-radius: 3px;
                font-size: 20px;
                margin: auto;
                width: 150px;
                background-color: green;
                color: white;
                font-weight: bold;
            }
            #cabecera-factura{
                border-radius: 3px;
                font-size: 20px;
                margin: auto;
                width: 160px;
                background-color: #8B4B9B;
                color: white;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <form action="procesar.php" method="POST" id="form1">
                <section id="top">
                    <div id="cabecera-factura"><p>Cabecera Factura</p></div>
                    <label for="nombre">Nombre: </label><input type="text" name="nombre" required /> 
                    <label for="apellido">Apellido: </label><input type="text" name="apellido" required /><br><br>
                    <label for="DNI">DNI: </label><input type="number" name="DNI" required /> 
                    <label for="email">Email: </label><input type="email" name="email" required /><br>
                    <hr>
                    <label for="fecha">Fecha: </label><input type="date" name="fecha" required /> 
                    <label for="nroFactura">Numero Factura: </label><input type="number" name="nroFactura" required /><br><br>
                    <input type="radio" name="tipoFactura" value="a" checked> Factura A 
                    <input type="radio" name="tipoFactura" value="b"> Factura B
                    <br><br>
                </section>
                <section id="bottom">
                    <div id="detalle-factura"><p>Detalles Factura</p></div>
                    <table id="tabla-items">
                        <?php 
                            for($i=1 ; $i<6 ; $i++){
                                ?>
                                <tr>
                                    <td>
                                        <label for="detalle<?=$i?>">DETALLE: </label><input type="text" name="detalle<?=$i?>" <?php if($i==1)echo "required";?> />
                                        <label for="cant<?=$i?>">CANT: </label><input type="number" name="cant<?=$i?>" <?php if($i==1)echo "required";?> /> 
                                        <label for="precio<?=$i?>">PRECIO: </label><input type="number" name="precio<?=$i?>" <?php if($i==1)echo "required";?> /> 
                                    </td>
                                </tr>
                            <?php
                            }
                        ?> 
                    </table>
                    <input type="submit" value="PROCESAR" /> 
                    <input type="reset" value="Restablecer" />
                    <br><br>
                </section>
            </form>
        </div>
    </body>
</html>
