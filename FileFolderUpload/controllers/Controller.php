<?php
namespace controllers;

use model\File as File;

class Controller
{
  public function index()
  {
    include(VIEWS_PATH . '/index.php');
  }

  public function addFile()
  {
    if (!empty($_FILES['file']['name'])) {
      $file = $_FILES['file'];

    } else {
      $file = null;
    }
    $filePath = File::upload($file, 'images');

    $this->index();
  }
}


?>