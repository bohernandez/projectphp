<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
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
<br />

<div id="lookup">
	<input id="bus" name="bus" type="text" onkeyup='loadXMLDoc()' required />
</div>
<br /><br /><br /><br /><br /><br />

<div id="myDiv"></div>
<?php
	$cod=$_GET["cod"];
?>
<input type="hidden" name="codigo2" value="<?php echo $cod; ?>" />


<center>
<input class="boton" type="button" value="Cancelar" onclick="regresar('<?php echo $cod; ?>');" />
</center>

<script type="text/javascript">

	function editar(i){
			//alert(i);
			location.href="../perfil/perfilmod_rrhh.php?cod="+i;
		}
		function regresar(i){
			//alert(i);
			location.href="../perfil/perfil.php"; //esto hay q validarlo con las sesiones
		}
		
		
		
		function loadXMLDoc()
		{
			var xmlhttp;
			var n=document.getElementById('bus').value;
			//alert(n);
			if(n==''){
					document.getElementById("myDiv").innerHTML="";
					//document.getElementById("myDiv2").style.display ='block';
					return;
			}

			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{

				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
					//document.getElementById("myDiv2").style.display ='none';
				}	
			}
			xmlhttp.open("POST","busqueda.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("q="+n);
		}
		</script> 
    <!--
   <center>
   <img src="../../recursos/images/buscador/LogoTigo.png" width="109" height="85" />
   </center>-->
</body>
</html>