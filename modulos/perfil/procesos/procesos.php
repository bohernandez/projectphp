<?php
//header('Content-Type: text/html; charset=utf-8');
require_once("../../../recursos/conexion/conexionOracle.class.php");
require_once('../../../recursos/class/perfil.class.php');

$per = new perfil();
$opc = $_POST["bloque"];

switch ($opc)
{
		case "1":
		echo "<img src='../../recursos/images/perfil/wait.gif' />";
		$var = explode("@",$_POST["correo"]);
		if($per->actualizar_bloque1($_POST["codigo"], $_POST["idsabana"], utf8_decode($_POST["nombre"]), $_POST["dui"], $_POST["nit"], $_POST["cel"], $_POST["fijo"], $_POST["municipio"], utf8_decode($_POST["coment"]), $_POST["civil"], $_POST["hijos"], $_POST["nac"], $_POST["correo"], $var[0]))
		{
			echo "<script>
					location.href='perfilmod_rrhh.php?cod=".$_POST["idsabana"]."';
			</script>";
		}
		else
		{
			echo "Error al insertar";
		}
		break;		
		
		case "2":
		if($per->actualizar_bloque2($_POST["id_planilla"], $_POST["id_puestos"], $_POST["id_lugar"], $_POST["jefe_inmediato"], $_POST["idsabana"],$_POST["ptemp"], $_POST["codigo"],$_POST["boss"]))
		{
			echo "<script>
					location.href='perfilmod_rrhh.php?cod=".$_POST["idsabana"]."';
			</script>";
		}
		else
		{
			echo "Error al insertar";
		}
		break;		
		
		case "3":
			//echo "Entroadfasdfasdf";
			//print_r($_REQUEST);
			if(!empty($_POST['update']))
			{
				for ($i = 1; $i <= $_POST['update']; $i++) {
					/*echo $_POST["idsabana".$i];
					echo $_POST["idacceso".$i];
					echo $_POST["usuario".$i]."<br />";
					*/
					if(!empty($_POST["usuario".$i]))
					{
						$per->modifyacceso($_POST["idsabana".$i], $_POST["idacceso".$i], $_POST["usuario".$i]);
					}
				}
			}
			
			
			if(!empty($_POST['insert']))
			{
				$sb = $_POST["idsabanas1"];
				for ($i = 1; $i <= $_POST['insert']; $i++) {
					/*echo $_POST["idsabanas".$i];
					echo $_POST["idaccesos".$i];
					echo $_POST["usuarios".$i]."<br />";
					*/
					if(!empty($_POST["usuarios".$i]))
					{
						
						$per->addacceso($_POST["idsabanas".$i], $_POST["idaccesos".$i], $_POST["usuarios".$i]);
					}
					
				}
			}
			
			echo "<script>
					location.href='../perfilmod_rrhh.php?cod=".$sb."';
				</script>";
			
		break;
		
		default:
			"Algo anda mal...";
	
}
		



?>