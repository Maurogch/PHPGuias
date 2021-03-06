<?php
namespace Controladoras;

use Dao\Json\ListaArtistas as ListaArtistas;
use Model\Artista as Artista;

class ControladoraGestionArtista
{
    protected $message;
    private $listaArtistas;

    public function __construct()
    {
        $this->listaArtistas = ListaArtistas::getInstance();
    }

    public function index()
    { //agregar validaciones aca (ej userLogged)

        require ROOT . 'View/gestionArtista.php';
    }

    public function cargarArtista($nombre, $apellido)
    {
        try {
            $artista = new Artista();
            $artista->setNombre($nombre)->setApellido($apellido);
            $this->listaArtistas->Add($artista);
            $this->index();
        } catch (Exception $e) {
            $this->message = $e->getMessage();
        }
    }

    public function listarArtistas()
    {
        var_dump($this->listaArtistas->RetrieveAll());
    }

}
