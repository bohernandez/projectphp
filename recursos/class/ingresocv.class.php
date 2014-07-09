
<?php
class ingresocv extends Oracle
{
	function select_depto()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from T_LIFE.DB_DEPARTAMENTO");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$ejecutivos[] = $filas;
		}

		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
		else
		{
			return "";
		}
	}
	
	function select_motivos_rechazo($etapa)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from TR_MOTIVOS where id_etapa = '$etapa'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$ejecutivos[] = $filas;
		}

		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
		else
		{
			return "";
		}
	}
	
	function select_puesto()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from PUESTO");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$ejecutivos[] = $filas;
		}

		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
		else
		{
			return "";
		}
	}

	function save_candidato($dui, $nombre, $email, $movil, $fijo, $municipio, $idproceso, $mtvrechazo, $aplic)
	{
		$c = parent::conectarseOracle();
		$z = OCIParse($c, "insert into TR_CANDIDATO (DUI,NOMBRE,CORREO,TEL_CEL,TEL_FIJ, ID_MUNICIPIO, ID_PROCESO,  ID_MOTIVO, STATUS)
							values ('$dui', '$nombre', '$email', '$movil', '$fijo', '$municipio', '$idproceso', '$mtvrechazo', '$aplic')");

		if(OCIExecute($z, OCI_DEFAULT))
		{
			// Commit to save changes...
			OCICommit($c);

			// Logoff from Oracle...
			OCILogoff($c);
						
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function get_jefe($idsuperv)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select sb.CODIGO_EMPLEADO, sb.NOMBRE, sb.status,  /*SUP.NOMBRE jefe_inmediato, */LG.NOMBRE_LUGAR CDS, PT.NOMBRE_PUESTO puesto, sb.CORREO, sb.jefe_inmediato supervisor, LG.ID_LUGAR
							from SABANA_CDS sb
							inner join lugar lg
							on LG.ID_LUGAR = SB.ID_LUGAR
              /*inner join SABANA_CDS sup
              on SB.jefe_inmediato = SUP.CODIGO_EMPLEADO*/
							inner join puesto pt
							on PT.ID_PUESTOS = SB.ID_PUESTO
							where sb.codigo_empleado =  '$idsuperv' order by PT.NOMBRE_PUESTO");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$ejecutivos[] = $filas;
		}
		
		//return $ejecutivos;
		
		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
		else
		{
			return "";
		}
	}
	
	






/*	todo esto es de	amonestaciones	*/
	function get_ejecutivos($idsuperv)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select sb.id_sabana, sb.status, sb.CODIGO_EMPLEADO, sb.NOMBRE, (Select nombre from SABANA_CDS where codigo_empleado = '$idsuperv') jefe_inmediado, LG.NOMBRE_LUGAR cds, PT.NOMBRE_PUESTO puesto, CORREO, SB.TEL_CEL, SB.TEL_FIJO, SB.jefe_inmediato supervisor, SB.ID_LUGAR
							from SABANA_CDS sb
							inner join lugar lg
							on LG.ID_LUGAR = SB.ID_LUGAR
							inner join puesto pt
							on PT.ID_PUESTOS = SB.ID_PUESTO
							where sb.JEFE_INMEDIATO =  '$idsuperv' order by SB.ID_LUGAR");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$ejecutivos[] = $filas;
		}
		
		//return $ejecutivos;
		
		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
	}
	function get_ejecutivos_act($idsuperv)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select sb.id_sabana, sb.status, sb.CODIGO_EMPLEADO, sb.NOMBRE, (Select nombre from SABANA_CDS where codigo_empleado = '$idsuperv') jefe_inmediado, LG.NOMBRE_LUGAR cds, PT.NOMBRE_PUESTO puesto, CORREO, SB.TEL_CEL, SB.TEL_FIJO, LG.ID_LUGAR, sb.JEFE_INMEDIATO SUPERVISOR
							from SABANA_CDS sb
							inner join lugar lg
							on LG.ID_LUGAR = SB.ID_LUGAR
							inner join puesto pt
							on PT.ID_PUESTOS = SB.ID_PUESTO
							where sb.JEFE_INMEDIATO =  '$idsuperv' and status='Activo' order by PT.NOMBRE_PUESTO");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$ejecutivos[] = $filas;
		}
		
		//return $ejecutivos;
		
		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
	}
	
	
	function get_supervisores($idchief)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select sb.id_sabana, sb.status, sb.CODIGO_EMPLEADO, sb.NOMBRE, (Select nombre from SABANA_CDS where codigo_empleado = '$idchief') jefe_inmediado, LG.NOMBRE_LUGAR cds, PT.NOMBRE_PUESTO puesto, CORREO, SB.TEL_CEL, SB.TEL_FIJO
							from SABANA_CDS sb
							inner join lugar lg
							on LG.ID_LUGAR = SB.ID_LUGAR
							inner join puesto pt
							on PT.ID_PUESTOS = SB.ID_PUESTO
							where sb.JEFE_INMEDIATO =  '$idchief' 	and sb.id_puesto <> '8' order by PT.NOMBRE_PUESTO");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$ejecutivos[] = $filas;
		}
		
		//return $ejecutivos;
		
		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
	}
	
	function get_lugar($idemple)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "select lg.id_lugar, nombre_lugar cds
              from sabana_cds sb
              inner join lugar lg
              on lg.id_lugar=sb.id_lugar
              where id_sabana = '$idemple'");
		OCIExecute($s, OCI_DEFAULT);
		
		if ($filas = oci_fetch_array($s))
		{
			//$usu = ociresult($s, "USUARIO");
			return $filas;
		}
		else
		{
			return false;
		}
	}
	
	function select_accesos($cod, $acc)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from DB_LOG_SABANA_ACCESOS
			where id_sabana = (select id_sabana from sabana_cds where codigo_empleado='$cod') and id_acceso='$acc'");
		OCIExecute($s, OCI_DEFAULT);
		if ($filas = oci_fetch_array($s))
		{
			//$usu = ociresult($s, "USUARIO");
			return $filas;
		}
		else
		{
			return false;
		}
	}
	
	
	
	
	
	
	
	public function guardar_amonestacion($cod_emp, $cod_sup, $lugar, $fecha, $motivo, $comments, $cod_creator)
	{
		$c = parent::conectarseOracle();
		
		/*$z = OCIParse($c, "insert into DB_LOG_AMONESTACION (id_sabana, cod_emp_sup, id_lugar, fecha, id_motivo, comentario, fecha_creacion, cod_emp_creator)  
                          values ('$cod_emp', '$cod_sup', '$lugar', to_date('$fecha','dd/mm/yyyy') , '$motivo', '$comments', sysdate,'$cod_creator')");
		*/
		$z = OCIParse($c, "insert into DB_LOG_AMONESTACION (id_sabana, cod_emp_sup, id_lugar, fecha, id_motivo, comentario, fecha_creacion, cod_emp_creator)  
                          values ('$cod_emp', '$cod_sup', '$lugar', sysdate , '$motivo', '$comments', sysdate,'$cod_creator')");
		if(OCIExecute($z, OCI_DEFAULT))
		{
			// Commit to save changes...
			OCICommit($c);

			// Logoff from Oracle...
			OCILogoff($c);
						
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public function get_lastid()
	{
		
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "Select Max(id_amonestacion) ID From DB_LOG_AMONESTACION");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			$amonest = ociresult($s, "ID");
			return $amonest;
		}
		else
		{
			return false;
		}
	}

	/* Imprime la ultima amonestacion recien aplicada a un empleado */
	public function imprimir_amonestacion($codigo)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select am.id_amonestacion, sb.nombre, (select nombre from sabana_cds where codigo_empleado = sb.jefe_inmediato  ) jefe_inmediado, lg.nombre_lugar id_lugar, am.fecha, am.comentario, mtv.detalle id_motivo
from sabana_cds sb
inner join db_log_amonestacion am
on am.id_sabana = sb.id_sabana
inner join lugar lg
on lg.id_lugar = SB.ID_LUGAR
inner join CAT_MOTIVOS mtv
on mtv.id_motivo = AM.ID_MOTIVO
where sb.id_sabana = '$codigo' and am.id_amonestacion = (Select max(id_amonestacion) from db_log_amonestacion where id_sabana=sb.id_sabana)");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$reportes[] = $filas;
		}
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return "La consulta no sirve";
		}
	}
	
	/* Imprime una amonestacion en especifico de acuerdo a su id */
	public function imprimir_amonestacion_codigo($codigo)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select am.id_amonestacion, sb.nombre, (select nombre from sabana_cds where codigo_empleado = sb.jefe_inmediato  ) jefe_inmediado, 		lg.nombre_lugar id_lugar, am.fecha, am.comentario, mtv.detalle id_motivo
		from sabana_cds sb
		inner join db_log_amonestacion am
		on am.id_sabana = sb.id_sabana
		inner join lugar lg
		on lg.id_lugar = SB.ID_LUGAR
		inner join CAT_MOTIVOS mtv
		on mtv.id_motivo = AM.ID_MOTIVO
		where am.id_amonestacion = '$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$reportes[] = $filas;
			//return $filas;
		}
		//return $reportes;
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return "La consulta no sirve";
		}
	}
	
	
	function ver_amonestaciones($id_super, $id_ejec)
	{
		$c = parent::conectarseOracle();
		if(!empty($id_ejec))
		{
			/*$s = OCIParse($c, "Select B.ID_AMONESTACION, B.FECHA,  C.NOMBRE, C.JEFE_INMEDIADO, LG.NOMBRE_LUGAR , MTV.AMONESTACION , B.COMENTARIO
						from  DB_LOG_AMONESTACION b
inner join view_sabana C ON C.id_sabana = B.id_sabana
inner join lugar lg ON LG.ID_LUGAR = B.ID_LUGAR
inner join CAT_MOTIVOS mtv on MTV.ID_MOTIVO = B.ID_MOTIVO
where C.id_sabana = '$id_ejec'");*/
$s = OCIParse($c, "Select B.ID_AMONESTACION, B.FECHA,  C.NOMBRE, C.JEFE_INMEDIADO, LG.NOMBRE_LUGAR , MTV.AMONESTACION , B.COMENTARIO, MTV.GRAVEDAD, B.STATUS
					from  DB_LOG_AMONESTACION b
					inner join view_sabana C ON C.id_sabana = B.id_sabana
					inner join lugar lg ON LG.ID_LUGAR = B.ID_LUGAR
					inner join CAT_MOTIVOS mtv on MTV.ID_MOTIVO = B.ID_MOTIVO
					where b.status = '1' and C.id_sabana = '$id_ejec'
					union all
					select B.ID_APS, B.FECHA, C.NOMBRE, C.JEFE_INMEDIADO, LG.NOMBRE_LUGAR, MTV.AMONESTACION, B.OBSERVACIONES, MTV.GRAVEDAD, B.STATUS
					from T_LIFE.DB_LOG_PERSONNEL_ACTION b
					inner join view_sabana C ON C.id_sabana = B.id_sabana
					inner join lugar lg ON LG.ID_LUGAR = C.ID_LUGAR
					inner join CAT_MOTIVOS mtv on MTV.ID_MOTIVO = B.ID_MOTIVO
					where b.status = '1' and C.id_sabana = '$id_ejec'");
			OCIExecute($s, OCI_DEFAULT);
			while ($filas = oci_fetch_array($s)) 
			{
				$ejecutivos[] = $filas; 
			}
		
			//return $ejecutivos;
		
			if (count($ejecutivos) > 0)
			{
				return $ejecutivos;
			}
		}
		else
		{
		
			$s = OCIParse($c, "Select B.ID_AMONESTACION, B.FECHA,  C.NOMBRE, C.JEFE_INMEDIADO, LG.NOMBRE_LUGAR , MTV.AMONESTACION , B.COMENTARIO
								from  DB_LOG_AMONESTACION b
								inner join view_sabana C ON C.id_sabana = B.id_sabana
								inner join lugar lg ON LG.ID_LUGAR = B.ID_LUGAR
								inner join CAT_MOTIVOS mtv on MTV.ID_MOTIVO = B.ID_MOTIVO
								inner join sabana_cds sb on sb.id_sabana =  C.id_sabana
								where sb.jefe_inmediato = '$id_super'");
			OCIExecute($s, OCI_DEFAULT);
			while ($filas = oci_fetch_array($s)) 
			{
				$ejecutivos[] = $filas; 
			}
		
			//return $ejecutivos;
		
			if (count($ejecutivos) > 0)
			{
				return $ejecutivos;
			}
		}
		
	}
	
	public function verificar_jefes($codigo)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "Select NOMBRE from SABANA_CDS WHERE JEFE_INMEDIATO = '$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	/* Es la misma funcion que "verificar_jefes" pero es usada para redireccionar el perfil */
	public function verificar_supervisor($codigo)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "Select NOMBRE from SABANA_CDS WHERE JEFE_INMEDIATO = '$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function select_motivos()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from T_LIFE.cat_motivos
								where gravedad like '%Leve%'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			$reportes[] = $filas;
		}
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return false;
		}
	}
	
	function get_correos($id_sabana)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select distinct(sb1.nombre), sb1.correo, sb2.nombre, sb2.correo, sb3.nombre, sb3.correo, sb1.correo ||';' || sb2.correo||';'||sb3.correo email 
							from sabana_cds sb1
							left join sabana_cds sb2
							on SB1.JEFE_INMEDIATO = SB2.CODIGO_EMPLEADO
							left join sabana_cds sb3
							on SB2.JEFE_INMEDIATO = SB3.CODIGO_EMPLEADO
							left join sabana_cds sb4
							on SB3.JEFE_INMEDIATO = SB4.CODIGO_EMPLEADO
							where sb1.id_sabana='$id_sabana'");
		OCIExecute($s, OCI_DEFAULT);
		if ($filas = oci_fetch_array($s))
		{
			//$usu = ociresult($s, "USUARIO");
			return $filas;
		}
		else
		{
			return false;
		}
	}
	
	
	
	/*
	public function verificar_supervisor($codigo)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "select CODIGO_EMPLEADO from HQUINTANILLA.SABANA_CDS
							WHERE (PUESTO = 'CS Jefatura' OR PUESTO = 'Team Leader') AND CODIGO_EMPLEADO='$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	*/
	
function select_ejecutivos_by_lugar($id_lugar)	
{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select id_sabana, nombre from sabana_cds where id_lugar = '$id_lugar' and status = 'Activo'");
		
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$ejecutivos[] = $filas;
		}
		
		//return $ejecutivos;
		
		if (count($ejecutivos) > 0)
		{
			return $ejecutivos;
		}
		else
		{
			return "";
		}
}


function updt_stus_amon($cod, $grav)
{
	$c = parent::conectarseOracle();
	if($grav == "Leve")
	{
		$string = "update DB_LOG_AMONESTACION
					set status = '0'
					where id_amonestacion = '$cod'";
	}
	else
	{
		$string = "update DB_LOG_PERSONNEL_ACTION
					set status = '0'
					where id_aps = '$cod'";
	}	
			
		$s = OCIParse($c, $string);
			
		if(OCIExecute($s, OCI_DEFAULT))
		{
			// Commit to save changes...
			OCICommit($c);

			// Logoff from Oracle...
			OCILogoff($c);
						
			return true;
		}
		else
		{
			return false;
		}
}


public function ver_amonestaciones_vigentes($codigo)
{
	$c = parent::conectarseOracle();
	$s = OCIParse($c, "SELECT * FROM VW_AMONESTACIONES
						WHERE STATUS = '1' AND MESES <= 6 AND ID_SABANA = $codigo");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) {
			$reportes[] = $filas;
			//return $filas;
		}
		//return $reportes;
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return false;
		}
}

public function ver_amonestaciones_vencidas($codigo)
{
	$c = parent::conectarseOracle();
	$s = OCIParse($c, "SELECT * FROM VW_AMONESTACIONES
						WHERE STATUS = '1' AND MESES >= 6 AND ID_SABANA = $codigo");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$reportes[] = $filas;
			//return $filas;
		}
		//return $reportes;
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return false;
		}
}

public function ver_amonestaciones_anuladas($codigo)
{
	$c = parent::conectarseOracle();
	$s = OCIParse($c, "SELECT * FROM VW_AMONESTACIONES
						WHERE STATUS = '0' AND ID_SABANA = $codigo");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s))
		{
			$reportes[] = $filas;
			//return $filas;
		}
		//return $reportes;
		
		if (count($reportes) > 0)
		{
			return $reportes;
		}
		else
		{
			return false;
		}
}










          
          
          






}
?>