<?php
include('../components/header.php');
?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Registrar Administrador</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Registro</a></li>
                            <li class="breadcrumb-item"><a href="#!">Administrador</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Registrar Administrador</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="../controller/usuarioRegistro.php">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ingrese el nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese el nombre de usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electronico</label>
                                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese el correo electronico">
                                    </div>
                                    <div class="form-group">
                                        <label for="clave">Contraseña</label>
                                        <input type="password" class="form-control"  name="clave" placeholder="Ingrese la contraseña">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Registrar Administrador">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<?php
include('../components/footer.php');
?>