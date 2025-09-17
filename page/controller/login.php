<?php
session_start();
include("../model/usuarios.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    $usuarioModel = new Usuario("", "", "", "", "", "", "", "");
    $resultado = $usuarioModel->buscar($usuario);

    if ($resultado && $resultado->num_rows == 1) {
        $datos = $resultado->fetch_assoc();

        if (password_verify($clave, $datos['clave'])) {
            $_SESSION['usuario'] = $datos['usuario'];
            $_SESSION['id'] = $datos['id'];
            $_SESSION['rol'] = $datos['rol'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            $usuario = urlencode($datos['usuario']); // protege espacios y caracteres especiales
            header("Location: ../view/index.php");
            /* header("Location: ../controller/inicio.php?nombre=$usuario"); */

            exit();
        } else {
            header("Location: ../view/login.php?sw=1");
            exit();
        }
    } else {
        header("Location: ../view/login.php?sw=2");
        exit();
    }
} else {
    header("Location: ../view/login.php?sw=1");
    exit();
}
