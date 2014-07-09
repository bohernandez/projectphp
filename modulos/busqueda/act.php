<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador</title>

<link rel="StyleSheet" href="../../recursos/estilos/estilo.css" type="text/css">
</head>

<body>

<?php
include("../../recursos/conexion/conexionOracle.php");
$cons = conectarseOracle();
// *********** Variables a utilizar ***********
$codigo=$_POST["codigo"];
$status=$_POST["status"]; //not null
//$zona=$_POST["zona"];
$fechasal=$_POST["fechasal"];
$motivosal=$_POST["motivosal"];
$comentario=$_POST["comentario"];

$direccion=$_POST["direccion"]; //hay q validar esta parte
$telcasa=$_POST["telcasa"];
$telcel=$_POST["telcel"];
$estadocivil=$_POST["estadocivil"];
$hijos = $_POST["hijos"];


//$gerente = $_POST["gerente"];
//$jefezona = $_POST["jefezona"];
//$puesto =$_POST["puesto"];
//$jefeinmediato=$_POST["jefeinmediato"];
//$planilla=$_POST["planilla"];
//$unidad=$_POST["unidad"];


$mes;
// ************** arreglando la fecha a introducir

$nuevafechasal = str_replace("/", ".", $fechasal);
$fechasal = str_replace("/", ".", $fechasal);
//echo $fechasal;
//echo $fechasal[3];
$mes = substr($fechasal, 3, -5); 
//echo "<br/> solo mes 1: ".$mes;

switch($mes){
		case "01":
			$mes2="january";
		break;
		case "02":
			$mes2="february";
		break;
		case "03":
			$mes2="march";
		break;
		case "04":
			$mes2="april";
		break;
		case "05":
			$mes2="may";
		break;
		case "06":
			$mes2="june";
		break;
		case "07":
			$mes2="july";
		break;
		case "08":
			$mes2="august";
		break;
		case "09":
			$mes2="september";
		break;
		case "10":
			$mes2="october";
		break;
		case "11":
			$mes2="november";
		break;
		case "12":
			$mes2="december";
		break;
	}
	//echo "<br/> solo mes: ".$mes2;
	$formatoFecha = substr($nuevafechasal, 0, 3).$mes2.substr($nuevafechasal, 5, 9);
	//echo "<br/>probando ".$formatoFecha."<br/>";

//**************************************************
if($status != "")
{
//echo "listo STATUS";
$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set STATUS = '$status' where CODIGO_EMPLEADO = '$codigo' " );
oci_execute($res);

if($status == "Inactivo" && $fechasal != "") 
{
$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set FECHA_SALIDA = '$formatoFecha' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);
	$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set MOTIVO_SALIDA = '$motivosal' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);
	$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set COMENTARIO_BAJA = '$comentario' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);
	$res=oci_parse($cons,"commit" );
	oci_execute($res);
	}
}

// ********** A partir de aqui viene el bloque de actualizacion para los campos de
// 				los datos personales del usuario
// *********************************************************************************



if($direccion== "" || $telcasa=="" || $telcel=="")
{
	echo "
	<script>
	
	alert('por favor asegurese de llenar todos los campos');
	location.href='perfil.php?cod=$codigo';
		
	</script>

";
	}else
	{
	/*echo "<script>
	
	alert('alto');
	
		
	</script>
	";*/
	$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS 
				set direccion_empleado = '$direccion',
				telefono_casa = '$telcasa',
				telefono_celular ='$telcel',
				estado_civil = '$estadocivil',
				hijos = '$hijos' 
				where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);
	}

	
	
	
/*





if($status == "Inactivo")
{
	if($fechasal != ""){
	
	/*$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set FECHA_SALIDA = '$formatoFecha' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);*/
	
	/*$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set MOTIVO_SALIDA = '$motivosal' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);*/
	
	/*$res=oci_parse($cons,"update HQUINTANILLA.SABANA_CDS set COMENTARIO_BAJA = '$comentario' where CODIGO_EMPLEADO = '$codigo' " );
	oci_execute($res);*/
	
//}

oci_free_statement($res);
	oci_close($cons);

	
?>


<?php



echo "
	<script>

	location.href='../perfil/perfil.php?cod=$codigo';
		
	</script>

";

?>


	

</body>
</html>