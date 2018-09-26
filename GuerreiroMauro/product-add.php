<?php
include 'header.php';
include 'nav.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;

Autoload::Start();
session_start();

if (isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged'])) {

} else {
    echo "<script> alert('Debe loggearse primero!');
        window.location = 'index.php'; </script>";
}

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar producto</h2>

               <form class="bg-light-alpha p-5" method="POST" action="procesarAgregar.php">
                    <div class="row">
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Código</label>
                                   <input type="number" name="productCode" min="1" max="99999" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Costo</label>
                                   <input type="number" name="cost" step="any" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Precio de venta</label>
                                   <input type="number" name="price" step="any" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Stock</label>
                                   <input type="number" name="stock" min="1" class="form-control" required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>

<?php include 'footer.php'?>
