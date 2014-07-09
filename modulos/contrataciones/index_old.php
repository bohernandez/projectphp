<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />

<script src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.5/mootools-yui-compressed.js"></script>

<script type="text/javascript" src="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/mootools-1.2.5.1-more.js"></script>

<script type="text/javascript" src="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/formcheck/lang/es.js"></script>

<script type="text/javascript" src="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/formcheck/formcheck.js"></script>

<script type="text/javascript" src="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/slideshow/Loop.js"></script>

<script type="text/javascript" src="http://www.sonicbyte.com/2011sonic/wp-content/demos/js/slideshow/SlideShow.js"></script>

<title>Documento sin título</title>
</head>

<style type="text/css" media="screen">
  div#contenedor {
    margin: 20px;
    height: 800px;
    width: 90%;
    overflow: hidden;
  }
  div#contenedor div {
    margin-left: 50px;
    margin-right: 50px;
    margin-top: 20px;
  }
  
  .tituloc{
  font-size: 18px;
	margin: 0px;
	padding: 10px 0px;
	color: #b0232a;
	font-weight: bold;
  }
</style>

<script>
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
          url: 'action/ajax_echo.php',
          data: datos,
          onSuccess: function (result) {
            alert(result);
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
</script>



<body>


<div id='contenedor'>
    <div id='etapa_1'>
      <label style="font-size: 18px;
	margin: 0px;
	padding: 10px 0px;
	color: #b0232a;
	font-weight: bold;" >Informacion Personal</label>
      <form id='form_1' action='#'>
        <p><!--
          <label for="nombre">
            Nombre<br />
            <input name="nombre" id="nombre" type="text" class="validate['required','alpha']" />
          </label>
          <br />
          <label for="apellidos">
            Apellidos<br />
            <input name="apellidos" id="apellidos" type="text" class="validate['required','alpha']" />
          </label>
          <br />
        </p>
        -->



        <table width="93%" border="0" align="center">
          <tr>
            <td>Codigo Empleado:
              <input type="text" size="10" name="codigo_empleado" class="validate['required','alpha']" maxlength="8"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="36%">Nombre Completo:</td>
            <td width="19%">Telefono Casa: </td>
            <td width="36%">&nbsp;</td>
            <td width="3%">&nbsp;</td>
            <td width="3%">&nbsp;</td>
            <td width="3%">&nbsp;</td>
          </tr>
          <tr>
            <td><input type="text" name="nombre" id="nombre" class="validate['required','alpha']" size="30" maxlength="50" /></td>
            <td><input type="text" name="telcasa" id="telcasa"  class="cajasretel" required="required" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Direccion</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><textarea style="width: 227px; height: 72px;" name="direccion" id="direccion" class="validate['required']" maxlength="60"></textarea></td>
            <td>Telefono Celular:<br />
              <input type="text" style=" margin-top:10px" name="telcel" id="telcel" class="cajasretel" required="required" /></td>
            <td><br /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Departamento:
              <?php
        
		/*
		$cons = conectarseOracle();
		$res=oci_parse($cons,"select * from DB_DEPARTAMENTO");

		$res2=oci_parse($cons,"select distinct(estado_civil) from sabana_cds
								where estado_civil is not null");
								
		$res3=oci_parse($cons,"select ID_TALLA, TALLA from T_LIFE.DB_TALLA_CAMISA
								where ID_TALLA<>0");
								
		$res4=oci_parse($cons,"SELECT * FROM T_LIFE.DB_STATUS_ACADEMICO 
								WHERE ID_STATUS <> 0");
								
		$res5=oci_parse($cons,"select * from T_LIFE.DB_INS_ESTUDIOS 
								where id_universidad <>0");
		
		$res6=oci_parse($cons,"select id_titulo,descripcion from T_LIFE.DB_TITULO_OBTENIDO 
								where id_titulo <>0 and id_titulo <5");
								
		$res7=oci_parse($cons,"select * from T_LIFE.PLANILLAS 
								where id_planilla  <>0");
								
								

		
		oci_execute($res);
		oci_execute($res2);
		oci_execute($res3);
		oci_execute($res4);
		oci_execute($res5);
		oci_execute($res6);
		oci_execute($res7);
		
		

        echo "<select name='departamento' id='departamento'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
        while ($fila = oci_fetch_array($res, OCI_BOTH)){
            echo "<option value='".$fila[0]."'>".utf8_encode($fila[1])."</option>";
        }
        echo "</select>";*/
        ?></td>
            <td>Fecha Nacimiento</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Municipio:
              <div id="municipio" style="display:inline;">
                <select name="municipio">
                  <option value="">Eliga un municipio</option>
                </select>
              </div></td>
            <td><input type="text" size="10" class="fecha" name="fechanacimiento"  required="required"/>
              <!--FECHA --></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>sexo:
              <input type="radio" name="genero" value="M" />
              M &nbsp;
              <input type="radio" name="genero" value="F"/>
              F </td>
            <td>Hijos </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Estado civil:
              <?php
	  
	   echo "<select name='estadocivil' id='estadocivil'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila2 = oci_fetch_array($res2, OCI_BOTH))
		{
            echo "<option value='".$fila2[0]."'>".utf8_encode($fila2[0])."</option>";
        }
		
     
        echo "</select>";
        ?></td>
            <td><input type="text" name="hijos" class="hijos validate['required']" required="required" size="2"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>DUI:
              <input type="text" name="dui" required="required" id="dui" /></td>
            <td>Talla Camisa</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>NIT:
              <input type="text" name="nit" id="nit" required="required"/></td>
            <td><?php
	  
	   echo "<select name='tallacamisa' id='tallacamisa'>";
		echo "<option value='' selectd='selected'>Eliga una opcion</option>";
		
		  while ($fila3 = oci_fetch_array($res3, OCI_BOTH))
		{
            echo "<option value='".$fila3[0]."'>".utf8_encode($fila3[1])."</option>";
        }
		
     
        echo "</select>";
        ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>
          <input type="submit" value="Continuar" />
        </p>
        <p>&nbsp;</p>
      </form>
    </div>
    <div id='etapa_2'>
      <h4>Paso 2</h4>
      <form id='form_2' action='#'>
        <label for="password">
          Contraseña<br />
          <input name="password" id="password" type="password" class="validate['required']" />
        </label>
        <br />
        <label for="rep_password">
          Repita Contraseña<br />
          <input name="rep_password" id="rep_password" type="password" class="validate['confirm:password']" />
        </label>
        <br />
        <label for="telefono">
          Teléfono<br />
          <input name="telefono" id="telefono" type="telefono" class="validate['required','phone']" />
        </label>
        <br />
        <input type="submit" value="Continuar" />
      </form>
      <a href="#" id="atras_2">&DownLeftVector; atrás</a>
    </div>
    <div id='etapa_3'>
      <h4>Paso 3 (final)</h4>
      <form id='form_3' action='#'>
        <label for="email">
          E-mail<br />
          <input name="email" id="email" type="text" class="validate['required','email']" />
        </label>
        <br />
        <label for="comentario">
          Comentario<br />
          <textarea id="comentario" name="comentario" cols="50" rows="15"></textarea>
        </label>
        <br />
        <input type="submit" value="Enviar" />
      </form>
      <a href="#" id="atras_3">&DownLeftVector; atrás</a>
    </div>
  </div>





<script type="text/javascript">
	
	function mostrar(i){
	
	//alert(""+i);
	if(i=="cds")
	{
	//alert(""+i);
	document.getElementById("div"+i).style.display="inline";
	document.getElementById("divcc").style.display="none";
	
	}else{
	document.getElementById("div"+i).style.display="inline";
	document.getElementById("divcds").style.display="none";
	}

	}
	
	//esta funcion es para el intercambio de los select de departamento y municipio
		
		$(document).ready(function(){
                $('#departamento').change(function(){
                    var id=$('#departamento').val();
                    $('#municipio').load('muni.php?id='+id);
                });    
            });
			
			
			$(document).ready(function(){
                $('#cds').change(function(){
                    var id=$('#cds').val();
                    $('#divp').load('puesto.php?id=1');
					//$('#divlugar').load('lugar.php?id='+id);
                });    
            });
			
			
			$(document).ready(function(){
                $('#puesto').change(function(){
                    var id=$('#puesto').val();

					$('#divlugar').load('lugar.php?id='+id);
                });    
            });
			
			
		$(document).ready(function(){
                $('#cc').change(function(){
                    //var id=$('#cds').val();
                    $('#divp').load('puesto.php?id=2');
					$('#divlugar').load('lugar.php?id=2');
                });    
            });
			
			
			$(document).ready(function(){
                $('#lugar').change(function(){
                    var id=$('#puesto').val();
					//var id2=$('#lugar').val();
                    $('#divjefe').load('jefe.php?puesto='+id+'&lugar='+id2);

                });    
            });
			
		
			
			//FUNCION PARA LA FECHA
			$(function() {
				$(".fecha").datepicker({ dateFormat: 'dd/mm/yy',
											changeMonth: true,
											changeYear: true,
											minDate: "-40Y", 
											maxDate: "-17Y"
											});
				$(".fecha_ing").datepicker({ dateFormat: 'dd/mm/yy'});
				
		});
		
		$(function() {
				$("#dui").mask("999999999");
				$("#nit").mask("9999999999999");
				$.mask.definitions['j'] = "['',h]";
				$(".cajasretel").mask("99999999");
				$(".hijos").mask("9");
				
				//$("input").css("border", "1px");
		});
		
		function ocultar(){
		document.getElementById("insestu").disabled=true;
		document.getElementById("titulo").disabled=true;
		
		}
		function mostrar()
		{
		document.getElementById("insestu").disabled=false;
		document.getElementById("false").disabled=false
		
		
		}
		
		
	</script>

</body>
</html>
