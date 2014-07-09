<?php
	  
	  include("../../recursos/conexion/conexionOracle.php");
	$cons = conectarseOracle();
	
	  $res5=oci_parse($cons,"select * from T_LIFE.DB_INS_ESTUDIOS 
								where id_universidad <>0");
								
	oci_execute($res5);
	$id=$_GET['id'];
	
	if($id!="4"){
	

	   echo "<select name='insestu' id='insestu'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila5 = oci_fetch_array($res5, OCI_BOTH))
		{
            echo "<option value='".$fila5[0]."'>".utf8_encode($fila5[1])."</option>";
}
		

echo "</select>";
}
else
{
 echo "<select name='insestu' id='insestu'>";

		
		 
            echo "<option value='4'>Inactivo</option>";

		

echo "</select>";
	
}
?>