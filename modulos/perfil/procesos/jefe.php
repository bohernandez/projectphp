<?php
require_once('../../../recursos/conexion/conexionOracle.class.php');
require_once('../../../recursos/class/perfil.class.php');
$perf = new perfil();

?>


<select id="jefeinm" name="jefeinm" class="text ui-widget-content ui-corner-all">
	<option value=""> -Jefe Inmediato- </option>
		<?php $mun = $perf->select_jefe($_GET['id']);
		foreach($mun as $nums) { ?>
				<option value="<?php echo $nums['CODIGO_EMPLEADO']; ?>"><?php echo $nums['NOMBRE']; ?></option>
		<?php } ?>
</select>
			
			
