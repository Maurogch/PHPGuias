<?php
    require_once('nav.php');
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
                            if(isset($productList))
                            {
                                foreach($productList as $product)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $product->getProductCode() ?></td>
                                            <td><?php echo $product->getName() ?></td>
                                            <td><?php echo $product->getCost() ?></td>
                                            <td><?php echo $product->getPrice() ?></td>
                                            <td><?php echo $product->getStock() ?></td>
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

               <form method="post" action="<?php echo FRONT_ROOT ?>Product/Delete" class="form-inline bg-light-alpha p-5">
                    <div class="form-group text-white">
                         <label for="">Código</label>
                         <input type="text" name="productCode" value="" class="form-control ml-3">
                    </div>
                    <button type="submit" name="button" class="btn btn-danger ml-3">Eliminar</button>
               </form>
          </div>
     </section>

</main>
