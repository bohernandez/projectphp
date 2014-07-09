<?php
include("../../recursos/conexion/conexionOracle.php");

		$cons = conectarseOracle();
		$res=oci_parse($cons,"select * from DB_MUNICIPIO where ID_DEPTO=".$_GET['id']." order by NAME_MUNIC ASC");
		oci_execute($res);
		
echo "<select name='municipio' id='municipio'>";
while ($fila = oci_fetch_array($res, OCI_BOTH)) {
    echo "<option value='" . $fila['ID_MUNIC'] . "'>" . utf8_encode($fila['NAME_MUNIC']) . "</option>";
}
echo "</select>";
?>