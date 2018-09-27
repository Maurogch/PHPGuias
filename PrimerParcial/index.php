<?php include 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;
use Model\User as User;
use Repository\ProductRepository as ProductRepository;

Autoload::Start();

if ($_POST) {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $defaultUser = "admin@miapp.com";
    $defaultPassword = "123456";

    if ($email == $defaultUser && $password == $defaultPassword) {
        session_start();

        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $_SESSION["userLogged"] = $user;
        $_SESSION["productRepository"] = new ProductRepository();

        header("location:product-list.php");
    } else {
        echo "<script> alert('Login incorrecto intente nuevamente!'); </script>";
    }
}

?>

     <main class="d-flex align-items-center justify-content-center height-100">
          <div class="content">
               <header class="text-center">
                    <h2>1º Parcial - Laboratorio IV</h2>
                    <p>Nombre y Apellido</p>
               </header>
               <form class="login-form bg-dark-alpha p-5 text-white" method="POST" action="">
                    <div class="form-group">
                         <label for="">Usuario</label>
                         <input type="email" name="email" class="form-control form-control-lg" placeholder="Ingresar usuario" required>
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" required>
                    </div>
                    <button class="btn btn-dark btn-block btn-lg" type="submit">
                         Iniciar Sesión
                    </button>
               </form>
          </div>
     </main>

<?php include 'footer.php'?>
