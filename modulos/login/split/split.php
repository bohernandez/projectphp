<?php
/*
include("../conexion/conexionOracle.php");
$cons = conectarseOracle();

$res=oci_parse($cons,"select distinct(CODIGO_EMPLEADO), NOMBRE, CDS, CORREO,ZONA from COI.tmp_8_ago_sabana_cds where CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' ");
oci_execute($res);
while($fila = oci_fetch_array($res, OCI_BOTH)){
}
*/
?>

<?php
	include("../../../recursos/conexion/conexionOracle.php");
	$c = conectarseOracle();
	
	// Select Data...
	$s = OCIParse($c, "select CORREO from SABANA_CDS");
	OCIExecute($s, OCI_DEFAULT);
	while (OCIFetch($s)) {
			$correos = ociresult($s, "CORREO");
			echo $correos."<br />";
			$pieza = explode("@",$correos);
			echo $pieza[0]."<br />";
			/*$a = OCIParse($c, "update HQUINTANILLA.SABANA_CDS SET usuario = '".$pieza[0]."' WHERE CORREO = '".$correos."'");*/
			$a = OCIParse($c, "update SABANA_CDS SET PASSWORD = MD5('".$pieza[0]."'), usuario = '".$pieza[0]."'  WHERE CORREO = '".$correos."'");
			OCIExecute($a, OCI_DEFAULT);
	}
	
			// Commit to save changes...
		OCICommit($c);

		// Logoff from Oracle...
		OCILogoff($c);
	
	/*	
	// Drop old table...
	$s = OCIParse($c, "drop table tab1");
	OCIExecute($s, OCI_DEFAULT);

	// Create new table...
	$s = OCIParse($c, "create table tab1 (col1 number, col2 varchar2(30))");
	OCIExecute($s, OCI_DEFAULT);


  // Insert data into table...
  $s = OCIParse($c, "insert into tab1 values (1, 'Frank')");
  OCIExecute($s, OCI_DEFAULT);

  // Insert data using bind variables...
  $var1 = 2;
  $var2 = "Scott";
  $s = OCIParse($c, "insert into tab1 values (:bind1, :bind2)");
  OCIBindByName($s, ":bind1", $var1);
  OCIBindByName($s, ":bind2", $var2);
  OCIExecute($s, OCI_DEFAULT);
  */


?>