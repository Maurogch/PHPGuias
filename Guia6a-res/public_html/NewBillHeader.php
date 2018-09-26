<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Repository\BillRepository as BillRepository;

Autoload::Start();

session_start();

if(isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged']))
{
	if(isset($_SESSION['billRepositoryList']) && !empty($_SESSION['billRepositoryList']))
	{
		$billRepositoryList = $_SESSION['billRepositoryList'];
	}
	else
	{
		$billRepositoryList = new BillRepository();

		$_SESSION['billRepositoryList'] = $billRepositoryList;
	}

	$billNum = (count($billRepositoryList->GetAll()) +1);
}
else
{ header("Location 'Main.php'"); }

?>
<!DOCTYPE html>
<html>
    <head>       
        <meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" media="screen" href="../Styles/style.css" />
        <title>Ejemplo del uso de formularios</title>
    </head>
<body>
<table border="2" align="center" cellspacing="2px" style="margin-top: 1%; min-width: 800px">
	<tr align="center"><td><br>
		<label style="border: 2px; border-radius: 3px; background-color: green; color: white; font-size: 22px; padding: 5px;">NUEVA FACTURA</label>
		<p>
			<form action="ProcessHeader.php" method="post" style="max-width: 65%;font-size: 18px;" >
			<label for="firstName">Nombre</label>
			<input type="text" name="firstName" id="firstName" required>
			<br>
			<label for="lastName">Apellido</label>
			<input type="text" name="lastName" id="lastName" required>
			<br>
			<label for="dni">DNI &nbsp &nbsp</label>
			<input type="number" max="99999999" name="dni" id="dni" required >
			<br>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required>
			<br/> <hr>
			<label for="dateBirth">Fecha</label>
			<input type="date" name="dateBirth">

			<label for="billNumber">Numero Factura</label>
			<input type="number" value="<?php echo '000'.$billNum; ?>" name="billNumber" id="billNumber" style="width:100px" disabled>
			<br>
			<input type="radio" name="billType" id="billA" value="A" checked>
			<label for="billA">Factura A</label>
			<input type="radio" name="billType" id="billB" value="B">
			<label for="billB">Factura B</label>
			<br><br>
			<input type="submit" value="VALIDAR Y CARGAR DETALLE">
			<input type="reset" value="LIMPIAR CAMPOS">
		</form></p>
	</td></tr>
</table>
<div align="center" style="margin-top: 10px">
	<button style="font-size: 20px; background-color: indianred; max-width: 15%;" onclick="location.href = 'Main.php';">
	Menu Principal</button>
</div>
</div>
</body>
</html>
