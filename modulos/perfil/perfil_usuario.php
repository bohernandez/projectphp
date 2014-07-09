<?php
session_start();
require_once('../../recursos/conexion/conexionOracle.class.php');
require_once('../../recursos/class/perfil.class.php');

//require_once('../amonestaciones/amonestacion.class.php');
require_once('../login/modelo.php');

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$cod=$_GET["cod"];

//$amon = new amonestar();
$a = new acceso();
$perf = new perfil();

$fila = $perf->get_informacion_by_code($cod);


$municipio = $perf->get_municipio($fila['id_munic']);

/*
$perfil = new perfil();
$amon = new amonestar();
$a = new acceso();
*/
if(isset($_SESSION['iduser']))
{
	if($a->verificar_user($_SESSION['nombre'] , $_SESSION['contras']) == true && ($_GET["cod"] = $_SESSION['iduser']))
	{

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Perfil de Usuario</title>
	<!-- TemplateEndEditable -->
	<!-- TemplateBeginEditable name="head" -->
	<!-- TemplateEndEditable -->
	<link href="../../recursos/estilo/twoColFixRtHdr.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../recursos/estilo/ventanas-modales.css">
	
	<!--este script es para que se ejecute el jquery de los select de departamento y mucicipio -->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>-->
	<!--termina script -->
		
	<style>
		#salida { font-size:60%; width: 350px; margin: 20px 0; }
		 img { margin: 0 5px 0 0; }
		 .ui-dialog .ui-state-error { padding: .3em; }
		 
		.with
		{
			margin:1%; 
			float:left; 
			/*width: 18%;*/
			width: 95px;
			height:auto; 
			border: 1px solid;
			border-radius: 8%;
			font-size: 65%; 
			background-color: rgba(80, 96, 186, 0.15); 
			text-align: center;
		}
		
		.with hr
		{
			width: 80%;
		}
		.with span
		{
			font-size: 130%; 
			padding: 10%;
		}
		
		
		
		.without
		{
			margin:1%; 
			opacity:0.6; 
			float:left;
			filter:alpha(opacity=60); 
			/*width: 18%; */
			width: 95px;
			height:auto; 
			border: 1px solid; 
			border-radius: 8%;
			font-size: 70%; 
			background-color: rgba(17, 18, 24, 0.14); 
			text-align: center
		}
		
		.without hr
		{
			width: 80%;
		}
		
		
		.refre
		{
			font-size:13px;
			font-family:Verdana,Helvetica;
			font-weight:bold;
			color:white;
			background:#41c800;
			border:0px;
			/*width:80px;*/
			/*height:19px;*/
			cursor: pointer;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			
		}
		
		.cancel
		{
			font-size:13px;
			font-family:Verdana,Helvetica;
			font-weight:bold;
			color:white;
			background:#DA3879;
			border:0px;
			/*width:80px;*/
			/*height:19px;*/
			cursor: pointer;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
		}
	</style>
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.css" />
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.min.css" />
	
	
	<script type="text/javascript" src="../../recursos/scripts/js/ext/jquery-1.7.2.min.js"></script>
	<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
	
	<!--  script para la ventana modal-->
	<script type="text/javascript" src="../../recursos/scripts/js/ventanas-modales.js"></script>
	
	<script>
				function calendario ()
				{
					$("#nacimiento").datepicker({ dateFormat: 'dd/mm/yy',
											changeMonth: true,
											changeYear: true,
											minDate: "-40Y",
											maxDate: "-17Y"
									});
				}
	</script>
</head>
<body>
<form action="#" method="post" id="enviarpefil">
<div class="container">

<input type="hidden" id="codigo_empleado" value="<?php echo $fila['codigo_empleado']; ?>">


<!--<button id="update">Actualizar</button>-->
  <div class="sidebar1">
    <p></p>
    <p><div class="redondo">
			<img src='../../recursos/images/fotos/<?php echo $fila["codigo_empleado"]; ?>.jpg' width="150" height="180" class="img2" />
		</div>
	</p>
    
	<p><label>Estado <?php if($fila['status']== "Activo") { ?><img src="../../recursos/images/perfil/Icono_Activo.png" /><?php }else{ ?><img src="../../recursos/images/perfil/Icono_Inactivo.png" /><?php } ?></label></p>
    
    <p align="left"><img src="../../recursos/images/perfil/Icono_Ingreso.png"  class="margenderecho2"/>  Ingreso: <?php echo $fila['fecha_ingreso']; ?></p>
    
	<?php
	if($fila['status'] == "Inactivo")
	{
	?>
		<p align="left">
			<img id="opener" title="Click aqui para ver motivo de Salida" src="../../recursos/images/perfil/Icono_Salida.png" class="margenderecho2" style="cursor: pointer;"/>
			<label>Salida: <?php echo $fila['fecha_salida']; ?></label>
		</p>
	<?php
	}
	?>
	
	<div class="datagrid">
	<table>
    <thead>
      <tr>
        <th colspan="2">Control</th>
      </tr>
    </thead>
	<tbody>
      <tr>
        <td>Amonestaciones:</td>
        <td>
			<?php 
			//$count = $perf->contar_amon($fila['ID_SABANA']);
			$count = 2;
			if ($count > 0) {
			?>
				<a href="../amonestaciones/Reportes/amonestar.print.ejecutivo.php" style="color: #00557F;" class="clsVentanaIFrame" rel="Amonestaciones">
						<?php echo $count; ?>
				</a>
			<?php 
				} else {
						echo $count;
				}
			?>
		</td>
      </tr>
      <tr class="alt">
        <td>Conocimiento:</td>
        <td>sr#3 / sr#2</td>
      </tr>
      <tr>
        <td>Desempe;o</td>
        <td>cuadrante gris</td>
      </tr>
    </tbody>
  </table>
	</div>
	

    </div><!-- end .sidebar1 -->
	
	
	<input type="hidden" id="sabana" name="sabana" value="<?php echo $fila['id_sabana']; ?>" />
	<input type="hidden" id="idsabana" name="idsabana" value="<?php echo $fila['id_sabana']; ?>" />
	<!-- Div de enmedio que contiene toda la informacion del empleado -->
	<div class="content">
	<div id="edicion1">
		<label style="float: right; font-size:115%;"><?php echo $fila['codigo_empleado']; ?></label><img style="float: right;" title="CODIGO EMPLEADO" src="../../recursos/images/perfil/Icono_Codigo.png" />
		<!--<h3><?php //echo $fila['NOMBRE']; ?></h3>-->
		
	<h3 style="letter-spacing:0.9px;"><?php echo utf8_decode($fila['nombre']); ?></h3>
	<div class="edicion">
		<label class="edicion2" onclick="salir();">[Cerrar Sesion]</label>
	</div>
		<div style="clear: both"></div>
		<hr />
		<a href="#" id="Editar1" style="float: right; font-size: 100%; text-decoration: none;" class="ui-state-default ui-corner-all">Editar</a>
		<p>
			<img src="../../recursos/images/perfil/Icono_dui.png" title="DUI" /><label><?php echo $fila['dui']; ?></label>
			&nbsp;
			<img src="../../recursos/images/perfil/Icono_nit.png" title="NIT" /><label><?php echo $fila['nit']; ?></label>
			&nbsp;
			<img src="../../recursos/images/perfil/Icono_Celular.png" title="CELULAR"/><label><?php echo $fila['tel_cel']; ?></label>
			&nbsp;
			<img src="../../recursos/images/perfil/Icono_Telefono.png" title="FIJO"/><label><?php echo $fila['tel_casa']; ?></label>
		</p>
		<p>
			<img src="../../recursos/images/perfil/Icono_Direccion.png" title="DIRECCION" /><label class="margenarriba"><?php echo $fila['direccion']; ?></label>
			<?php echo $municipio['name_depto'];?> , <?php echo $municipio['name_munic'];?>
		</p>
		<p>
			<label class="margenderecho2"> Estado civil: </label><label style="opacity:0.8; filter:alpha(opacity=80);"><?php echo $fila['id_estadocivil']; ?></label><label class="margenderecho2"> Hijos: <?php echo $fila['hijos']; ?></label>
		</p>
		<p>
			<label class="margenderecho2"> Edad: </label><label style="opacity:0.8; filter:alpha(opacity=80);"><?php echo $fila['fecha_nacimiento']; ?></label>
		</p>
		<p>
			<img src="../../recursos/images/perfil/icono_estudios desactivo.png" width="18" height="18" /><label class="margenderecho">Estado Academico</label><br />
			<img src="../../recursos/images/perfil/Icono_College.png" width="18" height="18"/> 
			<label class="margenderecho">N/A
			</label>
		</p>
	</div><!-- Fin Edicion1 -->
	
		<p>
			<table width="100%" border="0">
				<tr><td width="53"><img src="../../recursos/images/perfil/Icono_Datos Laborales.png" width="39"  height="36"/></td>
					<td width="428"><hr width="100%" />
						<!--<a href="#" id="Editar2" style="float: right; font-size: 100%; text-decoration: none;" class="ui-state-default ui-corner-all">Editar</a>-->
					</td>
				</tr>	
			</table>
		</p>
		
	<div id="edicion2" >
		<ul class="margenlista">
			<li style="width: 25%;float: left;"><label>Planilla:</label></li><label style="opacity:0.8; filter:alpha(opacity=80);"><?php echo $fila['id_planilla']; ?></label><br />
			<li style="width: 25%;float: left;"><label>Puesto: </label></li><label style="opacity:0.8; filter:alpha(opacity=80);"><?php echo $fila['id_puesto']; ?></label><br />
			<li style="width: 25%;float: left;"><label>Lugar: </label></li><label style="opacity:0.8; filter:alpha(opacity=80);" ><?php echo $fila['id_lugar']; ?></label><br />
			<li style="width: 25%;float: left;"><label>Jefe inmediato:</label></li><label style="opacity:0.8; filter:alpha(opacity=80);" ><?php echo $fila['jefe_inmediat0']; ?></label><br />
		</ul>
	</div><!-- Fin de Edicion 2	-->
	
	
	
	<p>
		<table width="100%" border="0">
			<tr><td width="53"><!--<img src="../../recursos/images/perfil/Icono_restring.png" width="39"  height="36"/>--></td>
				<td width="428">
				<hr width="100%" />
				<img src="../../recursos/images/perfil/email.gif" /><label style="opacity:0.8; filter:alpha(opacity=80);"><?php echo $fila['correo']; ?></label>
					<!--<a href="#" id="Editar3" style="float: right; font-size: 100%; text-decoration: none;" class="ui-state-default ui-corner-all">Editar</a>-->
				</td>
			</tr>	
		</table>
	</p>
	</form>
	
	<div style="clear: both"></div>

	<!--Comienza lo del fieldset para lo de datos personales -->
	<br /> <!--Esto hay q arreglarlo para que se mediante css y no etiquetas br -->
	<span id="destino"></span>
	<!-- end .content --></div>
	<!-- end .container --></div>
	
	
	
	<script>
	function salir(){
		location.href="../login/logout.php";

		}
		
		$(document).ready(function(){
			$("#Editar1").click(function(evento){
					//evento.preventDefault();
					var codigo = $("#sabana").val();
					var id = $("#sabana").val();
					$("#edicion1").load("procesos/mod_perfil.php #pegar", {cod: codigo, id_sabana: id}
											/*, function(){
											alert("recibidos los datos por ajax");
											}*/);
											
					});
			$("#Editar2").click(function(evento){
					//evento.preventDefault();
					var codigo = $("#codigo_empleado").val();
					var id = $("#sabana").val();
					$("#edicion2").load("procesos/mod_perfil.php #pegar2", {cod: codigo, id_sabana: id}/*, function(){
											alert("recibidos los datos por ajax");
											}*/);
			});
			
			$("#Editar3").click(function(evento){
					//evento.preventDefault();
					var codigo = $("#codigo_empleado").val();
					var id = $("#sabana").val();
					$("#edicion3").load("procesos/mod_perfil.php #pegar3", {cod: codigo, id_sabana: id}/*, function(){
											alert("recibidos los datos por ajax");
											}*/);
			});
					
		});	
		
		function cancel(a){
			location.href="perfil_usuario.php?cod="+a;
			/*alert("perfilmod_rrhh.php?cod="+a);*/
		}
		
		function update(a){
			var cod = $("#codg").val();
			var monb = $("#nomb").val();
			var dui = $("#dui").val();
			var nit = $("#nit").val();
			var cel = $("#cel").val();
			var fijo = $("#fijo").val();
			var mun = $("#municipio").val();
			var coment = $("#comments").val();
			var civil = $("#estcivil").val();
			var hijos = $("#hijos").val();
			var idsabana = $("#sabana").val();
			var nacimiento = $("#nacimiento").val();
			var correo = $("#email").val();

			var parametros = {
				"bloque": a,
                "codigo" : cod,
				"nombre" : monb,
				"dui": dui,
				"nit": nit,
				"cel": cel,
				"fijo": fijo,
				"municipio": mun,
				"coment": coment,
				"civil": civil,
				"hijos": hijos,
				"idsabana": idsabana,
				"nac": nacimiento,
				"correo": correo
			};
		
			$.ajax({
                data:  parametros,
                url:   'procesos/procesos.php',
                type:  'post',
                beforeSend: function () {
                        $("#panelsave").html("<img src='../../recursos/images/perfil/wait.gif' />");
                },
                success:  function (response) {
						$("#panelsave").html(response);
                }
			});
		}
		
		function update2(a){
			var cod = $("#codigo_empleado").val();
			var planilla = $("#planilla").val();
			var puesto = $("#puestos").val();
			var lugar = $("#lugar").val();
			var jefe = $("#jefeinm").val();
			var ptemp = $("#puestemp").val();
			var idsabana = $("#sabana").val();
			
			var parametros = {
				"bloque": a,
				"id_planilla": planilla,
                "id_puestos" : puesto,
				"id_lugar" : lugar,
				"jefe_inmediato": jefe,
				"idsabana": idsabana,
				"ptemp": ptemp,
				"codigo" : cod
				
			};
			$.ajax({
                data:  parametros,
                url:   'procesos/procesos.php',
                type:  'post',
                beforeSend: function () {
                        $("#panelsave2").html("<img src='../../recursos/images/perfil/wait.gif' />");
                },
                success:  function (response) {
						$("#panelsave2").html(response);
                }
			});
		}
	</script>
	
	<script type="text/javascript">
		
		$(function() {				
			$( "#salida" ).dialog({
				autoOpen: false,
				show: {
					effect: "blind",
					duration: 1000
				},
				hide: {
					effect: "explode",
					duration: 1000
				}
			});

			$( "#opener" ).click(function() {
					$( "#salida" ).dialog( "open" );
			});
		});
		
		
		function cancelar(){
			location.href="../busqueda/buscador.php";
		}
		
		function habilitar(i){
		if(document.getElementById(i).disabled== false)
		{
			document.getElementById(i).disabled=true;
		}else
		{
			document.getElementById(i).disabled=false;
		}
		}
		$(function() {
				$("#nacimiento").datepicker({ dateFormat: 'dd/mm/yy'	});
				
		});
		
		function mostrar(elemento)
		{
			cambiaplan=document.getElementById(elemento).checked;
			if(cambiaplan){
				document.getElementById("div"+elemento).style.display="block";}
			else{
				document.getElementById("div"+elemento).style.display="none";}	
		}
		
		function activar(){
			document.getElementById("fechasal").disabled=false;
			document.getElementById("motivosal").disabled=false;
			document.getElementById("comentario").disabled=false;
		}
		
		function desactivar(){
			/*document.getElementById("fechasal").disabled=true;
			document.getElementById("motivosal").disabled=true;
			document.getElementById("comentario").disabled=true;
			document.getElementById("fechasal").value="";
			document.getElementById("motivosal").value="";
			document.getElementById("comentario").value="";
			*/
		}
		
		function revisar()
		{
	//alert("hola");
	//var a=document.getElementById("enviarpefil").value;
			var h=document.getElementById("enviarpefil");
			h.action="../act_perfil/mod_rrhh.php";
			h.submit();
		}
			
			/*$(document).on("ready",function(){
	$("#ir").on("click", function(){
		$("html,body").animate({ scrollTop : $("#destino").offset().top  }, 1500 );
	});
});*/
		
		//esta funcion es para el intercambio de los select de departamento y municipio
		function deptomun(id)
		{
            $('#municipio').load('procesos/muni.php?id='+id);
		}
		
		//Esta funcion es para cargar al jefe en base al lugar
		function cargarjefe(id)
		{
			$('#jefeinm').load('procesos/jefe.php?id='+id);
		}
	</script>
</body>
</html>
<?php
	}
	else
	{
		echo "<script>";
		echo "alert('No tiene permiso para acceder');";
		echo "</script>";
	}
}


else
	{
		echo "<script>";
		echo "alert('Por favor inicie sesion');";
		echo "location.href='../../index.php'";
		echo "</script>";
	}
?>