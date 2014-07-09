<!DOCTYPE html>
<html>
<head>
<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIGO Life</title>

<!--STYLESHEETS-->
<link href="recursos/estilo/login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="recursos/images/icon.png" type="image/png" />

<!--SCRIPTS-->
<script type="text/javascript" src="recursos/scripts/jquery-ui/js/jquery-1.9.1.js"></script>

<!-- probando ui -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="index.php" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>CV Resume</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Sistema para la gestion de los Recursos Humanos</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" value="Username" onfocus="this.value=''" required /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="" onfocus="this.value=''" required /><!--END PASSWORD-->
	<span><a href="modulos/recuperacion/recovery.php">Olvidaste tu contrase&ntilde;a?</a></span>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
	<?php echo $var; ?>
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--<input type="submit" name="submit" value="Register" class="register" />--><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->
	
</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>