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
                            <h5 class="m-b-10">Lista Usuarios</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Usuarios</a></li>
                            <li class="breadcrumb-item"><a href="#!">Lista</a></li>
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
                        <h5>Lista Usuarios Activos</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $C=0;
                                    while($r = mysqli_fetch_array($res)){
                                        $C++;
                                    ?>
                                    <tr valign="middle">
                                    <td><?php echo $C?></td>
                                    <td><?php echo $r['1']?></td>
                                    <td><?php echo $r['2']?></td>
                                    <td><?php echo $r['4']?></td>
                                    <td><?php echo $r['5']?></td>
                                    <td><?php echo $r['6']?></td>
                                    <td>
                                        <a href="../controlador/usuarioModifica.php?uid=<?php echo $r[5];?>" class="btn btn-outline-warning"><i class="mdi mdi-border-color"></i>MODIFICA</a>
                                        <a href="usuarioInactivo.php?uid=<?php echo $r[5];?>" class="btn btn-outline-danger" onclick="return confirm('Esta seguro de Eliminar este Registro')"><i class="mdi mdi-close"></i>ELIMINAR</a>
                                    </td>
                                    
                                    </tr>   
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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