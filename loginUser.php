<?php
		session_start();
                
		if(!$enlace = mysql_connect('localhost','root','123456')){
                    echo 'No pudo conectarse a mysql';
                    exit;
                }
                if (!mysql_select_db('notasDB', $enlace)) {
                    echo 'No pudo seleccionar la base de datos';
                    exit;
                }
		switch($_POST['boton']){
		case "submit":
                	$user=$_POST['userName'];
                	$_SESSION['user']=$user;
			$passwd=$_POST['passwd'];
			$_SESSION['passwd']=$passwd;
                	$sqlSelect="select * from users where name='$user' and  password='$passwd'";
                	$resultadoSelect=mysql_query($sqlSelect,$enlace);
	
	                if(mysql_num_rows($resultadoSelect)==0){
			        $_SESSION['retry']=True;	
				header("Location: index.php");
				
        	        }else{
        	                if(mysql_num_rows($resultadoSelect)==1){
        	                header("Location: gestorNotas.php");
        	                }
        	        }
			break;

		case "registry":
		header("Location: registUser.php");
		break;
		
		}
?>
