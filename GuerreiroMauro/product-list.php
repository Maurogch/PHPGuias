<?php
include 'header.php';
include 'nav.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;
use Repository\ProductRepository as ProductRepository;

Autoload::Start();

session_start();

if (isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged'])) {
    if (isset($_SESSION['productRepository']) && !empty($_SESSION['productRepository'])) {
        $productRepository = $_SESSION['productRepository'];
    } else {
        $productRepository = new ProductRepository();

        $_SESSION['productRepository'] = $productRepository;
    }
} else {
    echo "<script> alert('Debe loggearse primero!');
        window.location = 'index.php'; </script>";
}

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de productos</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Código</th>
                         <th>Nombre</th>
                         <th>Costo</th>
                         <th>Precio Venta</th>
                         <th>Stock</th>
                    </thead>
                    <tbody>
                    <?php

$list = $productRepository->GetAll();

if (!empty($list)) {
    foreach ($list as $product) {
        ?>
					 <tr>
				 		<td><?php echo $product->getProductCode(); ?></td>
				 		<td><?php echo $product->getName(); ?></td>
				    	<td><?php echo $product->getCost(); ?></td>
					    <td><?php echo $product->getPrice(); ?></td>
		 			    <td><?php echo $product->getStock(); ?></td>
		   			</tr>
		   			<?php
}
}
?>
                    </tbody>
               </table>
          </div>
     </section>

     <section id="eliminar">
          <div class="container">
               <h2 class="mb-4">Eliminar producto</h2>

               <form class="form-inline bg-light-alpha p-5" method="POST" action="procesarEliminar.php">
                    <div class="form-group text-white">
                         <label for="">Código</label>
                         <input type="text" name="productCode" value="" class="form-control ml-3" required>
                    </div>
                    <button type="submit" name="button" class="btn btn-danger ml-3">Eliminar</button>
               </form>
          </div>
     </section>

</main>

<?php include 'footer.php'?>
