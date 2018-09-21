<?php
	namespace Controladoras;
	
	use Vistas;
	
	class ControladoraPaginaPrincipal{
		
		function __construct()
		{
			//$this->CargarVista();
		}
		
		function index()
		{
			require(ROOT.'View/home.php');
		}
	}
?>
