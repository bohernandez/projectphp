<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador</title>
<link rel="StyleSheet" href="../../recursos/estilo/busqueda.css" type="text/css">
</head>

<body><!--
<div align="center">
<img src="../../recursos/images/buscador/Titulo.png" width="290" height="104" />
</div>-->

<div align="center">
<img src="../../recursos/images/buscador/Template-15.png" width="290" height="104" />
</div>
<div align="center" id='busc'>

</div>




<form id="searchbox" action="busqueda.php" method="post">
<div id='busc'>
<input id="search" name='q' type="text" placeholder="Type here">
    <input id="submit" type="submit" value="Search">
    
    

</div>

<script type="text/javascript">
$(document).ready(function() {           
	if (!Modernizr.input.placeholder)
	{		
		var placeholderText = $('#search').attr('placeholder');
		
		$('#search').attr('value',placeholderText);
		$('#search').addClass('placeholder');
		
		$('#search').focus(function() {				
			if( ($('#search').val() == placeholderText) )
			{
				$('#search').attr('value','');
				$('#search').removeClass('placeholder');
			}
		});
		
		$('#search').blur(function() {				
			if ( ($('#search').val() == placeholderText) || (($('#search').val() == '')) )                      
			{	
				$('#search').addClass('placeholder');					  
				$('#search').attr('value',placeholderText);
			}
		});
	}                
});



	</script>
	
	
</form>
<?php
$cod=$_POST["codigo"];
?>
<input type="hidden" name="codigo" value="<?php echo $cod; ?>" />
<center>
<input type="button" value="Cancelar" onclick="regresar(<?php echo $cod; ?>);" />
</center>

<script type="text/javascript">
		function regresar(i){
			//alert(i);
			location.href="../perfil/perfil_rrhh.php?cod=10808"; //esto hay q validarlo con las sesiones
		}
		
		</script>


    
    <!--
   <center>
   <img src="../../recursos/images/buscador/LogoTigo.png" width="109" height="85" />
   </center>-->
</body>
</html>