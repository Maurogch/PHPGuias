<?php
include('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de clientes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Categoría</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                         <th>DNI</th>
                         <th>Email</th>
                         <th>Dirección</th>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($clientList)){
                        foreach ($clientList as $client) {
                    ?>
                         <tr>
                              <td><?=$client->getCategory()->getDescription()?></td>
                              <td><?=$client->getLastName()?></td>
                              <td><?=$client->getFirstName()?></td>
                              <td><?=$client->getDni()?></td>
                              <td><?=$client->getEmail()?></td>
                              <td><?=$client->getAddress()?></td>
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
               <h2 class="mb-4">Eliminar cliente</h2>

               <form method="post" action="<?=FRONT_ROOT?>Client/delete" class="form-inline bg-light-alpha p-5">
                    <div class="form-group text-white">
                         <label for="dni">DNI</label>
                         <input type="number" name="dni" id="dni" class="form-control ml-3" required>
                    </div>
                    <button type="submit" name="button" class="btn btn-danger ml-3">Eliminar</button>
               </form>
          </div>
     </section>

</main>

<?php include('footer.php') ?>
