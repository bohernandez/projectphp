<?php
	require_once('../../recursos/conexion/conexionOracle.class.php');
	require_once('../../recursos/class/perfil.class.php');
	$perf = new perfil();
?>


<select id="jefe" name="jefe" class="text ui-widget-content ui-corner-all">
	<option value=""> -Jefe Inmediato- </option>
	<?php $mun = $perf->select_jefe($_GET['lugar']);
	foreach($mun as $nums) { ?>
		<option value="<?php echo $nums['CODIGO_EMPLEADO']; ?>"><?php echo $nums['NOMBRE']; ?></option>
	<?php } ?>
</select>	
		
	<script type="text/javascript">
			jQuery(document).ready(function(){
                jQuery('#lugar').change(function(){
                    //var id=jQuery('#puesto').val();
					var id2=jQuery('#lugar').val();
                    jQuery('#divjefe').load('jefe.php?lugar='+id2);

                });    
            });
	</script>