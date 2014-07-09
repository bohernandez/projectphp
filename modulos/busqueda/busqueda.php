<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="StyleSheet" href="../../recursos/estilo/estilo.css" type="text/css">
</head>

<body>


<?php
include("../../recursos/conexion/conexionOracle.class.php");
include("../../recursos/class/perfil.class.php");


//--------------BLOQUE DE VARIABLE A UTILIZAR ---------------------------
$q=$_POST['q']; //esta variable almacena la cadena que se va a buscar dentro de la BD
//$codigo2=$_POST['codigo2'];
//$cons=conexion(); // esta variable contiene la conexion a la BD

//---------------TERMINA BLOQUE DE VARIABLES A UTILIZAR ----------------
//$q = "6105";
//if ($q<>''){
	//$q = str_replace(" ", "", $q);
//$res=mysql_query("SELECT * FROM TABLA where CODIGO_EMPLEADO LIKE '%$q%' OR NOMBRE LIKE '%$q%' ORDER BY (CODIGO_EMPLEADO)",$cons);

$trozos=explode(" ",$q);//primero las divide por espacios
$numero=count($trozos);//cuenta el numero de palabras
//echo $numero;
//if ($numero!=1) {
   //echo $q;

$q = ucwords($q); 



//echo $q;
   /*$res1=oci_parse($cons,"select distinct(CODIGO_EMPLEADO), NOMBRE from COI.tmp_8_ago_sabana_cds where CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' " 
					);*/
					//}
/*else{
   //echo "va dos <br>";
   $res = mysql_query("SELECT * FROM desactivaciones WHERE MATCH(ejecutivo,sucursal) AGAINST ('$q') LIMIT 25",$cons);
   }*/
   
   
//$res1=oci_parse($cons,"select distinct(CODIGO_EMPLEADO), NOMBRE from COI.tmp_8_ago_sabana_cds where CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' " 
	//				);

   /*

   comentariado recientemente
$query("select CODIGO_EMPLEADO, NOMBRE, ID_LUGAR, CORREO, ID_SABANA from SABANA_CDS
   			where CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' order by nombre");

$res=oci_parse($cons,"select distinct(CODIGO_EMPLEADO), NOMBRE, CDS, CORREO,ZONA, ID_SABANA from T_LIFE.VIEW_SABANA
   where rownum<=15 and CODIGO_EMPLEADO like '$q%' or NOMBRE like '%$q%' order by nombre");
					
					
					
oci_execute($res);
*/



//$fila = oci_fetch_array($res, OCI_BOTH);

//echo "<br />".$fila['CDS'];

//echo oci_num_rows($res);




echo "<br /><center><img src='../../recursos/images/buscador/Icono-18.png' width='199px' height='21px' /></center>";

echo "<br/><table style='margin:0 auto;'>
		<tr>
		<td class='tddesactit'>Cod_empleado</td>
		<td class='tddesactit'>Nombre</td>
		<td class='tddesactit'>CDS</td>
		<td class='tddesactit'> Correo</td>
		<td class='tddesactit'> Zona</td>
		</tr>";
$perf= new perfil();
$res = $perf->busqueda_codigo_nombre($q);


foreach($res as $fila) {


echo "<tr>
	<td class='tddesactit'>
		".$fila['codigo_empleado']."
	</td>
	
	

<td class='tddesactit'>
		".utf8_decode($fila['nombre'])."
	</td>
	
	<td class='tddesactit'>
		".utf8_encode($fila['id_lugar'])."
	</td>
	
	<td class='tddesactit'>
		".$fila['correo']."
	</td>
	
	<td class='tddesactit'>
		".$fila['ZONA']."
	</td>
	
	<td class='tddesactit mouse'>
		 <img src ='../../recursos/images/buscador/Icono-19.png' onClick='editar(".$fila['id_sabana'].")' width='12' height='16' />		 
	</td>
</tr>

";

} //cierre del while
echo "</table>";

?>
<br />

<script type="text/javascript">

		function editar(i){
			//alert(i);
			location.href="../perfil/perfilmod_rrhh.php?cod="+i;
		}
		
		function cancelar(){
			
		location.href="buscador.php";

		}
		
		function ucWords(string){
 var arrayWords;
 var returnString = "";
 var len;
 arrayWords = string.split(" ");
 len = arrayWords.length;
 for(i=0;i < len ;i++){
  if(i != (len-1)){
   returnString = returnString+ucFirst(arrayWords[i])+" ";
  }
  else{
   returnString = returnString+ucFirst(arrayWords[i]);
  }
 }
 alert(""+ returnString);
}
function ucFirst(string){
 return string.substr(0,1).toUpperCase()+string.substr(1,string.length).toLowerCase();
}
	</script>

</body>
</html>