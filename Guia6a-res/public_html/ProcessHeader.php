<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\Bill as Bill;	

Autoload::Start();

if ($_POST) 
{
	if(strlen($_POST['dni']) == 8)
	{
		session_start();

		$fName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
		$lName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
		$dni = $_POST['dni'];
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$dateBirth = isset($_POST['dateBirth']) ? $_POST['dateBirth'] : "";
		$billNumber = isset($_POST['billNumber']) ? $_POST['billNumber'] : 1;
		$billType = isset($_POST['billType']) ? $_POST['billType'] : "";

		$bill = new Bill();
		$bill->setFirstName($fName);
		$bill->setLastName($lName);
		$bill->setDni($dni);
		$bill->setEmail($email);
		$bill->setDateBirth($dateBirth);
		$bill->setBillNumber($billNumber);
		$bill->setBillType($billType);

		$_SESSION['Bill'] = $bill;

		header('Location: ProcessDetails.php');
	}
	else
	{
		echo "<script> if(confirm('Verifique que todos los datos sean Correctos !'));";  
		echo "window.location = '../index.php'; </script>";
	}
}
else
{
	header("Location: ../index.php");
}

?>