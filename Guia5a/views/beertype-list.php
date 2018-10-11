
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Tipos de Cervezas</h6>
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
      <form action="" method="">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 150px;">Nombre</th>
              <th style="width: 450px;">Descripción</th>
              <th style="width: 450px;">Receta</th>
              <th style="width: 100px;">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Negra</td>
              <td>Descripcion de Alta cervezota negra en llamas.</td>
              <td>Receta con ingredientes y tiempo de coccion-</td>          
              <td style="text-align: center;">
                  <input type="hidden" name="" value="">
                  <button class="btn"> <i class="far fa-trash-alt"></i> </button>
              </td>
            </tr>
          </tbody>
        </table></form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
include_once('footer.php');
?>
  