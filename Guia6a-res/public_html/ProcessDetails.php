<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\Bill as Bill;
use Model\Product as Product;

Autoload::Start();

session_start();

if (isset($_SESSION['Bill']))
{
	$bill = $_SESSION['Bill'];

	if($_POST)
	{
		$name = isset($_POST['nameProd']) ? $_POST['nameProd'] : "";
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
		$price = isset($_POST['price']) ? $_POST['price'] : 0.0;

		$prod = new Product();
		$prod->setName($name);
		$prod->setQuantity($quantity);
		$prod->setPrice($price);

		$bill->AddProduct($prod);

		$_SESSION['Bill'] = $bill;
	}	
}
else
{ header("Location: ../index.php"); }

?>
<!DOCTYPE html>
<html>
    <head>       
		<meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" media="screen" href="../Styles/tableStyle.css" />
        <title>Carga de Detalles</title>
    </head>
<body>
	<table border="2" align="center" cellspacing="5px" style="width: 50%;"><tr align="center"><td>
		<p>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $bill->getFirstName();?>" disabled>
		<label for="apellido">Apellido: </label>
		<input type="text" name="apellido" id="apellido" value="<?php echo $bill->getLastName();?>" disabled>
		<br>
		<label for="DNI">DNI </label>
		<input type="number" maxlength="11" name="DNI" id="DNI" value="<?php echo $bill->getDni();?>" disabled>
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo $bill->getEmail();?>" disabled>
		<br/><hr>
		<label for="Fecha">Fecha</label>
		<input type="date" name="Fecha" value="<?php echo $bill->getDateBirth()?>" disabled>
		<label for="numFac">Numero Factura</label>
		<input type="number" name="numFac" disabled id="numFac" style="width:80px" value="<?php echo '000'.$bill->getBillNumber()?>" >
		<br>
		<input type="radio" name="tipofac" id="billA" <?php if($bill->getBillType() == 'A') echo'checked';?> disabled>
		<label for="billA">Factura A</label>
		<input type="radio" name="tipofac" id="billB" <?php if($bill->getBillType() == 'B') echo'checked';?>  disabled>
		<label for="billB">Factura B</label>
		
		</p> 
		</td></tr>
		<tr align="center"><td>
			<form action="?" method="post">
				<P>
				<label class="labelTitle">INGRESO DE PRODUCTOS</label>
					<table width="99%" cellspacing="2px" border=1>
						<tr align="center">
							<td width="70%" >
								<label for="nameProd">DETALLE</label>
								<input type="text" name="nameProd" required style="width: 97%;">
							</td>
							<td>
								<label for="quantity">CANT</label><br>
								<input type="number" required name="quantity" min="1" max="999" style="width: 90%;">
							</td>
							<td>
								<label for="price">PRECIO</label>
								<input type="number" required name="price" min="0" max="9999999" style="width:90%">
							</td>
						</tr>
					</table>
					<input type="submit" value="Cargar">
					<input type="reset" style="background-color: indianred;">
				</p>
			</form>
			<p>
			<table border="2" cellspacing="5px" width="90%">
					<tr>
						<th width="70%">DETALLE PRODUCTOS</th>
						<th >CANTS.</th>
						<th>PRECIOS</th>	
					</tr>
					<?php

					if(!empty($bill->getProductList()))
					{
						foreach($bill->getProductList() as $product)
						{
					 ?>
					 <tr style="background-color: #E5E8E8">
					     <td><?php echo $product->getName(); ?></td>
					     <td align="center"><?php echo $product->getQuantity(); ?></td>
		 			     <td align="center"><?php echo $product->getPrice(); ?></td>
		   			</tr>
		   			<?php 
	   					}
		   			}
		   			?>
			</table></p>
			<table border="5" cellspacing="8px" width="80%">
				<tr>
					<th width="525px">SUBTOTAL:</th>
			     	<th align="center"><?php echo $bill->subTotalCost(); ?></th>
				</tr>
				<tr>
					<th width="525px" style="background-color: grey">TOTAL:</th>
			     	<th align="center"><?php echo $bill->totalCost(); ?></th>
				</tr>
			</table>
		</td></tr>
	</table>
	<div align="center" style="margin-top: 10px">
		<button onclick="location.href = 'BillSummary.php';" >
			GUARDAR Y VER RESUMEN
		</button>
	</div>
</body>
</html>
