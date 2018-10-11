<?php
include('header.php');
include('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar producto</h2>
               <form method="post" action="<?php echo FRONT_ROOT ?>Product/Add" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Código</label>
                                   <input type="text" name="procutCode" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Costo</label>
                                   <input type="text" name="price" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Precio de venta</label>
                                   <input type="text" name="cost" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Stock</label>
                                   <input type="text" name="stock" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <?php if(isset($message)) { echo $message; } ?>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>

<?php include('footer.php') ?>
