<?php
	//Funcion para conectarse a la DB Oracle, en la que se realizan las consultas de indicadores y tipificaciones
	class Oracle
	{
		public function conectarseOracle1()
		{
			//Datos del servidor donde se encuentra la DB
			$db = '	(DESCRIPTION=
						(ADDRESS=
							(PROTOCOL=TCP)
							(HOST=192.168.19.122)
							(PORT=1521)
						)
				(CONNECT_DATA=
					(SID=DWDEV)	
				)
			)';
	
			//Credenciales de la DB, usuario y contraseña
			$conexion2=oci_connect('T_LIFE', 'Tlif#9733', $db);
			$err=OciError();
	
			//Verifica que no haya error en la conexion, si lo hay imprime el error
			if ($err){
				echo 'Error de comunicacion con la BD. '.$err['code'].' '.$err['message'].' '.$err['sqltext'];            
			}
		
			//Si no se encuentra error retorna el valor de $conexion2
			return $conexion2;
		}


		public function conectarseOracle()
		{
			$dbconn = pg_connect("host=localhost dbname=t_life user=user_life password=dblife") or die('No se ha podido conectar: ' . pg_last_error());

			//Si no se encuentra error retorna el valor de $conexion2
			return $dbconn;
		}
		

	}
?>
