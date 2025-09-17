<?php    
    if(isset($_GET['sw'])){
        $sw = $_GET['sw'];
    } else {
        $sw = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Iniciar Sesion</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="../assets/css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="../assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<form method="post" action="../controller/login.php">
							<h4 class="mb-3 f-w-400">Iniciar Sesion</h4>
							<hr>
							<?php if ($sw == 1): ?>
								<div class="alert alert-danger">Error en credenciales, vuelva a intentar!</div>
							<?php elseif ($sw == 2): ?>
								<div class="alert alert-warning">Error de sesión, vuelve a intentar!</div>
							<?php elseif ($sw == 3): ?>
								<div class="alert alert-success">Sesión cerrada con éxito!</div>
							<?php elseif ($sw == 4): ?>
								<div class="alert alert-primary">Se cambió la contraseña, vuelva a ingresar!</div>
							<?php endif; ?>
							<div class="form-group mb-3">
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
							</div>
							<div class="form-group mb-4">
								<input type="password" class="form-control" id="calve" name="clave" placeholder="Contraseña">
							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Guardar contraseña</label>
							</div>
							<button class="btn btn-block btn-primary mb-4">Iniciar Sesion</button>
							<hr>
							
							<p class="mb-2 text-muted">¿Has olvidado tu contraseña? <a href="auth-reset-password.html" class="f-w-400">Resetear</a></p>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>

<script src="../assets/js/pcoded.js"></script>



</body>

</html>
