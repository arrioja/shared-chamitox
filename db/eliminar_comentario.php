<?php 
/*   ****************************************************  INFO DEL ARCHIVO 
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  elimina una comentario.
  		Modificado el: 	11/12/2008 por Pedro E. Arrioja M. - Creación
  			  Versión: 	0.1b
     ****************************************************  FIN DE INFO
*/
 $id=$_GET['id'];
 $com=$_GET['com'];
 include ("conexion.php");
 $link=conectarse("chamitox"); 
 mysql_query("BEGIN");  //inicio la transaccion
 
 if ($borra1=mysql_query("delete from comentarios where id='$id'") or die(mysql_error())) 
 {
   mysql_query("COMMIT");  // para grabar los datos definitivamente y cerrar la transaccion
   header ("Location: ../galeria.php?yo=SI&num=".$com, true); 
 }
  else
 {
   $msg_error=mysql_error(); // tengo que tomarlo antes porque despues que hago rollback el error desaparece
   mysql_query("ROLLBACK"); 
   echo $msg_error;	
  };  
?>
