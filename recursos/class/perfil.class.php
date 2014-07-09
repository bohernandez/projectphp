<?php
header('Content-Type: text/html; charset=ISO-8859-1');
class perfil extends Oracle
{
	function get_informacion_by_code($codigo)
	{
		$c = parent::conectarseOracle();
		$query = "SELECT * FROM SABANA_CDS WHERE CODIGO_EMPLEADO = '$codigo'";
		
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		while($arr = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			//var_dump($arr);
			return $arr;

  		}
  		// Liberando el conjunto de resultados
		//pg_free_result($result);

		// Cerrando la conexión
		//pg_close($dbconn);
	}

	function get_informacion_by_idsabana($codigo)
	{
		$c = parent::conectarseOracle();
		$query = "SELECT * FROM SABANA_CDS WHERE ID_SABANA = '$codigo'";
		
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		while($arr = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			//var_dump($arr);
			return $arr;

  		}
  		// Liberando el conjunto de resultados
		//pg_free_result($result);

		// Cerrando la conexión
		//pg_close($dbconn);
	}


	function busqueda_codigo_nombre($q)
	{
		$c = parent::conectarseOracle();
		$query = "select CODIGO_EMPLEADO, NOMBRE, ID_LUGAR, CORREO, ID_SABANA from SABANA_CDS
   			where CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' order by nombre";
		
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		while($arr[] = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			//var_dump($arr);
			

  		}
  		return $arr;

  		pg_free_result($result);

  		pg_close($c);
  		// Liberando el conjunto de resultados
		//pg_free_result($result);

		// Cerrando la conexión
		//pg_close($dbconn);
	}

	
	function get_municipio($id_munic)
	{
		$c = parent::conectarseOracle();
		$query = "select name_munic , name_depto, id_munic, DEPTO.ID_DEPTO
							from DB_MUNICIPIO municip
							left join DB_DEPARTAMENTO depto
							on MUNICIP.ID_DEPTO = DEPTO.ID_DEPTO
							where MUNICIP.ID_MUNIC='$id_munic'";
		
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		while($arr = pg_fetch_array($result, NULL, PGSQL_ASSOC)){

			//return $arr;
			//var_dump($arr);
			return $arr;

  		}
	}

	public function contar_amon($id)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "select count(*) NUM from T_LIFE.VW_AMONESTACIONES
							where id_sabana = '$id' and meses <= 6 and status = '1'");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			$cant = ociresult($s, "NUM");
			return $cant;
		}
		else
		{
			return false;
		}
	}
	
	public function get_lugares()
	{
		
	}
	
	
	
	function get_informacion($codigo)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select *	from T_LIFE.VIEW_SABANA where id_sabana='$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			return $filas;

		}
	}
	

/*

select distinct(CODIGO_EMPLEADO),FECHA_INGRESO,
						CDS, STATUS, NOMBRE,ZONA,JEFE_ZONA,DIRECCION_EMPLEADO,
						HIJOS, TELEFONO_CASA, TELEFONO_CELULAR, GERENTE,ESTADO_CIVIL, 
						PUESTO,JEFE_INMEDIADO,PLANILLA,UNIDAD,MOTIVO_SALIDA,FECHA_SALIDA, COMENTARIO_BAJA, ID_MUNICIPIO
						from view_sabana
						where CODIGO_EMPLEADO='$cod'
*/





	function get_informacion_sb($codigo)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select *	from T_LIFE.SABANA_CDS where ID_SABANA='$codigo'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			return $filas;
		}
	}
	
	
	function get_municipio1($id_munic)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select name_munic , name_depto, id_munic, DEPTO.ID_DEPTO
							from DB_MUNICIPIO municip
							left join DB_DEPARTAMENTO depto
							on MUNICIP.ID_DEPTO = DEPTO.ID_DEPTO
							where MUNICIP.ID_MUNIC='$id_munic'");
		OCIExecute($s, OCI_DEFAULT);
		while ($filas = oci_fetch_array($s)) 
		{
			return $filas;
		}
	}
	
	function select_munic()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from DB_MUNICIPIO");
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
	
	function select_depto()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from DB_DEPARTAMENTO");
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
	
	function select_estcivil()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from ESTADO_CIVIL");
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
	
	function select_planilla()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from PLANILLAS");
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
	
	function select_puestos()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from PUESTO");
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
	
	function select_lugar($idlugar)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from lugar where lugar_superior = '$idlugar' order by nombre_lugar");
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
	
	function select_accesos_cat()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "Select * from DB_LOG_ACCESOS order by id_acceso");
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
	
	
	function select_accesos($cod, $acc)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from DB_LOG_SABANA_ACCESOS
			where id_sabana = '$cod' and id_acceso='$acc'");
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
	
	function select_jefe($id_lugar)
	{
		$c = parent::conectarseOracle();
		/*$s = OCIParse($c, "select distinct(sb2.nombre), sb2.codigo_empleado
							from sabana_cds sb1
							left join sabana_cds sb2
							on SB1.JEFE_INMEDIATO = SB2.CODIGO_EMPLEADO
							left join sabana_cds sb3
							on SB2.JEFE_INMEDIATO = SB3.CODIGO_EMPLEADO
							left join sabana_cds sb4
							on SB3.JEFE_INMEDIATO = SB4.CODIGO_EMPLEADO
							where sb1.id_lugar = '$id_lugar' and SB1.JEFE_INMEDIATO = SB2.CODIGO_EMPLEADO");
		*/
		
		$s = OCIParse($c, "select distinct(sb2.nombre), sb2.codigo_empleado
							from sabana_cds sb1
							left join sabana_cds sb2
							on SB1.JEFE_INMEDIATO = SB2.CODIGO_EMPLEADO
							where sb1.id_lugar = '$id_lugar' and SB1.JEFE_INMEDIATO = SB2.CODIGO_EMPLEADO
							union
							select SB1.NOMBRE, sb1.codigo_empleado
							from lugar lg1
							left join lugar lg2 on LG1.LUGAR_SUPERIOR = LG2.ID_LUGAR
							inner join sabana_cds sb1 on SB1.ID_LUGAR = LG2.ID_LUGAR
							where lg1.id_lugar = '$id_lugar'");
		
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
	
	function select_puesto_temp()
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "select * from PUESTO_TEMPORAL order by ID_PUESTO_TEMPORAL");
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
	
	function actualizar_bloque1($cod, $sb, $name, $dui, $nit, $cel, $fijo, $mun, $dir, $est, $hijo, $nac, $correo, $usu)
	{
		$c = parent::conectarseOracle();
		$string = "update sabana_cds 
			set codigo_empleado = '$cod', nombre = '$name', dui = '$dui', nit = '$nit',
			tel_cel = '$cel', tel_fijo = '$fijo', id_municipio = '$mun', direccion_empleado = '$dir',
			id_estadocivil = '$est', hijos = '$hijo', fecha_nacimiento = to_date('$nac','dd/mm/rr'),
			correo='$correo', usuario='$usu'
			where id_sabana='$sb'";
			
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
	
	function actualizar_bloque2($plan, $puesto, $lugar, $jefe, $sabana, $ptemporal, $cod, $boss)
	{
		$c = parent::conectarseOracle();
		
		if($boss == "true")
		{
			$s = OCIParse($c, "update sabana_cds
							set id_planilla='$plan', id_puesto='$puesto', id_lugar='$lugar', jefe_inmediato='$jefe', id_puesto_temporal='$ptemporal'
							where id_sabana='$sabana'");
			if(OCIExecute($s, OCI_DEFAULT))
			{
				$p = OCIParse($c, "update sabana_cds set jefe_inmediato='$cod' where id_lugar='$lugar' and codigo_empleado <> '$cod' and status = 'Activo'");
				if(OCIExecute($p, OCI_DEFAULT))
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
		}
		else
		{
				$s = OCIParse($c, "update sabana_cds
							set id_planilla='$plan', id_puesto='$puesto', id_lugar='$lugar', jefe_inmediato='$jefe', id_puesto_temporal='$ptemporal'
							where id_sabana='$sabana'");
							
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
	}
	
	function addacceso($idsabana, $idacceso, $usuario)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "insert into DB_LOG_SABANA_ACCESOS (ID_SABANA, ID_ACCESO, USUARIO)
						values ('$idsabana', '$idacceso','$usuario')");
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
	
	function modifyacceso($idsabana, $idacceso, $usuario)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "update DB_LOG_SABANA_ACCESOS
							set usuario='$usuario'
							where id_sabana='$idsabana' and ID_ACCESO='$idacceso'");
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
	
	function get_codigo($idsabana)
	{
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "select CODIGO_EMPLEADO from SABANA_CDS where id_sabana = '$idsabana'");
		OCIExecute($s, OCI_DEFAULT);
		if (OCIFetch($s)) {
			$cant = ociresult($s, "CODIGO_EMPLEADO");
			return $cant;
		}
		else
		{
			return false;
		}
	}
	
	public function get_lastid_sb()
	{
		
		$c = parent::conectarseOracle();
		// Select Data...
		$s = OCIParse($c, "Select Max(id_sabana) ID From sabana_cds");
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
	
	public function insert_acceso($idacc, $acceso)
	{
		$c = parent::conectarseOracle();
		$s = OCIParse($c, "insert into DB_LOG_ACCESOS values ('$idacc','$acceso')");
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
	
	
	
	
	
	
}	
?>