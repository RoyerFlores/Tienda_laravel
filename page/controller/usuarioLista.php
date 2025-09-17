<?php
include ("../model/usuarios.php");
$user=new Usuario("","","","","","","","");
$res=$user->lista();
include("../view/usuarioLista.php");
?>