<?php
//session_start();
//session_destroy();

session_start();
//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
require_once('recursos/conexion/conexionOracle.class.php');
require_once('modulos/login/modelo.php');
$a = new acceso();
if(!isset($_SESSION['iduser']))
{
	if($a->verificar_user($_POST['username'] , MD5($_POST['password'])) == true)
	{
		$_SESSION['id'] = $_POST['id_sabana'];
		$_SESSION['nombre'] = $_POST['username'];
		$_SESSION['contras'] = MD5($_POST['password']);
		
		$infoxtra = $a->obtenerid($_SESSION['nombre'] , $_SESSION['contras']);

		$piezas = explode("|", $infoxtra);
		
		$_SESSION['iduser'] = $piezas[0];
		$_SESSION['ID_PUESTO'] = $piezas[1];
		$_SESSION['id'] = $piezas[2];
		if($a->verificar_modificacion($_SESSION['nombre'], $_SESSION['contras']) /*|| (MD5($_SESSION['nombre']) == $_SESSION['contras'])*/)
		{
			echo "<script>";
			echo "document.location='modulos/modify/modify.php';";
			echo "</script>";
		}
		else
		{
			
			echo "<script>";
			echo "document.location='modulos/perfil/perfil.php?cod=".$_SESSION['iduser']."';";
			echo "</script>";
			//echo "-->".$infoxtra."<-- Informacion Extra";
		}
	}
	else
	{
		if(isset($_POST['submit']))
		{
			$var = '<div class="ui-widget" style="font-size:0.8em;width: 50%; float:left">
					<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
						<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
						<strong>Verifique:</strong> Nombre de usuario o contraseña no valido.</p>
					</div>
					</div>';
		$var = utf8_encode($var);
		}
		echo md5("bohernandez");
		require_once('modulos/login/vista.php');

		//$online_users = obtain_users_online(); 
		//echo "Numero".$online_users;

	}
}
else
{
	//echo "Inicie Sesion";
	/*echo "<script>";
	echo "document.location='modulos/perfil/perfil.php?cod=".$_SESSION['iduser']."';";
	echo "</script>";
	*/
	if($a->verificar_modificacion($_SESSION['nombre'], $_SESSION['contras']) /*|| (MD5($_SESSION['nombre']) == $_SESSION['contras'])*/)
	{
			echo "<script>";
			echo "document.location='modulos/modify/modify.php';";
			echo "</script>";
	}
	else
		{
			echo "<script>";
			echo "document.location='modulos/perfil/perfil.php?cod=".$_SESSION['iduser']."';";
			echo "</script>";
			
			//echo "-->".$infoxtra."<-- Informacion Extra";

		}
}
//echo "Nombre: ".$hostnamep;

?>
