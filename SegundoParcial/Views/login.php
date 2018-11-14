<main class="d-flex align-items-center justify-content-center height-100">
    <div class="content">
        <header class="text-center">
            <h2>2º Parcial - Laboratorio IV</h2>
            <p>Mauro Guerreiro</p>
        </header>
        <form action="<?=FRONT_ROOT?>Home/login" method="post" class="login-form bg-dark-alpha p-5 text-white">
            <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Ingresar usuario">
            </div>
            <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
            </div>
            <button class="btn btn-dark btn-block btn-lg" type="submit">
                    Iniciar Sesión
            </button>
        </form>
    </div>
</main>