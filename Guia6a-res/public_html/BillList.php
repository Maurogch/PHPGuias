<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\Bill as Bill;
use Repository\BillRepository as BillRepository;

Autoload::Start();

session_start();
if(isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged']))
{
	if(isset($_SESSION['billRepositoryList']) && $_SESSION['billRepositoryList'] != null)
	{
		$billRepositoryList = $_SESSION['billRepositoryList'];
	}
}
else{
	echo "<script> alert('Para ingresar debe iniciar sesion. Adios!');";  
    echo "window.location = '../index.php'; </script>";
}

?>

<!DOCTYPE html>
<html>
    <head>     
		<style>
			td{
				font-size:
			}
		</style>
		<link rel="stylesheet" type="text/css" media="screen" href="../Styles/tableStyle.css" />
        <meta charset="utf-8">
        <title>Listado de Factura</title>
    </head>
<body>
	<table border="2" align="center" cellspacing="5px" width="80%">
		<tr align="center"><td><br>
			<label class="labelTitle" style="background-color:#BA4A00;">LISTADO DE FACTURAS</label><br><br>
			<table border="2" cellspacing="5px">
					<tr>
						<th width="150px">NUM FACTURA</th>
						<th width="10px">TIPO FACTURA</th>
						<th width="500px">CLIENTE</th>
						<th width="250px">DNI</th>
						<th width="350px">FECHA</th>	
						<th width="150px">SUBTOTAL</th>	
						<th width="150px">TOTAL</th>	
					</tr>
					<?php
					
					$list = $billRepositoryList->GetAll();
					
					if(!empty($list))
					{
						foreach($list as $bill)
						{
					 ?>
					 <tr  style="background-color: #E5E8E8">
				 		<td align="center" class="anotherTh"><?php echo $bill->getBillNumber(); ?></td>
				 		<td align="center" class="anotherTh"><?php echo $bill->getBillType(); ?></td>
				    	<td align="center" class="anotherTh"><?php echo $bill->getFirstName()." ".$bill->getLastName(); ?></td>
					    <td align="center" class="anotherTh"><?php echo $bill->getDni(); ?></td>
		 			    <td align="center" class="anotherTh"><?php echo $bill->getDateBirth(); ?></td>
		 			    <td align="center" class="anotherTh"><?php echo $bill->subTotalCost() ?></td>
		 			    <td align="center" class="anotherTh"><?php echo $bill->totalCost(); ?></td>
		   			</tr>
		   			<?php 
	   					}
		   			}
		   			?>
			</table><br>
			<?php 

			$subTotal = 0; $total = 0;
			foreach ($list as $value) 
			{
				$subTotal += $value->subTotalCost();
				$total += $value->totalCost();
			}

			 ?>
			<table border="5" cellspacing="8px" width="650px">
				<tr>
					<th width="525px">SUBTOTAL FACTURAS:</th>
			     	<th align="center" ><?php echo $subTotal ?></th>
				</tr>
				<tr>
					<th width="525px">TOTAL FACTURAS:</th>
			     	<th align="center"><?php echo $total; ?></th>
				</tr>
			</table>
		</td></tr>
	</table>
	<div align="center" style="margin-top: 10px">
		<button style="background-color: indianred" onclick="location.href = 'Main.php';" >MENU PRINCIPAL</button>
	</div>
</body>
</html>