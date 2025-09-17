<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../model/conexion.php");

$usuario = $_SESSION['usuario'] ?? '';
$password = $_SESSION['clave'] ?? '';

// Puedes validarlos aquí
if ($usuario === '' || $password === '') {
    header("Location: login.php?sw=1");
    exit();
}

$db=new Conexion();
$sql=$db->query("SELECT * FROM usuarios where usuario='$usuario' or email='$usuario'");
$usuarioActivo = mysqli_fetch_array($sql);

if (mysqli_num_rows($sql) == 0) {
    header("Location: login.php?sw=2"); // Usuario no encontrado
    exit();
}

?>