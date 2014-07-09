<!DOCTYPE html>
<html>
<head>
<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Planilla CO</title>

<!--STYLESHEETS-->
<link href="../../recursos/estilo/modify.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="../../recursos/scripts/jquery-validation/lib/jquery.js"></script>
<script type="text/javascript" src="../../recursos/scripts/jquery-validation/dist/jquery.validate.js"></script>
<script>
		/*$.validator.setDefaults({
			submitHandler: function() { alert("submitted!"); }
		});*/
$().ready(function() {
		// validate signup form on keyup and submit
		$("#loginform").validate({
			rules: {
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
			},
			messages: {
				password: {
					required: "Por favor proporcione una contrase&ntilde;a",
					minlength: "Su contrase&ntilde;a debe tener almenos 6 caracteres"
				},
				confirm_password: {
					required: "Por favor proporcione una contrase&ntilde;a",
					minlength: "Su contrase&ntilde;a debe tener almenos 6 caracteres",
					equalTo: "Su contrase&ntilde;a no coincide"
				},
			},
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
<form id="loginform" name="loginform" class="loginform" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Modificar Contrase&ntilde;a</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Ingrese su nueva contrase&ntilde;a</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--PASSWORD--><input id="password" name="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
	<!--PASSWORD2--><input id="confirm_password" name="confirm_password" type="password" class="input password" value="contrasena" onfocus="this.value=''"/><!--END PASSWORD2-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Actualizar" class="button" /><!--END LOGIN BUTTON-->
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