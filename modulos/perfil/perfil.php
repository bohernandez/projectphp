<?php
session_start();

require_once('../../recursos/conexion/conexionOracle.class.php');
/*modelos*/
require_once('../login/modelo.php');

$a = new acceso();
if(isset($_SESSION['iduser']))
{
	if($a->verificar_user($_SESSION['nombre'] , $_SESSION['contras']) == true && ($_GET["cod"] = $_SESSION['iduser']))
	{
		/* Se hace la verificacion de los puestos de usuarios para redireccionar a su respectivo perfil */
		//$direccion = array("42","43","1", "9","44"); //VP's and Gerentes
		//$jefatura = array("2","10","3","11", "46"); //Chief, jefatura and team leaders    -- 46 COI Chief
		$empleado = array("4","5","6","7","8","12");  //Ejecutivo and Agente
		$reclutamiento = array("45","51", "41", "52");//Recuitment and Training and 52 boris
	
		if( in_array($_SESSION['ID_PUESTO'], $reclutamiento))
		{
			echo "<script>";
			echo "location.href='perfil_rrhh.php?cod=".$_SESSION['iduser']."';";
			echo "</script>";
		}
		else if  (in_array($_SESSION['ID_PUESTO'], $empleado) || in_array($_SESSION['ID_PUESTO'], $planing) || in_array($_SESSION['ID_PUESTO'], $jefatura) || in_array($_SESSION['ID_PUESTO'], $direccion))
		{
			echo "<script>";
			echo "location.href='perfil_usuario.php?cod=".$_SESSION['iduser']."';";
			echo "</script>";
		}
		else if (in_array($_SESSION['ID_PUESTO'], $comunications))
		{
			echo "<script>";
			echo "location.href='perfil_usuario.php?cod=".$_SESSION['iduser']."';";
			echo "</script>";
		
		}
		else
		{
			echo "<script>";
			echo "alert('No existe perfil creado para su puesto');";
			echo "location.href='../login/logout.php'";
			echo "</script>";
		}
	}
	else
	{
		echo "<script>";
		echo "alert('No tiene permiso para acceder');";
		echo "</script>";
	}
}
else
	{
		echo "<script>";
		echo "alert('Por favor inicie sesion');";
		echo "location.href='../../index.php'";
		echo "</script>";
	}
?>