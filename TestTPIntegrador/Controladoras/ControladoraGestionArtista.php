<?php
	namespace Controladoras;

	use Model\Artista as Artista;
	use Dao\Json\ListaArtistas as ListaArtistas;
	
	class ControladoraGestionArtista
	{
		function __construct()
		{
			//add code here
		}
		
		function index(){
			require(ROOT.'View/gestionArtista.php');
		}
		
		function cargarArtista($nombre, $apellido){
			$artista = new Artista();
			$listaArtistas = new ListaArtistas();

			$artista->setNombre($nombre);
			$artista->setApellido($apellido);	

			$listaArtistas->Add($artista);
		}

		function Decode(){
			$listaArtistas = new ListaArtistas();

			$listaArtistas->RetrieveAll();
		}
		
		
	}
?>