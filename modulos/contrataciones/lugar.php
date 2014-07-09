	<?php
	
	include("../../recursos/conexion/conexionOracle.php");
	$cons = conectarseOracle();
	$bandera=$_GET['id'];
	
	$training = array("60","61","62");

	if($bandera == "8")
	{
		$lugar=oci_parse($cons,"select nombre_lugar, id_lugar from lugar where nombre_lugar like '%MC%' order by id_niveles");
				
		oci_execute($lugar);
		
	
		 echo "<select name='lugar' id='lugar' required='required'>";
			echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		while ($fila8 = oci_fetch_array($lugar, OCI_BOTH))
		{
            echo "<option value='".utf8_encode($fila8['ID_LUGAR'])."'>".utf8_encode($fila8[0])."</option>";
        }
		
     
        echo "</select>";
	
	} else if (in_array ($bandera , $training))
	{
			echo "<select name='lugar' id='lugar' required='required'>";
			echo "<option value='' selectd='selected'>Eliga una opcion</option>";
			echo "<option value='93'>Entrenamiento</option>";
			echo "</select>";
	}
		else  if($bandera <12 || $bandera == "63"){
			$lugar=oci_parse($cons,"select distinct(vs.cds),  vs.ID_LUGAR
							from T_LIFE.VIEW_SABANA vs
							inner join T_LIFE.lugar b on vs.cds = B.NOMBRE_LUGAR
							where id_niveles = '1'");
		
			//vs.jefe_inmediado, vs.puesto,
			
			
			/*$lugar=oci_parse($cons,"select distinct(vs.cds), vs.jefe_inmediado, vs.puesto, vs.ID_LUGAR from T_LIFE.VIEW_SABANA vs
							inner join T_LIFE.puesto b
							on vs.puesto = (select nombre_puesto from t_life.puesto where id_puestos='$bandera')");
			*/
			//$lugar=oci_parse($cons,"select nombre_lugar, id_lugar from lugar where nombre_lugar like '%MC%'");
							
							
								
								
		
		oci_execute($lugar);
		
	
		 echo "<select name='lugar' id='lugar' required='required'>";
			echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		while ($fila8 = oci_fetch_array($lugar, OCI_BOTH))
		{
            echo "<option value='".utf8_encode($fila8['ID_LUGAR'])."'>".utf8_encode($fila8[0])."</option>";
        }
		
     
        echo "</select>";
	
	} else {
		
		$lugar=oci_parse($cons,"select distinct (cds),puesto, sb.ID_LUGAR from T_LIFE.VIEW_SABANA SB
								INNER JOIN t_life.puesto
								ON SB.PUESTO=(select nombre_puesto from t_life.puesto where id_puestos='$bandera')");
		
		//$lugar=oci_parse($cons,"select nombre_lugar, id_lugar from lugar where nombre_lugar like '%MC%'");					
								
		
		oci_execute($lugar);
		
	
		echo "<select name='lugar' id='lugar' required='required' >";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		while ($fila8 = oci_fetch_array($lugar, OCI_BOTH))
		{
            echo "<option value='".utf8_encode($fila8['ID_LUGAR'])."'>".utf8_encode($fila8[0])."</option>";
        }
		echo "</select>";
		
	}
	
	?>
				
		<script type="text/javascript">
		jQuery(document).ready(function(){
                jQuery('#lugar').change(function(){
                    var id=jQuery('#puesto').val();
					var id2=jQuery('#lugar').val();
                    jQuery('#divjefe').load('jefe.php?puesto='+id+'&lugar='+escape(id2));

                });    
            });
		</script>
	