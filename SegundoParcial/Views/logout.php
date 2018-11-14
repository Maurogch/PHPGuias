<?php
if (isset($_SESSION)) {
    session_destroy();
    session_unset();
    echo "<script>alert('Sesión Cerrada')</script>";
}
echo "<script>window.location.replace('".FRONT_ROOT."Home/index')</script>";
