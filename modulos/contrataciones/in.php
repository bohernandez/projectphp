<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />
 <!--este script es para que se ejecute el jquery de los select de departamento y mucicipio -->
 
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script>jQuery.noConflict();</script>
    <!--termina script -->
     <link rel="stylesheet" href="js/formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />
        <script src="js/mootools-1.2.5-core-yc.js" type="text/javascript"></script>
        <script src="js/mootools-1.2.5.1-more.js" type="text/javascript"></script>
        <script src="js/formcheck/lang/es.js" type="text/javascript"></script>
        <script src="js/formcheck/formcheck.js" type="text/javascript"></script>
        <script src="js/slideshow/Loop.js" type="text/javascript"></script>
        <script src="js/slideshow/SlideShow.js" type="text/javascript"></script>

<title>Contrataciones</title>
</head>

<style type="text/css" media="screen">
  div#contenedor {
    margin: 0 auto;
    width: 800px;
  }
  
  div#contenedor div {
    margin: 0 auto;
  }
  
  td{
		padding: 0 10px 0 10px;
  }
  
  .tituloc{
  /*font-size: 18px;*/
	margin: 0px;
	padding: 10px 0px;
	color: #ffff;
	font-weight: bold;
  }
  
  .paso {
	font-size: 24px;
	/*padding: 10px;*/
	color: #b0b1b3;
	font-family: Lucida Sans, Arial, Helvetica, Sans-Serif;
  }
  
  .paso span {
	font-size: 11px;
	display: block;
	}
	
	input
	{
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
		margin-top: 2%;
		margin-left: 2%;
		border: 1px solid #dfe9f6 !important;
	}
	
	textarea
	{
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
		border: 1px solid #dfe9f6 !important;
	}
	
	select
	{
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
		margin: 2%;
		border: 1px solid #dfe9f6 !important;

	}

	body
	{
		font-family: Vedrana,Arial,sans-serif; 
		font-size: 0.8em;
		color: #FFFFFF;
		
	}
	
	html {
			background: url(../../recursos/images/imagenes/Background.jpg) no-repeat center center fixed;
			background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			-o-background-size: cover;
	}
	
	.next
	{
		background-color: #b0232a;
		padding: 5px 10px;
		color: #fff;
		text-decoration: none;
	}
	
	.etiqueta
	{
		float:left; 
		width:25%;
	}
	
	fieldset
	{
		width: 500px;
		border-radius: 6px;
	}
</style>

<script>

	function distribu(a)
	{
		var b = document.getElementById('codemp');
		if(a)
		{
			b.setAttribute("class", "validate['required','alphanum']");
			b.setAttribute("onkeypress", "");
			b.value = 'Distribuidor';
			
		}
		else
		{
			b.setAttribute("class", "validate['required','digit']");
			b.setAttribute("onkeypress", "javascript:return validarNro(event)");
			b.value = '';
		}
	}
	  
	function validarNro(e) {
		var key;
		if(window.event) // IE
		{
			key = e.keyCode;
		}
		else if(e.which) // Netscape/Firefox/Opera
		{
			key = e.which;
		}

		if (key < 48 || key > 57)
		{
			if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
			{ return true; }
			else 
			{ return false; }
		}
		return true;
	}
</script>



<body>
<?php
$_SESSION['pase']="0m3g@";
?>



<?php
$codigo = $_GET['cod'];

$asterisk = '<span style="color: #c00; font-size: 150%;" >*</span>';
	?>
    
<div id='contenedor'>
    <div id='etapa_1'>
      <label style="margin: 0px;" class="paso" > Paso 1 <span>Informacion Personal</span></label>
      <form id='form_1' action='#' >
        <p>
		<input type="hidden" value="<?php echo $codigo; ?>" name="codigo"/>
        <table width="93%" border="0" align="center">
          <tr>
            <td colspan="2">Codigo Empleado<?php echo $asterisk; ?> 
              <!--<input type="text" id="codemp" class="validate['required','alphanum']" size="10" name="codigo_empleado"  maxlength="12" onkeypress="javascript:return validarNro(event)" onpaste="return false" />-->
			  <input type="text" id="codemp" class="validate['required','alphanum']" size="10" name="codigo_empleado"  maxlength="12" onkeypress="javascript:return validarNro(event)" />
			  <input type="checkbox" onClick="distribu(this.checked);" />Distribuidor
			</td>
			  
            <!--<td width="41%">&nbsp;</td>-->
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="59%">Nombre Completo<?php echo $asterisk; ?></td>
            <td>Telefono Casa</td>
          </tr>
          <tr>
            <td><input type="text" name="nombre" id="nombre" class="validate['required','alpha']" size="30" maxlength="50" /></td>
            <td><input type="text" name="telcasa" id="telcasa"  class="cajasretel" size="7" /></td>
          </tr>
          <tr>
            <td>Direccion<?php echo $asterisk; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><textarea style="width: 227px; height: 72px;" name="direccion" id="direccion" class="validate['required']" maxlength="90"></textarea></td>
            <td>Telefono Celular<?php echo $asterisk; ?><br />
              <input type="text" style=" margin-top:10px" name="telcel" id="telcel" class="cajasretel validate['required']" size="7"  />              <br /></td>
          </tr>
          <tr>
            <td>Departamento<?php echo $asterisk; ?>
            <select name='departamento' id='departamento'>
            	<option value=''> -Eliga un departamento- </option>
            	<option value='1'>Prueba</option>
            </select>
        
        </td>
            <td>Fecha Nacimiento<?php echo $asterisk; ?></td>
          </tr>
          <tr>
            <td>Municipio
              <div id="municipio" style="display:inline; margin:0px 0px 0px 0px;">
                <select name="municipio">
                  <option value="">Eliga un municipio</option>
                </select>
              </div></td>
            <td><input type="text" size="8" class="fecha validate['required']" name="fechanacimiento" /></td>
          </tr>
          <tr>
            <td>Sexo<?php echo $asterisk; ?>
              <input type="radio" name="genero" value="M" required="required"/>
              M &nbsp;
              <input type="radio" name="genero" value="F"/>
              F </td>
            <td>Hijos<?php echo $asterisk; ?></td>
          </tr>
          <tr>
            <td>Estado civil<?php echo $asterisk; ?>
            
         
	  		<select name='estadocivil' id='estadocivil' required='required'>
	  				<option value='' >Eliga una opcion</option>
	  				<option value='1'>Prueba</option>
	  		</select>
	   		</td>
            <td><input type="text" name="hijos" class="hijos validate['required']" size="1"/></td>
          </tr>
          <tr>
            <td>DUI<?php echo $asterisk; ?>
              <input type="text" name="dui" class="validate['required']" id="dui" size="8" /></td>
            <td>Talla Camisa</td>
          </tr>
          <tr>
            <td>NIT<?php echo $asterisk; ?>
              <input type="text" name="nit" id="nit" class="validate['required']" size="14"/></td>
        <td>
            <select name='tallacamisa' id='tallacamisa'>
            </select>

         </td>
          </tr>
        </table>
        <p>
        <center>
         <input type="button" value="Cancelar" onclick="regresar();" />&nbsp;&nbsp;
         <input type="submit" value="Continuar >" />
         </center>
        </p>
        <p>&nbsp;</p>
      </form>
    </div>
	
	
	
	<div id='etapa_2'>
      <form id='form_2' action='#' >
        <label class="paso">Paso 2 <span> Contactos y Estudios </span> </label><br /><br /><br />
		<br /><br /><br />
        <span class="tituloc">Contactos Emergencia</span>
        <table width="55%" border="0">
          <tr>
            <td width="27%">Nombre Familiar:</td>
            <td width="73%"><input type="text" name="nombre_familiar" size="30" maxlength="50"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Celular:</td>
            <td><input type="text" name="cel_emergencia" class="cajasretel" size="7" /></td>
          </tr>
        </table>
        <label for="telefono"><br />
          <br />
        </label>
        <br />
        <center>
        <input type="button" value="Cancelar" onclick="regresar();" />&nbsp;&nbsp;
        <input type="submit" value="Continuar >" />
        </center>
      </form>
      <a href="#" id="atras_2" style="color:#FFF; font-weight:bold;">&DownLeftVector; atrás</a>
  </div>
    <div id='etapa_3'>
      
	  
	  
<span class="paso">Paso 3  <span>Datos Laborales</span> </span>
      
      <form id='form_3' action='#'>
        <table width="83%" border="0" >
          <tr>
            <td colspan="2">Fecha de Ingreso<?php echo $asterisk; ?></td>
            <td colspan="3"><input type="text" size="8" class="fecha_ing validate['required']" name="fechaingreso" id="fechaingreso" readonly="readonly" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
		  
		  
            <!--
				<td width="14%">Codigo Vendedor:</td>
				<td width="13%"><input type="text" size="10" name="codigo_vendedor" maxlength="12" style="text-transform: uppercase;" /></td>
			-->
            <td width="16%">Correo Insititucional</td>
            <td colspan="2"><input type="text" size="25" name="correo" ize="30" maxlength="50" class="validate['email']"/></td>
            <td width="1%">&nbsp;</td>
            <td width="18%">&nbsp;</td>
          </tr>
		  
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td>Planilla<?php echo $asterisk; ?></td>
            <td colspan="2">
            <select name='planilla' id='planilla' required='required' >
            </select>
            </td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td width="37%">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
			<td colspan="6">
			<hr style="width:70%;" />
			</td>
		  </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="radio" name="opc" onclick="mostrar(this.id);" id="cds"  />CDS</td>
            <td><input type="radio" name="opc" onclick="mostrar(this.id);" id="cc" required="required"/>Contact Center</td>
			<td ><input type="radio" name="opc" onclick="mostrar(this.id);" id="mcds" required="required"/>MCDS</td>
            <td colspan='2'><input type="radio" name="opc" onclick="mostrar(this.id);" id="entrena" required="required"/>Entrenamiento</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="1%">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Puesto<?php echo $asterisk; ?></td>
            <td colspan="3"><div id="divp" style="display:inline; margin-left:0px" ></div></td>
            <td>&nbsp;</td>
            <td ></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Lugar<?php echo $asterisk; ?></td>
            <td colspan="3"><div id="divlugar" style="display:inline; margin-left:0px;" ></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Jefe<?php echo $asterisk; ?></td>
            <td colspan="3"><div id="divjefe" style="display:inline; margin-left:0px; padding-left:0px;" ></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><center>
        <input type="button" value="Cancelar" onclick="regresar();" />&nbsp;&nbsp;
          <input type="submit" value="Enviar" />
          </center>
        </p>
        
      </form>
      <a href="#" id="atras_3" style="color:#FFF; font-weight:bold;">&DownLeftVector; <font color="#FFFFFF">ATRAS</a>
    </div>
  </div>



<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script>
    jQuery.noConflict();
	</script>
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.css" />
<script>
    jQuery.noConflict();
	</script>
	<link rel="stylesheet" href="../../recursos/scripts/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.min.css" />
<script>
    jQuery.noConflict();
	</script>
	<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script><script>
    jQuery.noConflict();
	</script>
<script src="../../recursos/scripts/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
    jQuery.noConflict();
	</script>
<script src="../../recursos/scripts/jquery.maskedinput.js" type="text/javascript"></script>
<script>
    jQuery.noConflict();
	</script>


    

    
    
<script type="text/javascript">
	function regresar(){
		location.href='../../index.php';
	}

	  window.addEvent('domready', function(){
    var slideshow = new SlideShow('contenedor');

    new FormCheck('form_1', {
      submit: false,
      onValidateSuccess: function () {
        slideshow.show($('etapa_2'), {
          transition: 'pushLeft'
        });
      }
    });

    new FormCheck('form_2', {
      submit: false,
      onValidateSuccess: function () {
        slideshow.show($('etapa_3'), {
          transition: 'pushLeft'
        });
      }
    });
    new FormCheck('form_3', {
      submit: false,
      onValidateSuccess: function () {
        var datos = $('form_1').toQueryString() + '&' + $('form_2').toQueryString() + '&' + $('form_3').toQueryString();
        new Request({
          url: 'action/insertnuevos.php',
          data: datos,
          onSuccess: function (result) {
            //alert('Contratado!');
			alert(result);
			//location.href='../../index.php';
			//var id = document.getElementById('codemp').value;
			var id = result;
			//alert('Datos Almacenados!');
			location.href='../perfil/perfilmod_rrhh.php?cod='+id;
          }
        }).send();
      }
    });
    
    $('atras_2').addEvent('click', function(ev){
      ev.stop();
      slideshow.show($('etapa_1'), {
        transition: 'pushRight'
      });
    });
    $('atras_3').addEvent('click', function(ev){
      ev.stop();
      slideshow.show($('etapa_2'), {
        transition: 'pushRight'
      });
    });
  });
	
	//esta funcion es para el intercambio de los select de departamento y municipio
		
		jQuery(document).ready(function(){
                jQuery('#departamento').change(function(){
                    var id=jQuery('#departamento').val();
                    jQuery('#municipio').load('muni.php?id='+id);
                });    
            });
			
			
			jQuery(document).ready(function(){
                jQuery('#cds').change(function(){
                    var id=jQuery('#cds').val();
                    jQuery('#divp').load('puesto.php?id=1');
					//jQuery('#divlugar').load('lugar.php?id='+id);
                });    
            });
			
			
			//esta es la funcion que llevara el control de si estudia o no
			jQuery(document).ready(function(){
                jQuery('#statusac').change(function(){
                    var id=jQuery('#statusac').val();
                    jQuery('#dives').load('institucion.php?id='+id);
					//jQuery('#divlugar').load('lugar.php?id='+id);
                });    
            });
			
			
			
			jQuery(document).ready(function(){
                jQuery('#puesto').change(function(){
                    var id=jQuery('#puesto').val();

					jQuery('#divlugar').load('lugar.php?id='+id);
                });    
            });
			
			
		jQuery(document).ready(function(){
                jQuery('#cc').change(function(){
                    //var id=jQuery('#cds').val();
                    jQuery('#divp').load('puesto.php?id=2');
					jQuery('#divlugar').load('lugar.php?id=2');
                });    
            });
			
			
			jQuery(document).ready(function(){
                jQuery('#lugar').change(function(){
                    //var id=jQuery('#puesto').val();
					var id2=jQuery('#lugar').val();
                    jQuery('#divjefe').load('jefe.php?puesto='+id+'&lugar='+id2);

                });    
            });
			
		jQuery(document).ready(function(){
                jQuery('#mcds').change(function(){
                    //var id=jQuery('#cds').val();
                    jQuery('#divp').load('puesto.php?id=3');
					jQuery('#divlugar').load('lugar.php?id=3');
                });  
            });	
			
			
		jQuery(document).ready(function(){
                jQuery('#entrena').change(function(){
                    //var id=jQuery('#cds').val();
                    jQuery('#divp').load('puesto.php?id=4');
					jQuery('#divlugar').load('lugar.php?id=4');
                });    
            });
			
		//FUNCION PARA LA FECHA
			jQuery(function() {
				jQuery(".fecha").datepicker({ dateFormat: 'dd/mm/yy',
											changeMonth: true,
											changeYear: true,
											minDate: "-40Y", 
											maxDate: "-17Y"
											});
				jQuery(".fecha_ing").datepicker({ dateFormat: 'dd/mm/yy'});
				
		});
			jQuery(function() {
				jQuery("#dui").mask("999999999");
				jQuery("#nit").mask("99999999999999");
				jQuery.mask.definitions['j'] = "['',h]";
				jQuery(".cajasretel").mask("99999999");
				jQuery(".hijos").mask("9");
				
				//jQuery("input").css("border", "1px");
		});
		

	</script>


</body>
</html>
