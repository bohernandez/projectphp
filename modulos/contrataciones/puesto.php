	<?php
	include("../../recursos/conexion/conexionOracle.php");
	$cons = conectarseOracle();
	$bandera=$_GET['id'];
	
	if($bandera=="1"){
	/* esto es para la opcion de los CDS*/
	$cds=oci_parse($cons,"select id_puestos,nombre_puesto from puesto
		where id_puestos <> puesto_superior and puesto_superior = '3' or puesto_superior = '2' and nombre_puesto<>'CS Jefatura' and id_puestos<>5 and id_puestos<>'8'"); //contact center
		
		oci_execute($cds);
		
		echo "<select name='puesto' id='puesto' required='required'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila8 = oci_fetch_array($cds, OCI_BOTH))
		{
            echo "<option value='".$fila8[0]."'>".utf8_encode($fila8[1])."</option>";
        }  
        echo "</select>";
		
	} else if ($bandera=="3")
	{
		/* esto es para la opcion de los MCDS*/
		$cds=oci_parse($cons,"select id_puestos,nombre_puesto from puesto
			where id_puestos = '8'"); 
								
		oci_execute($cds);
			
		echo "<select name='puesto' id='puesto' required='required'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		  while ($fila8 = oci_fetch_array($cds, OCI_BOTH))
		{
            echo "<option value='".$fila8[0]."'>".utf8_encode($fila8[1])."</option>";
        }  
        echo "</select>";
		
		
		
		 
	} else if ($bandera=="2")
	{

		
		
	/* esto es para la opcion de los contact center*/
	$cc=oci_parse($cons,"select id_puestos,nombre_puesto from puesto
						where id_puestos <> puesto_superior and puesto_superior = '11'"); //contact center
		oci_execute($cc);
		
		echo "<select name='puesto' id='puesto' >";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		while ($fila7 = oci_fetch_array($cc, OCI_BOTH))
		{
            echo "<option value='".$fila7[0]."'>".utf8_encode($fila7[1])."</option>";
        }
        echo "</select>";
		
		
		
	} else if ($bandera == "4")
	{
		

		$tra=oci_parse($cons,"select id_puestos,nombre_puesto from puesto
						where id_puestos <> puesto_superior and puesto_superior = '59'"); //Personal nuevo en entrenamiento
		
		oci_execute($tra);
		
	
		echo "<select name='puesto' id='puesto' >";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		while ($fila10 = oci_fetch_array($tra, OCI_BOTH))
		{
            echo "<option value='".$fila10[0]."'>".utf8_encode($fila10[1])."</option>";
        }
        echo "</select>";
	}
		
		
		?>
		
		
	<script type="text/javascript">	
			jQuery(document).ready(function(){
                jQuery('#puesto').change(function(){
                    var id=jQuery('#puesto').val();

					jQuery('#divlugar').load('lugar.php?id='+id);
                });    
            });
	</script>
	