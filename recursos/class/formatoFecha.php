<?php
/* Funcion que da formato a fechas, la convierte de ingles a español
	devuelve un formato similar a Martes 12 de Marzo 2013, 04:59 pm.
*/
function getFormatedDate($unformatedDate){
	//Da formato a la variable $unformatedDate con la zona horaria asignada
    $date = new DateTime($unformatedDate, new DateTimeZone('America/El_Salvador'));
	//Ordena la fecha de la siguiente manera nombre dia de la semana, dia de la semana, mes, año y hora
    $formatedDate = $date->format('l d \d\e F\ Y, h:i a');
	//Se crea un array con los nombres de los días en ingles
    $namesDaysEnglish = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    //Se crea un array con los nombres de los días en español
	$namesDaysSpanish = array('Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado', 'Domingo');
 
	//Se crea un array con los nombres de los meses en ingles
    $namesMonthsEnglish = array('January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December');
    //Se crea un array con los nombres de los meses en español
	$namesMonthsSpanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	//Se reemplazan los nombres de los días de ingles a español de la variable $formatedDate
    $formatedDate = str_replace($namesDaysEnglish, $namesDaysSpanish, $formatedDate);
    //Se reemplazan los nombres de los meses de ingles a español de la variable $formatedDate
	$formatedDate = str_replace($namesMonthsEnglish, $namesMonthsSpanish, $formatedDate);
	//Devuelve la fecha con el nuevo formato
    return $formatedDate;
}
/* Funcion que da formato a fechas, la convierte de ingles a español
   devuelve un formato similar a Jueves 14 de Marzo 2013
   sin hora, se utiliza en el broadcast 
*/
function getFormatedDateBroad($unformatedDate){
    $date = new DateTime($unformatedDate, new DateTimeZone('America/El_Salvador'));
    //Ordena la fecha de la siguiente manera nombre dia de la semana, dia de la semana, mes, año
	$formatedDateBroad = $date->format('l d \d\e F\ Y');
	//declara los nombres de los dias en ingles y en español
    $namesDaysEnglish = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $namesDaysSpanish = array('Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado', 'Domingo');
	//de igual manera se declara el nombre de los meses en ingles y español para su futuro reemplazo
    $namesMonthsEnglish = array('January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December');
    $namesMonthsSpanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	//reeemplazamos en la fecha cualquier nombre del dia en ingles, por el nombre del dia correspondiente 
	//en español en al linea de fecha que se mostrara al usuario, la linea siguiente hace lo mismo exactamente pero para
	//los meses del año
    $formatedDateBroad = str_replace($namesDaysEnglish, $namesDaysSpanish, $formatedDateBroad);
    $formatedDateBroad = str_replace($namesMonthsEnglish, $namesMonthsSpanish, $formatedDateBroad);
 //se devuelve la fecha que se ha formateado y termina la funcion
    return $formatedDateBroad;//se usa en broadcast, publicaciones y briefing devuelve un "Miercoles 20 de marzo del 2013" por ejemplo
}
/* Funcion que da formato a fechas, la convierte de ingles a español
   devuelve un formato similar a Octubre 2012
   sin día y hora. Se utiliza en los Kpi mensuales (Indicadores)
*/
function getFormatedDateKpi($unformatedDate){
    $date = new DateTime($unformatedDate, new DateTimeZone('America/El_Salvador'));
	//Ordena la fecha de la siguiente manera mes y año
	$formatedDateBroad = $date->format('F\ Y');
    
    $namesMonthsEnglish = array('January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December');
    $namesMonthsSpanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
    $formatedDateBroad = str_replace($namesDaysEnglish, $namesDaysSpanish, $formatedDateBroad);
    $formatedDateBroad = str_replace($namesMonthsEnglish, $namesMonthsSpanish, $formatedDateBroad);
 
    return $formatedDateBroad;
}
/* Funcion que da formato a fechas, la convierte de ingles a español
   devuelve un formato similar a  07 de Marzo
   sin año y hora. Se utiliza en los Kpi diarios (Indicadores)
*/
function getFormatedDateDiario($unformatedDate){
    $date = new DateTime($unformatedDate, new DateTimeZone('America/El_Salvador'));
	//Ordena la fecha de la siguiente manera dia y mes
    $formatedDateBroad = $date->format('d \d\e F');

    $namesMonthsEnglish = array('January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December');
    $namesMonthsSpanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
    $formatedDateBroad = str_replace($namesDaysEnglish, $namesDaysSpanish, $formatedDateBroad);
    $formatedDateBroad = str_replace($namesMonthsEnglish, $namesMonthsSpanish, $formatedDateBroad);
 
    return $formatedDateBroad;
}
function timestampspanish($unformatedDate){
	$dates=split(" ",$unformatedDate);
	$date=$dates[0];
	$hour=$dates[1];
	$separated=split("-", $date);
	$formatedDate=$hour." ".$separated[2]."-".$separated[1]."-".$separated[0];
	return $formatedDate;
}

function formatoPicker($formatoP){
	$fecha=split("-", $formatoP);
	$dia=$fecha[0];
	$mes=$fecha[1];
	$anio=$fecha[2];
	
	switch($mes){
		case "Ene":
			$mes2="01";
		break;
		case "Feb":
			$mes2="02";
		break;
		case "Mar":
			$mes2="03";
		break;
		case "Abr":
			$mes2="04";
		break;
		case "May":
			$mes2="05";
		break;
		case "Jun":
			$mes2="06";
		break;
		case "Jul":
			$mes2="07";
		break;
		case "Ago":
			$mes2="08";
		break;
		case "Sep":
			$mes2="09";
		break;
		case "Oct":
			$mes2="10";
		break;
		case "Nov":
			$mes2="11";
		break;
		case "Dic":
			$mes2="12";
		break;
	}
	$formatoFecha = $anio."-".$mes2."-".$dia;
	return $formatoFecha;	
}
?>