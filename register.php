<?php 
session_start();
                        $user=$_POST['userName'];
                        $sqlSelect="select * from users where name='$user'";
                        $resultadoSelect=mysql_query($sqlSelect,$enlace);

                        if(mysql_num_rows($resultadoSelect)==0){
                              $pass1=$_POST['passwd'];
                              $pass2=$_POST['passwd2'];
                              if(strcmp($pass1,$pass2)==0){
                                $_SESSION['user']=$user;
                                $_SESSION['passwd']=$pass1;
                                $sqlInsert="insert into users (name,password) values ('$user','$pass1')";
                                $resultadoInsert = mysql_query($sqlInsert,$enlace);
                                header("Location: gestorNotas.php");
                                }else{
				echo "repite contraseña";
				header("Location: registUser.php");
				}
				

                        }
                
?>
