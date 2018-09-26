<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\Bill as Bill;
use Model\Product as Product;
use Repository\BillRepository as BillRepository;

Autoload::Start();

session_start();

if (isset($_SESSION['Bill']) && $_SESSION['Bill'] != null)
{
	$bill = $_SESSION['Bill'];	

	if(isset($_SESSION['billRepositoryList']) && $_SESSION['billRepositoryList'] != null)
	{
		$billRepositoryList = $_SESSION['billRepositoryList'];

		$billRepositoryList->Add($bill);

		$_SESSION['billRepositoryList'] = $billRepositoryList;		

		echo "<script> alert('Factura Guardada con exito!'); </script>";
	}
	else
	{
		echo "<script> alert('Atencion - Hubo un problema al intentar guardar la nueva Factura!'); </script>";
	}
}
else
{
	echo "<script> if(confirm('ingreso incorrecto, adios!'));";  
		echo "window.location = '../index.php'; </script>";
}

?>
<!DOCTYPE html>
<html>
    <head>       
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="screen" href="../Styles/tableStyle.css" />
        <title>Resumen de Factura</title>
    </head>
<body>
	<table border="2" align="center" cellspacing="5px" style="margin-top: 2%; min-width: 500px">
	<tr align="center"><td>
		<label style="color: orange; font-size: 22px; padding: 2px; font-style: verdana">RESUMEN FACTURA</label>
			<form action="" method="">
				<p>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" value="<?php echo $bill->getFirstName();?>" disabled>
				<br/>
				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" id="apellido" value="<?php echo $bill->getLastName();?>" disabled>
				<br/>
				<label for="dni">DNI</label>
				<input type="number" name="DNI" id="DNI" value="<?php echo $bill->getDni();?>" disabled>
				<br>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $bill->getEmail();?>" disabled>
				<br/> <hr>
				<label for="Fecha">Fecha<label>
				<input type="date" name="Fecha" value="<?php echo $bill->getDateBirth()?>" disabled>
				<br/> 
				<label for="numFac">Numero Factura</label>
				<input type="number" name="numFac" disabled id="numFac" style="width:100px" value="<?php echo "000".$bill->getBillNumber()?>" >
				<br>

				<input type="radio" name="tipofac" id="billA" <?php if($bill->getBillType() == 'A') echo'checked';?> disabled>
				<label for="billA">Factura A</label>
				<input type="radio" name="tipofac" id="billB" <?php if($bill->getBillType() == 'B') echo'checked';?> disabled>
				<label for="billB">Factura B</label>
				
				<br><hr>
				<label for="subtotal">SUBTOTAL VENTA</label>
				<input type="number" name="subtotal" value="<?php echo $bill->subTotalCost();?>" disabled style="width:100px; font-size: 20px;"><br>
				<label for="total">TOTAL VENTA</label>
				<input type="number" name="total" value="<?php echo $bill->totalCost();?>" disabled style="width:100px; font-size: 20px;">
			</p>
			</form>
		</td></tr>
		<tr>
			<td style="margin: 3%" align="center">
				<button onclick="location.href = 'BillList.php';" >
				 LISTADO DE FACTURAS
				</button>
				<button style="background-color: indianred;" onclick="location.href = 'Main.php';" >
				 MENU PRINCIPAL
				</button>
			</td>
		</tr>
	</table>
	
</body>
</html>
