<html>
<head>
   <title>Mis notas</title>
</head>
<body>
<H1>Sistema de notas de Fabian</H1>
<H2>Notas personales</H2>
<FORM ACTION="procesaNotas.php" METHOD="POST" accept-charset=utf-8>
<BR>Nueva nota
<INPUT TYPE="text" NAME="notaNueva">

<INPUT TYPE="submit" NAME="boton" VALUE="Enviar" ><BR>

<BR>Listar notas

<INPUT TYPE="submit" NAME="boton" VALUE="Ver"><BR>

<BR>Buscar nota por contenido:
<INPUT TYPE="text" NAME="palabro">
<INPUT TYPE="submit" NAME="boton" VALUE="Buscar"><BR>


<H2>Notas públicas</H2>

<BR>Nueva nota
<INPUT TYPE="text" NAME="notaNuevaGlobal">

<INPUT TYPE="submit" NAME="botonGlobal" VALUE="Enviar" ><BR>

<BR>Listar notas 

<INPUT TYPE="submit" NAME="botonGlobal" VALUE="Ver"><BR>

<BR>Buscar nota por contenido:
<INPUT TYPE="text" NAME="palabroGlobal">
<INPUT TYPE="submit" NAME="botonGlobal" VALUE="Buscar"><BR>
</FORM>
</body>
</html>
