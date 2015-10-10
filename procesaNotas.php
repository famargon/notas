<html>
<head>
   <title>Mis notas</title>
</head>
<body>
	<?php
	session_start();
	$user=$_SESSION['user'];
	switch($_POST['boton']){
	
	case "Enviar":
	?>
		<H1>Lista de notas</H1>
	<?php
		if(!$enlace = mysql_connect('localhost','root','123456')){
	            echo 'No pudo conectarse a mysql';
        	    exit;
        	}
        	if (!mysql_select_db('notasDB', $enlace)) {
        	    echo 'No pudo seleccionar la base de datos';
        	    exit;
        	}		

        
		$sqlID='select MAX(id_notas) from notas';
		$resultadoID=mysql_query($sqlID,$enlace);
		if (!$resultadoID) {
		    echo "Error de BD, no se pudo consultar la base de datos\n";
		    echo "Error MySQL:   mysql_error()";
		    exit;
		}
			
		$row=mysql_fetch_row($resultadoID);
		$nuevoID=$row[0]+1;

		$nota=$_POST['notaNueva'];	
	
		$sqlInsert="insert into notas (id_notas,valor,user,public) values ('$nuevoID','$nota','$user',0)";
		$resultadoInsert = mysql_query($sqlInsert,$enlace);
	
		$sqlSelect="select * from notas where user='$user' and public=0 order by id_notas desc";
		$resultadoSelect=mysql_query($sqlSelect,$enlace);
		
		while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
			echo "$fila[1]<br>";
		}

 		mysql_free_result($resultadoSelect);
		mysql_free_result($resultadoID);
		
		break;
	
	case "Ver":
	?>
		<H1>Lista de notas</H1>
	<?php
		if(!$enlace = mysql_connect('localhost','root','123456')){
              	    echo 'No pudo conectarse a mysql';
        	    exit;
        	}
        	if (!mysql_select_db('notasDB', $enlace)) {
        	    echo 'No pudo seleccionar la base de datos';
        	    exit;
        	}
		
		$sqlSelect="select * from notas where user= '$user' and public=0 order by id_notas desc";
        	$resultadoSelect=mysql_query($sqlSelect,$enlace);

        	while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
                	echo "$fila[1]<br>";
        	}	

       		mysql_free_result($resultadoSelect);

		break;
	case "Buscar":

		if(!$enlace = mysql_connect('localhost','root','123456')){
                    echo 'No pudo conectarse a mysql';
                    exit;
                }
                if (!mysql_select_db('notasDB', $enlace)) {
                    echo 'No pudo seleccionar la base de datos';
                    exit;
                }
		
		$palabro=$_POST['palabro'];	
                $sqlSelect="select * from notas where user='$user' and public=0 and valor like '%$palabro%' order by id_notas desc";
                $resultadoSelect=mysql_query($sqlSelect,$enlace);
		
		if(mysql_num_rows($resultadoSelect)!=0){
		?>
		<H1>Notas encontradas</H1>
		<?php
		}else{
		?>
		<H1>No hay coincidencias</H1>
		<?php
		}		
		
                while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
                        echo "$fila[1]<br>";
                }

                mysql_free_result($resultadoSelect);

                break;

	
	}
	?>
<?php

	switch($_POST['botonGlobal']){
	
	case "Enviar":
	?>
		<H1>Lista de notas</H1>
	<?php
		if(!$enlace = mysql_connect('localhost','root','123456')){
	            echo 'No pudo conectarse a mysql';
        	    exit;
        	}
        	if (!mysql_select_db('notasDB', $enlace)) {
        	    echo 'No pudo seleccionar la base de datos';
        	    exit;
        	}		

        
		$sqlID='select MAX(id_notas) from notas';
		$resultadoID=mysql_query($sqlID,$enlace);
		if (!$resultadoID) {
		    echo "Error de BD, no se pudo consultar la base de datos\n";
		    echo "Error MySQL:   mysql_error()";
		    exit;
		}
			
		$row=mysql_fetch_row($resultadoID);
		$nuevoID=$row[0]+1;

		$nota=$_POST['notaNuevaGlobal'];	
	
		$sqlInsert="insert into notas (id_notas,valor,user,public) values ('$nuevoID','$nota','$user',1)";
		$resultadoInsert = mysql_query($sqlInsert,$enlace);
	
		$sqlSelect="select * from notas where public=1 order by id_notas desc";
		$resultadoSelect=mysql_query($sqlSelect,$enlace);
		echo "Usuario, Nota<br>";
		while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
			echo "$fila[2], $fila[1]<br>";
		}

 		mysql_free_result($resultadoSelect);
		mysql_free_result($resultadoID);
		
		break;
	
	case "Ver":
	?>
		<H1>Lista de notas</H1>
	<?php
		if(!$enlace = mysql_connect('localhost','root','123456')){
              	    echo 'No pudo conectarse a mysql';
        	    exit;
        	}
        	if (!mysql_select_db('notasDB', $enlace)) {
        	    echo 'No pudo seleccionar la base de datos';
        	    exit;
        	}
		
		$sqlSelect="select * from notas where public=1 order by id_notas desc";
        	$resultadoSelect=mysql_query($sqlSelect,$enlace);
		echo "Usuario, Nota<br>";
        	while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
                	echo "$fila[2], $fila[1]<br>";
        	}	

       		mysql_free_result($resultadoSelect);

		break;
	case "Buscar":

		if(!$enlace = mysql_connect('localhost','root','123456')){
                    echo 'No pudo conectarse a mysql';
                    exit;
                }
                if (!mysql_select_db('notasDB', $enlace)) {
                    echo 'No pudo seleccionar la base de datos';
                    exit;
                }
		
		$palabro=$_POST['palabroGlobal'];	
                $sqlSelect="select * from notas where public=1 and valor like '%$palabro%' order by id_notas desc";
                $resultadoSelect=mysql_query($sqlSelect,$enlace);
		
		if(mysql_num_rows($resultadoSelect)!=0){
		?>
		<H1>Notas encontradas</H1>
		<?php
		echo "Usuario, Nota<br>";
		}else{
		?>
		<H1>No hay coincidencias</H1>
		<?php
		}		
		
                while($fila=mysql_fetch_array($resultadoSelect,MYSQL_NUM)){
                        echo "$fila[2], $fila[1]<br>";
                }

                mysql_free_result($resultadoSelect);

                break;

	
	}
	?>

</body>
</html> 
