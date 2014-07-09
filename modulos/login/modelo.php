<?php
class acceso extends Oracle
{
	public function verificar_user($nickname, $pasword)
	{
		$c = parent::conectarseOracle();
		
		// Select Data...
		$query = "SELECT ID_SABANA, CODIGO_EMPLEADO, USUARIO, PASSWORD FROM SABANA_CDS WHERE USUARIO = '$nickname' AND PASSWORD = '$pasword' and status= 'Activo'";
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		$rs = pg_fetch_assoc($result);

		if (!$rs) 
  		{
     		return false;
  		} else {

  			return true;
  		}

  		// Liberando el conjunto de resultados
		pg_free_result($result);

		// Cerrando la conexión
		pg_close($dbconn);
	}


	public function obtenerid($nickname,$pasword)
	{
		$c = parent::conectarseOracle();
		$query = "SELECT ID_SABANA, CODIGO_EMPLEADO, USUARIO, PASSWORD, ID_PUESTO  FROM SABANA_CDS WHERE USUARIO = '$nickname' AND PASSWORD = '$pasword'";
		
		$result = pg_query($c, $query) or die('La consulta fallo: ' . pg_last_error());
		while($arr = pg_fetch_array($result)){
  			$codigo = $arr[1];
			$idpuesto = $arr[4];
			$idsabana = $arr[0];

  			return $codigo."|".$idpuesto."|".$idsabana;

  		}
  		// Liberando el conjunto de resultados
		pg_free_result($result);

		// Cerrando la conexión
		pg_close($dbconn);

	}

	//Esta funcion servira para verificar cunado alguien haya pedido cambio de contrasenia
	public function verificar_modificacion($nickname, $passtemp)
	{
		//$c = parent::conectarseOracle();
		
		//$s = OCIParse($c, "select * from DB_LOG_RESET_PWD where ((TRUNC(SYSDATE)  - TRUNC(FECHA_RESET)) < 25) AND MODIFICADO IS NULL AND NICK_EMPLEADO = '$nickname' AND PWD_TEMPORAL='$passtemp'");
		//OCIExecute($s, OCI_DEFAULT);
		//if (OCIFetch($s))
		//	return true;
		//else
			return false;
	}
}

?>