<?php
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí va todo el código que procesa el registro
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $email = $_POST['email'];

    // Validaciones de contraseña
    $tieneLongitud = strlen($clave) >= 8;
    $tieneMayuscula = preg_match('/[A-Z]/', $clave);
    $tieneNumero = preg_match('/[0-9]/', $clave);
    $tieneEspecial = preg_match('/[\W_]/', $clave);

    if (!$tieneLongitud || !$tieneMayuscula || !$tieneNumero || !$tieneEspecial) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres, una letra mayúscula, un número y un carácter especial.'); window.history.back();</script>";
        ob_end_flush();
        exit;
    }

    include_once("../model/usuarios.php");

    if (Usuario::existeUsuario($usuario)) {
        echo "<script>alert('El nombre de usuario ya está en uso. Por favor, elija otro.'); window.history.back();</script>";
        ob_end_flush();
        exit;
    }

    $contraseña = password_hash($clave, PASSWORD_DEFAULT);

    $user = new Usuario("", $nombre, $usuario, $contraseña, $email, "", "", "");
    $resultado = $user->Administrador();

    if ($resultado) {
        header("Location: ../controller/usuarioLista.php");
        exit;
    } else {
        die("Error al registrar: " . $db->error); // <-- Para depuración
    }

} else {
    // Solo mostramos la vista si NO se ha enviado el formulario
    include("../view/usuarioRegistro.php");
}

ob_end_flush();
