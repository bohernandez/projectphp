<?php
session_start();
require_once('../../recursos/conexion/conexionOracle.class.php');
/*modelos*/
require_once('../../recursos/class/perfil.class.php');
require_once('../login/modelo.php');


$cod=$_GET["cod"];
$perf = new perfil();
$fila = $perf->get_informacion_by_code($cod);

$municipio = $perf->get_municipio($fila['id_munic']);

$a = new acceso();
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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<!--termina script -->
     <script type="text/javascript" src="jquery-1.3.2.js"></script>
     
</head>

<body>
	<form action="act.php" method="post" id="enviarpefil">
	<div class="container">
  	<div class="sidebar1">
    	<p></p>
    	<p> 
		<div class="redondo">
			<img src="../../recursos/images/fotos/<?php echo $fila['codigo_empleado']; ?>.jpg" width="150" height="180" class="img2" />
		</div>
		</p>
    
	<p><label>Estado <?php if($fila['status']== "Activo") { ?><img src="../../recursos/images/perfil/Icono_Activo.png" /><?php }else{ ?><img src="../../recursos/images/perfil/Icono_Inactivo.png" /><?php } ?></label></p>
   </div>
    
    
  	<div class="content">
<ul id="navigation">
		<li class="imagen1"><a href="#" title="Inicio"><label class="menuname" style="float:left; margin-left:30%; color:#FFF; font-weight:bold; margin-top:12px;">Inicio</label></a></li>
		<li class="imagen2"><a href="#" onclick='contratacion("<?php echo $cod; ?>");' title="Perfil"><label class="menuname" style="float:left; margin-left:30%; color:#FFF; font-weight:bold;">Contrataciones</label></a></li>
		<li class="imagen7"><a href="#" title="Pendientes"><label class="menuname" style="float:left; margin-left:30%; color:#FFF; font-weight:bold;">Pendientes</label></a></li>
		<li class="imagen3"><a href="#" onclick='adimistracion("<?php echo $cod; ?>");' title="Administracion"><label class="menuname" style="float:left; margin-left:30%; color:#FFF;font-weight:bold;">Buscador</label></a></li>
		<li class="imagen4"><a href="#" target='_new' title="Work Group"><label class="menuname" style="float:left; margin-left:30%; color:#FFF;font-weight:bold;">Work<br />Group</label></a></li>
		<li class="imagen6"><a href="#" target='_new' title="Amonestaciones"><label class="menuname" style="float:left; margin-left:30%; color:#FFF; font-weight:bold;">Amones-<br />taciones</label></a></li>
		<li class="imagen7"><a href="#" onclick="salir();" title="Salir"><label class="menuname" style="float:left; margin-left:30%; color:#FFF; font-weight:bold;">Cerrar<br />Sesion</label></a></li>
</ul>


    <h3><?php echo $fila['nombre']; ?>
	<div class="edicion">
	
	<a href="http://www.google.com" class="clsVentanaIFrame" rel="Bievenido, Edicion datos personales">[Editar]</a>
	 
	 </h3>
	 
    <hr /><p>
    <img src="../../recursos/images/perfil/Icono_Celular.png" class="margenderecho" /> <label class="margenarriba"><?php echo $fila['tel_cel']; ?></label>
    &nbsp;
    <img src="../../recursos/images/perfil/Icono_Telefono.png" /> <label class="margenarriba"><?php echo $fila['tel_casa']; ?></label>
    &nbsp;
    <img src="../../recursos/images/perfil/Icono_Codigo.png" /> <label class="margenarriba"><?php echo $fila['codigo_empleado']; ?></label>
    </p>
    <p><img src="../../recursos/images/perfil/Icono_Direccion.png" /> <label class="margenarriba"><?php echo $fila['direccion']; ?></label> </p>
<p><label class="margenderecho2"><?php echo utf8_decode($municipio['name_depto'])." , ".utf8_decode($municipio['name_munic']); ?></label> </p>
    <p> <label class="margenderecho2"> Estado civil: <?php echo $fila['id_estadocivil']; ?></label>
    <label class="margenderecho2"> Hijos: <?php echo $fila['hijos']; ?></label></p>
    
    
<p>
    <img src="../../recursos/images/perfil/icono_estudios desactivo.png" width="23" height="29" /> <label class="margenderecho">Estado Academico</label>
    </p>
    <p>
    
	<img src="../../recursos/images/perfil/Icono_College.png" width="29" height="25"/> 
	<label class="margenderecho"></label>
    
    </p>    
    
    
    
    <p><table width="495" border="0"><tr><td width="53">
    <img src="../../recursos/images/perfil/Icono_Datos Laborales.png" width="39"  height="36"/></td><td width="428">
    <hr width="100%" /></td>
    </tr></table>
    </p>
    <p>
<table border="0" class="margentabla">
 	<ul class="margenlista">
 	<tr><td><li>Planilla: <label class="margenlista"></td><td><?php echo $fila['id_planilla']; ?></label></td></li></tr>
	<tr><td><li>Puesto: <label class="margenlista"></td><td><?php echo $fila['id_puesto']; ?></label></td></li></tr>
	<tr><td><li>Agencia: <label class="margenlista"></td><td><?php echo $fila['id_lugar']; ?></label></td></li></tr>
  	<tr><td><li>Jefe inmediato: <label class="margenlista"></td><td><?php echo $fila['jefe_inmediat0']; ?></label></td></li></tr>
  	
	
	


</ul>

</table>
 </p>  

<!--Comienza lo del fieldset para lo de datos personales -->
<br /> <!--Esto hay q arreglarlo para que se mediante css y no etiquetas br -->

<span id="destino">

<fieldset class="redondeado invisible" id="datos">
<legend align= "left"><input type="checkbox" id="datospersonales" name="datospersonales" onClick="mostrar(this.id);" class="invisible"/>Datos Personales</legend>
<div id="divdatospersonales">
<center>
<label>Direccion de Empleado:</label> </br>

	<textarea name="direccion" id="direccion"><?php echo $fila['direccion']; ?></textarea>
	</center>
	<br />
<br />
<input type="hidden" name="codigo" value="<?php echo $fila['codigo_empleado']; ?>" />

	
    <!-- end .content --></div>
  <!--<div class="footer">
    <p>Este .footer contiene la declaración position:relative; para dar a Internet Explorer 6 hasLayout para .footer y provocar que se borre correctamente. Si no es necesario proporcionar compatibilidad con IE6, puede quitarlo.</p>-->
    <!-- end .footer --><!--</div>-->
  <!-- end .container --></div>
  
  <script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.css" />
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.min.css" />
	<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
	<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
		<!--  script para la ventana modal-->
<script type="text/javascript" src="../../recursos/scripts/js/ext/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../../recursos/scripts/js/ventanas-modales.js"></script>	
	
	
<script type="text/javascript">
		
		function salir(){
			
		location.href="../login/logout.php";

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
		function mostrar(elemento)
		{
		document.getElementById("datos").style.display="block";
			//cambiaplan=document.getElementById(elemento).checked;
			//if(cambiaplan){
		document.getElementById("div"+elemento).style.display="block";//}
		
		//document.getElementById("act").style.display="block";
			//else{
				//document.getElementById("div"+elemento).style.display="none";}			
		}
		
		function cancelar()
		{
			document.getElementById("datos").style.display="none";
		}
		
		
		function activar(){
		document.getElementById("fechasal").disabled=false;
			document.getElementById("motivosal").disabled=false;
			
			document.getElementById("comentario").disabled=false;
		
		}
		
		function desactivar(){
		document.getElementById("fechasal").disabled=true;
			document.getElementById("motivosal").disabled=true;
			
			document.getElementById("comentario").disabled=true;
			
			document.getElementById("fechasal").value="";
			document.getElementById("motivosal").value="";
			document.getElementById("comentario").value="";
		
		}
		
		function revisar(){
	//alert("hola");
	//var a=document.getElementById("enviarpefil").value;
			var h=document.getElementById("enviarpefil");
			h.action="act.php";
			h.submit();
			}
			
			
			$(document).on("ready",function(){
				$("#ir").on("click", function(){
					$("html,body").animate({ scrollTop : $("#destino").offset().top  }, 1500 );
	});
});
		
		function adimistracion(i)
		{
			location.href="../busqueda/buscador.php?cod="+i;
		
		}
		
		//esta funcion es para el intercambio de los select de departamento y municipio
		$(document).ready(function(){
                $('#departamento').change(function(){
                    var id=$('#departamento').val();
                    $('#municipio').load('muni.php?id='+id);
                });    
            });
			
			/*function contratacion(i)
			{
				location.href="..contrataciones/nuevo/pasos/in.php?cod="+i;
			}*/
			
			function contratacion()
			{
				location.href="../contrataciones/in.php";
			}

		/*	La siguiente funcion es para manejar el menu de Tigo Life	*/
			$(function() {
				$('#navigation a').stop().animate({'marginLeft':'-100px'},1000);

				$('#navigation > li').hover(
							function () {
									$('a',$(this)).stop().animate({'marginLeft':'-2px'},500);
							},
							function () {
									$('a',$(this)).stop().animate({'marginLeft':'-100px'},500);
							}
				);
			});
	</script>
	</form>
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