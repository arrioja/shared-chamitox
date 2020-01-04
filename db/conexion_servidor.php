<?php 
/*   ****************************************************  INFO DEL ARCHIVO 
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Este archivo brinda soporte a cualquier php que necesite conexión a la base de datos, se
  						incluye una forma alternativa de conexión si se cuenta con claves diferentes para cada base de datos
						para mayor referencia ver la llamada a este archivo en script_login.php
  		Modificado el: 	22/08/2008 por Pedro E. Arrioja M.
  			  Versión: 	0.1b
     ****************************************************  FIN DE INFO

	 
*/
define("servidor","localhost");
define("usuario","chamito2_chamito");
define("contrasena","ncc1701");
function conectarse($base) 
{ 
   if (!($link=mysql_connect(servidor,usuario,contrasena))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
  
  if ($base == "chamitox")
  { $base="chamito2_chamitox";}
 
   if (!mysql_select_db($base,$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
};


?>
