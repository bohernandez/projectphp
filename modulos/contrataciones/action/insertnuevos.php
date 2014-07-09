<?php
include("../../../recursos/conexion/conexionOracle.php");

include("../../../recursos/conexion/conexionOracle.class.php");
include("../../../recursos/class/perfil.class.php");
$perfil = new perfil(); 

$cons = conectarseOracle();
$cod=$_POST['codigo'];
$departamento=$_POST['departamento'];
$direccion=$_POST['direccion'];
$estadocivil=$_POST['estadocivil'];
$fechaingreso=$_POST['fechaingreso'];
$fechanacimiento=$_POST['fechanacimiento'];
$genero=$_POST['genero'];
$insestu=$_POST['insestu'];
$jefe=$_POST['jefe'];
$lugar=$_POST['lugar'];
$municipio=$_POST['municipio'];
$nombre=$_POST['nombre'];
$planilla=$_POST['planilla'];
$puesto=$_POST['puesto'];
$statusac=$_POST['statusac'];
$tallacamisa=$_POST['tallacamisa'];
$telcasa=$_POST['telcasa'];
$telcel=$_POST['telcel'];
$titulo=$_POST['titulo'];
$codigo_empleado=$_POST['codigo_empleado'];
$hijos=$_POST['hijos'];
$dui=$_POST['dui'];
$nit=$_POST['nit'];
$nombre_familiar=$_POST['nombre_familiar'];
//$tel_emergencia=$_POST['tel_emergencia'];
$cel_emergencia=$_POST['cel_emergencia'];
$correo=$_POST['correo'];


if($correo ==""){
		//$idlugar=oci_parse($cons,"select id_lugar from lugar where nombre_lugar='$lugar'");
		//oci_execute($idlugar);
		//$id_lugar = oci_fetch_array($idlugar, OCI_BOTH);
		//$lugars=$id_lugar[0];
		
		$insertar=oci_parse($cons,"insert into sabana_cds(STATUS,
			USUARIO,
			DIRECCION_EMPLEADO,
              ID_ESTADOCIVIL,
              FECHA_INGRESO,
              FECHA_NACIMIENTO,
              SEXO,
              INS_ESTUDIOS,
              JEFE_INMEDIATO,
              ID_LUGAR,
              ID_MUNICIPIO,
              NOMBRE,
              ID_PLANILLA,
              ID_PUESTO,
              ESTUDIA,
              TALLA_CAMISA,
              TEL_FIJO,
              TEL_CEL,
              ID_TITULO,
              CORREO,
              CODIGO_EMPLEADO,
              HIJOS,
              DUI,
              NIT,
              NOM_FAM_EMER,
              CELL_FAM_EMER) 
        values('Activo',
				'pendiente',
				'$direccion',
				'$estadocivil',
            to_date('$fechaingreso','dd/mm/yyyy'),
            to_date('$fechanacimiento','dd/mm/yyyy'),
            '$genero',
            '$insestu',
            '$jefe',
            '$lugar',
            '$municipio',
            '$nombre',
            '$planilla',
            '$puesto',
            '$statusac',
            '$tallacamisa',
            '$telcasa',
            '$telcel',
            '$titulo',
						'$correo',
            '$codigo_empleado',
            '$hijos',
            '$dui',
            '$nit',
            '$nombre_familiar',
			'$cel_emergencia')
	");
		if(oci_execute($insertar))
		{
			$pc = gethostname();
			$insertar2=oci_parse($cons,"insert into T_LIFE.DB_LOG_CONTRATACION(user_mod,user_pc,hora_mod,cod_contratacion)
										values('$cod','$pc',sysdate,'$codigo_empleado')");
			oci_execute($insertar2);
			$idsabana = $perfil->get_lastid_sb();
			echo $idsabana;
			//echo "Datos actualizados correctamente";
		}
		else{
			echo "Error en la inserccion de datos 1";
			echo print_r($_POST);
		}
}
else
{
	//aqui se va a sacar el usuario a partir del correo
	$usuario = explode('@', $correo);
	$user=$usuario[0];
	
	//to_date('$fecha','dd/mm/yyyy')
	$idlugar=oci_parse($cons,"select id_lugar from lugar where nombre_lugar='$lugar'");
	oci_execute($idlugar);
	$id_lugar = oci_fetch_array($idlugar, OCI_BOTH);
	$lugars=$id_lugar[0];
	/*
	$insertar=oci_parse($cons,"
							insert into copia_sabana(departamento,direccion,estadocivil,fechaingreso,fechanacimiento,
							genero,insestu,jefe,lugar,municipio,nombre,planilla,puesto,statusac,
							tallacamisa,telcasa,telcel,titulo,codigo_vendedor,correo,codigo_empleado,
							hijos,dui,nit,nombre_familiar,tel_emergencia,cel_emergencia) 
				values('$departamento','$direccion','$estadocivil',to_date('$fechaingreso','dd/mm/yyyy'),
						to_date('$fechanacimiento','dd/mm/yyyy'),
						'$genero','$insestu','$jefe','$lugar','$telcasa','$telcel','$titulo','$codigo_vendedor',
						'$correo','$codigo_empleado','$hijos','$dui','$nit','$nombre_familiar','$tel_emergencia',
						'$cel_emergencia')
							");*/
							
	$insertar=oci_parse($cons,"insert into sabana_cds(STATUS,
				USUARIO,
				PASSWORD,
				DIRECCION_EMPLEADO,
                    ID_ESTADOCIVIL,
                    FECHA_INGRESO,
                    FECHA_NACIMIENTO,
              SEXO,
              INS_ESTUDIOS,
              JEFE_INMEDIATO,
              ID_LUGAR,
              ID_MUNICIPIO,
              NOMBRE,
              ID_PLANILLA,
              ID_PUESTO,
              ESTUDIA,
              TALLA_CAMISA,
              TEL_FIJO,
              TEL_CEL,
              ID_TITULO,
              CORREO,
              CODIGO_EMPLEADO,
              HIJOS,
              DUI,
              NIT,
              NOM_FAM_EMER,
              CELL_FAM_EMER) 
        values('Activo',
		'$user',
		MD5('$user'),
			'$direccion',
              '$estadocivil',


              to_date('$fechaingreso','dd/mm/yyyy'),
            to_date('$fechanacimiento','dd/mm/yyyy'),
            '$genero',
            '$insestu',
            '$jefe',
            '$lugar',
            '$municipio',
            '$nombre',
            '$planilla',
            '$puesto',
            '$statusac',
            '$tallacamisa',
            '$telcasa',
            '$telcel',
            '$titulo',
						'$correo',
            '$codigo_empleado',
            '$hijos',
            '$dui',
            '$nit',
            '$nombre_familiar',
			'$cel_emergencia')
	
	");
	
	if(oci_execute($insertar))
	{
			$pc = gethostname(); 
			$insertar2=oci_parse($cons,"insert into T_LIFE.DB_LOG_CONTRATACION(user_mod,user_pc,hora_mod,cod_contratacion) values('$cod','$pc',sysdate,'$codigo_empleado')");
			oci_execute($insertar2);
			$idsabana = $perfil->get_lastid_sb();
			echo $idsabana;
			//echo "Datos actualizados correctamente";
	}
				else{
				echo "Error en la inserccion de datos".$estadocivil;
				echo print_r($_POST);
			}				


	}					
								
/*
		
	oci_execute($res);


insert into copia_sabana(departamento,direccion,estadocivil,fechaingreso,fechanacimiento,
							genero,insestu,jefe,lugar,municipio,nombre,planilla,puesto,statusac,
							tallacamisa,telcasa,telcel,titulo,codigo_vendedor,correo,codigo_empleado,
							hijos,dui,nit,nombre_familiar,tel_emergencia,cel_emergencia) 
				values('$departamento','$direccion','$estadocivil',to_date('$fechaingreso','dd/mm/yyyy'),
						to_date('$fechanacimiento','dd/mm/yyyy'),
						'$genero','$insestu','$jefe','$lugar','$telcasa','$telcel','$titulo','$codigo_vendedor',
						'$correo','$codigo_empleado','$hijos','$dui','$nit','$nombre_familiar','$tel_emergencia',
						'$cel_emergencia');
*/




?>