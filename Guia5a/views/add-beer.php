
<?php 
    include_once('header.php');
    include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Ingreso de Cervezas</h6>
  </div>
</div>
<div class="wrapper row3" >
  <main class="container" style="width: 90%;"> 
    <!-- main body -->
    <div class="content" > 
      <div id="comments" style="align-items:center;">
        <h2>Ingresar Cerveza</h2>
        <form action="" method=""  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Dens. Alcohol</th>
                <th>Origen</th>
                <th>Precio $ </th>
              </tr>
            </thead>
            <tbody align="center">
              <tr>
                <td>
                  <input type="text" name="" id="" value="" size="22" required>
                </td>
                <td>
                  <select name="" style="margin-top: 3%;min-height: 35px;">
                    <option value="" style="height: 20px">tipo cerveza</option>
                  </select>
                </td>
                <td>
                  <textarea name="" id="" cols="60" rows="1"></textarea>
                </td>
                <td>
                  <input type="number" name="" min-value="0" id="" value="" style="max-width: 120px">
                </td>
                <td>
                  <input type="text" name="" id="" value="" >
                </td>
                <td>
                  <input type="number" name="" id="" min-value="0" value="" style="max-width: 120px">
                </td>            
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
          </div>
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
  