<?php
    require_once("Item.php");

    $noPost = false;

    if($_POST){
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Nombre no cargado";
        $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "Apellido no cargado";
        $dni = isset($_POST["DNI"]) ? $_POST["DNI"] : "DNI no cargado";
        $email = isset($_POST["email"]) ? $_POST["email"] : "Email no cargado";
        $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "Fecha no cargada";
        $nroFactura = isset($_POST["nroFactura"]) ? $_POST["nroFactura"] : "Numero de factura no cargada";
        $tipoFactura = isset($_POST["tipoFactura"]) ? $_POST["tipoFactura"] : "Tipo de factura no cargada";
        $subtotal = isset($_POST["subtotal"]) ? $_POST["subtotal"] : 0; //si post proviene de index inicializa con 0
        $itemArray = isset($_POST["itemsArray"]) ? unserialize(base64_decode($_POST["itemsArray"])) : array(); //deserializacion de array, en caso de que venga de index inicializa array 
        $total = 0;																								//otra forma es guardar el arreglo en sesion
        $descuentoObtenido = "";

        if(isset($_POST["detalle"])){ //si post viene de index no carga ningun Item al array
            $item = new Item($_POST["detalle"], $_POST["cant"], $_POST["precio"]);
            $subtotal += $item->calcularPrecioTotal();

            array_push($itemArray, $item); //insterta al final de array
        }
        
        if($tipoFactura=="a") $total = $subtotal + $subtotal * 9 / 100; //descuento dependiendo del tipo de factura seleccionado
        else if($tipoFactura=="b") $total = $subtotal + $subtotal * 21 / 100;

        if(count($itemArray) >= 5) { //descuento de mas de 5 items distintos
            $total -= $total * 5 / 100;
            $descuentoObtenido = " (Descuento 5%)";
        }

        //var_dump($itemArray);
    }
    else{
        echo "<h1>No hay post</h1>";
        $noPost = true; //variable para esconder todo el html en caso de que no halla post
    } 
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Guía 5 - Resultado</title>
        <style  type="text/css">
            *{
                text-align: center;
                box-sizing: border-box;
            }
            .wrapper{
                width: 800px;
                margin: 0 auto;
                border: 1px;
                border-style: solid;
            }
            .sections{
                border: 1px;
                border-style: solid;
                margin: 5px;
            }
            #tabla-items{
                width: 95%;
                margin: 15px auto;
                border: 3px;
                border-style: solid;
            }
            #tabla-totales{
                /*width: 95%;*/ /*conflicto con grosor de celdas (td width)*/
                margin: 15px auto;
                border: 5px;
                border-style: solid;
                border-color: gray;
            }
            td{
                border: 1px;
                border-style: solid;
            }
            th{
                border:1px solid black
            }
            #resumen-factura{
                border-radius: 3px;
                font-size: 20px;
                margin: auto;
                width: 160px;
                background-color: green;
                color: white;
                font-weight: bold;
            }
            .totales{
                font-weight: bold;
                font-size: 16px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="wrapper" <?php if($noPost)echo "hidden"?>> <!--esconde todo el html en caso de no haber post -->
            <form action="procesar.php" method="POST" id="form1">
                <section class="sections">
                    <div id="resumen-factura"><p>Resumen Factura</p></div>
                        <label for="nombre">Nombre: </label><input type="text" name="nombre" value="<?= $nombre ?>" readonly /> 
                        <label for="apellido">Apellido: </label><input type="text" name="apellido" value="<?= $apellido ?>" readonly /><br><br>
                        <label for="DNI">DNI: </label><input type="number" name="DNI" value="<?= $dni ?>" /> 
                        <label for="email">Email: </label><input type="email" name="email" value="<?= $email ?>" readonly /><br>
                        <hr>
                        <label for="fecha">Fecha: </label><input type="date" name="fecha" value="<?= $fecha ?>" readonly /> 
                        <label for="nroFactura">Numero Factura: </label><input type="number" name="nroFactura" value="<?= $nroFactura ?>" readonly /><br><br>
                        <input type="radio" name="tipoFactura" value="a" readonly <?php echo ($tipoFactura=="a") ? "checked" : "disabled"; ?> /> Factura A <!--se hace "disabled" para que no se pueda seleccionar el otro radio, ya que readonly no funciona -->
                        <input type="radio" name="tipoFactura" value="b" readonly <?php echo ($tipoFactura=="b") ? "checked" : "disabled"; ?>/> Factura B
                        <input type="hidden" name="itemsArray" value="<?php print base64_encode(serialize($itemArray)) ?>"> <!--serializing array y enviando mediante hidden input-->
                        <input type="hidden" name="subtotal" value=<?= $subtotal ?>> <!--hidden input para enviar el subtotal acumulado, otra opción es calcularlo de vuelta al inicio-->
                    <br><br>
                </section>
                <section class="sections">
                    <p style="margin:auto; font-weight:bold">CARGA DE DETALLES</p>
                    <table style="margin: 5px auto">
                            <tr>
                                <td>
                                    <label for="detalle">DETALLE: </label><input type="text" name="detalle" style="width:380px" required />
                                    <label for="cant">CANT: </label><input type="number" name="cant" style="width:80px" required /> 
                                    <label for="precio">PRECIO: </label><input type="number" name="precio" style="width:80px" required /> 
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0px; padding: 10px;">
                                    <input type="submit" value="Cargar" /> 
                                    <input type="reset" value="Restablecer" />
                                </td>
                            </tr>
                    </table>
                </section>
            </form>
            <section class="sections">
                <table id="tabla-items">
                    <tr style="font-size: 17px">
                        <th>Detalles</th>
                        <th>Cantidades</th>
                        <th>Precios</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php 
                        for($i=0 ; $i<count($itemArray) ; $i++){ //crea lineas de tabla dependiendo del largo del array de items usando echo
                            ?><tr>								 <!--switch a html cerrando php dentro del for y abiendolo antes de que termine-->
                                  <td><input type='text' value="<?= $itemArray[$i]->getDetalle()?>" readonly /></td>
                                  <td><input type='text' value="<?= $itemArray[$i]->getCantidad()?>" readonly /></td>
                                  <td><input type='text' value="<?= $itemArray[$i]->getPrecio()?>" readonly /></td>
                                  <td><input type='text' value="<?= $itemArray[$i]->calcularPrecioTotal()?>" readonly /></td>
                              </tr>
							<?php 
                        }
                    ?>
                </table>
                <table id="tabla-totales">
                    <tr>
                        <td style="width:510px;"><input type="text" value="SUBTOTAL" class="totales" readonly/></td>
                        <td style="width:50px;"><input type="text" value="<?= $subtotal ?>" class="totales" readonly/></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;"><input type="text" value="<?php echo "TOTAL".$descuentoObtenido ?>" class="totales" style="background-color: gray;" readonly /></td> <!-- agrega el texto (5% de descuento) cuando se alcanzan los 5 distitnos items-->
                        <td><input type="text" value="<?= $total ?>" class="totales" readonly /></td>
                    </tr>
                </table>
            </section>
        </div>
    </body>
</html>