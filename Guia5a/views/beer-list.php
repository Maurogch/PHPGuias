
<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Cervezas</h6>
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
                <th style="width: 170px;">Nombre</th>
                <th style="width: 120px;">Tipo</th>
                <th style="width: 400px;">Descripcion</th>
                <th style="width: 110px;">Dens. Alcohol</th>
                <th style="width: 130px;">Origen</th>
                <th style="width: 100px;">Precio $ </th>
                <th style="width: 100px;">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>American Amber Ale</td>
                <td>Roja</td>
                <td>sarasa description </td>
                <td>5.39</td>
                <td>Alemania</td>
                <td>120</td>            
                <td>
                  <input type="hidden" name="" value="">
                  <button class="btn"> <i class="far fa-trash-alt"></i> </button>
                </td>
              </tr>
            </tbody>
          </table>
        </form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include_once('footer.php');
?>
  