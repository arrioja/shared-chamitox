<?php 
/*   ****************************************************  INFO DEL ARCHIVO 
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Inscribir personas a la lista de distribucion de ChamitoX.
  		Modificado el: 	11/12/2008 por Pedro E. Arrioja M. - Creación
  			  Versión: 	0.1b
     ****************************************************  FIN DE INFO
*/
// $id=$_GET['id'];
 $email=$_POST['email'];
 $nombre=$_POST['nombre'];
 $apellido=$_POST['apellido'];
 include ("conexion.php");
 $link=conectarse("chamitox"); 
 mysql_query("BEGIN");  //inicio la transaccion
 $consulta=mysql_query("select * from suscriptores where email = '$email'")or die(mysql_error());
 
 if (mysql_num_rows($consulta) == 0) 
   {	 
	 if ($borra1=mysql_query("insert into suscriptores(email,nombres,apellidos) values ('$email','$nombre','$apellido')") or die(mysql_error())) 
	 {
	   mysql_query("COMMIT");  // para grabar los datos definitivamente y cerrar la transaccion
	   header ("Location: ../inscripciones.php", true); 
	 }
	  else
	 {
	   $msg_error=mysql_error(); // tengo que tomarlo antes porque despues que hago rollback el error desaparece
	   mysql_query("ROLLBACK"); 
	   echo $msg_error;	
	  };  
    }
  else
    {
	  echo "YA LA DIRECCION DE EMAIL SE ENCUENTRA REGISTRADA";
	}
?>
