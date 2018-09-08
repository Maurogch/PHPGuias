<?php
    $noPost = false;

    if($_POST){
        $userName = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        
        if(($userName == "admin") && ($password == "admin")){
            echo "bienvenido a la app";
            
            
        }
        else{
            echo "<h1>Login erronea</h1>";
            $nopost = true;
        }
    } else{
        echo "<h1>No hay post</h1>";
        $noPost = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Guía 6</title>
        <style>
                *{
                    text-align: center;
                    /*width: 100%*/
                    box-sizing: border-box;
                }
                .wrapper{
                    width: 400px;
                    margin: 100px auto;
                    border: 1px;
                    border-style: solid;
                }
                section{
                    border: 1px;
                    border-style: solid;
                    margin: 5px;
                }
                span{
                }
                .options{
                    margin: 15px;
                }
            </style>
    </head>
    <body>
        <script>
            function funAgregarEmpleado(){ //esconder botones y mostrar form de agregar empleado
                document.getElementById("buttons").style.display = "none"; 
                document.getElementByID("agregar-empleado").style.removeProperty('display'); //no funciona
            }
            
            function funEliminarEmpleado(){

            }
        </script>
        <div class="wrapper" <?php if($noPost)echo "hidden"?>>
            <section id="buttons">
                <div class="options"><button onclick="funAgregarEmpleado()">Agregar Empleado</button></div>
                <div class="options"><button onclick="funEliminarEmpleado()">Eliminar Empleado</button></div>
            </section>   
            <section>
                <div class="options" id="agregar-empleado" style="display: none">
                    <form action="agregarEmpleado.php" method="POST" id="form1">
                        <input type="hidden" name="usuario" value="<?= $userName ?>" /> <!--envio de los datos de login para poder entrar sin problemas luego de un post-->
                        <input type="hidden" name="password" value="<?= $password ?>" />
                        <input type="submit" value="Agregar Empleado" />
                    </form>
                </div>
                <div class="options" id="eliminar-empleado" hidden>
                    <form action="eliminarEmpleado.php" method="POST" id="form2">
                        <input type="hidden" name="usuario" value="<?= $userName ?>" />
                        <input type="hidden" name="password" value="<?= $password ?>" />
                        <input type="submit" value="Eliminar Empleado" />
                    </form>
                </div>
            </section>
            
        </div>
        <div hidden>

            
        </div>
    </body>
</html>