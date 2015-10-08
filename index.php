<html>
<head>
   <title>Mis notas</title>
</head>
<body>
<?php 
	session_start();
	if($_SESSION['retry']){
		echo "Usuario o contraseña incorrectos";
	}	
?>
<FORM ACTION="loginUser.php" METHOD="POST" accept-charset=utf-8>
<BR>Usuario:<BR>
<INPUT TYPE="text" NAME="userName">
<BR>Contrasenya:<BR>
<INPUT TYPE="password" NAME="passwd">
<BR><INPUT TYPE="submit" NAME="boton" VALUE="submit"><BR>
Registrarse
<INPUT TYPE="submit" NAME="boton" VALUE="registry">
</FORM>
</body>
</html>
