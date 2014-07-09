<?php
session_start();
require_once('../../recursos/conexion/conexionOracle.class.php');
require_once('../recuperacion/clases/recovery.class.php');
// $_SESSION['nombre'];
//echo $_SESSION['contras'];
$obj = new recovery();
//echo $_POST['password'];

if(isset($_POST['password']) && isset($_POST['submit']))
{
	$nueva = MD5($_POST['password']);
	if($obj->actualizar_password($_SESSION['contras'], $nueva, $_SESSION['nombre']))
	{
		echo "<script>";
		echo "alert('Inicie session con su nueva contraseña');";
		echo "document.location='../login/logout.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('Accion Invalida');";
		echo "</script>";
	}
}

include_once('modify.view.php');
?>