<?php


function cuenta_visita($pagina)
{
include("db/conexion.php");
include("libs/utilidades.php");
$link=conectarse("chamitox");

	$visitas= 0;
	$soy_yo=false;
	$fecha=date("Y/m/d");
	
	 // este condicional existe para asegurarme de que mis propias visitas no se cuenten 
	  if (!((isset($_GET['yo'])) && ($_GET['yo'] == "SI")))
	   { 
		  $soy_yo=false;
		  $consulta_visitas=mysql_query("select * from visitas where ((fecha = '$fecha') and (pagina='$pagina'))",$link) or die(mysql_error());  
		  if (mysql_num_rows($consulta_visitas) > 0) 
			{
			  $result_visitas=mysql_fetch_array($consulta_visitas);
			  $visitas=$result_visitas['num_visitas']+1;
			}
		  else
			{
			  $visitas=1;	 
			}	  
		  
		  if (mysql_num_rows($consulta_visitas) > 0) 
			{ // se guarda en la base de datos.
			  $edita=mysql_query("update visitas set num_visitas='$visitas' where ((fecha = '$fecha') and (pagina='$pagina'))",$link) or die(mysql_error());
			}
		  else
			{ // si no trajo resultados, es la primera vez que ven esta tira, asi que se inserta el contador en la bd
			  $insertar_visita=mysql_query("insert into visitas(pagina,fecha,num_visitas) values ('$pagina','$fecha','1')",$link) or die(mysql_error());	 
			}
	   } 
	   else
	   {
		 $soy_yo=true; // se usa para saber si soy yo y asi muestro los emails o no.
	   }
	return 0;
}
?>
