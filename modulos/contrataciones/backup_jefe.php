	<?php
	
	include("../../recursos/conexion/conexionOracle.php");
	$cons = conectarseOracle();
	$puesto=$_GET['puesto'];
	$lugar=$_GET['lugar'];

	/* esto es para la opcion de los contact center*/
	/*$jefe=oci_parse($cons,"select jefe_inmediato,nombre from sabana_cds
							where id_lugar = '$lugar' and id_puesto ='$puesto' and status='Activo'"); //contact center*/
							
							
							
		if($puesto<12)
		{
		$jefe=oci_parse($cons,"select distinct (cds),sb.puesto,sb.jefe_inmediado,supervisor from T_LIFE.VIEW_SABANA SB
		INNER JOIN t_life.puesto
		ON SB.PUESTO=(select nombre_puesto from t_life.puesto where id_puestos='$puesto')
		and sb.cds = (select nombre_lugar from t_life.lugar where id_lugar=
		(select id_lugar from lugar where nombre_lugar='$lugar'))");
		
		/*
		*/
							
		//$lugar2=oci_parse($cons,"select id_lugar from lugar where nombre_lugar='Equipo Negro'");

		oci_execute($jefe);
		
	
		 echo "<select name='jefe' id='jefe' required='required'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila10 = oci_fetch_array($jefe, OCI_BOTH))
		{
            echo "<option value='".$fila10[3]."'>".utf8_encode($fila10[2])."</option>";
        }
		
     
        echo "</select>";
		}
		else
		{
		
		$jefe=oci_parse($cons,"select distinct (cds),sb.puesto,sb.jefe_inmediado,supervisor from T_LIFE.VIEW_SABANA SB
INNER JOIN t_life.puesto
ON SB.PUESTO=(select nombre_puesto from t_life.puesto where id_puestos='$puesto')
and sb.cds = (select nombre_lugar from t_life.lugar 
where id_lugar=(select id_lugar from lugar where nombre_lugar='$lugar' and lugar_superior is not null))");

oci_execute($jefe);
		
	
		 echo "<select name='jefe' id='jefe' required='required'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila10 = oci_fetch_array($jefe, OCI_BOTH))
		{
            echo "<option value='".$fila10[3]."'>".utf8_encode($fila10[2])."</option>";
        }
		
     
        echo "</select>";

			
		}



		
?>
		
		
		<script type="text/javascript">
	
	
			jQuery(document).ready(function(){
                jQuery('#lugar').change(function(){
                    var id=jQuery('#puesto').val();
					//var id2=jQuery('#lugar').val();
                    jQuery('#divjefe').load('jefe.php?puesto='+id+'&lugar='+id2);

                });    
            });
			
	
	
	</script>