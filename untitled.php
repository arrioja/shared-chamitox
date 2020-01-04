<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<title>Tiras C&oacute;micas de ChamitoX</title>
<link href="css/cuerpos.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="49%"><img src="imgs/index_encabezado_izda.png" alt="izda" width="100%" height="165" /></td>
    <td width="2%"><img src="imgs/index_encabezado.png" alt="centro" width="900" height="165" border="0" usemap="#Map" /></td>
    <td width="49%"><img src="imgs/index_encabezado_dcha.png" alt="dcha" width="100%" height="165" /></td>
  </tr>
  <tr valign="top">
    <td><!-- InstanceBeginEditable name="izda" -->izda<!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" --><?php
include("db/conexion.php");
$link=conectarse("chamitox");
$visitas=0;
$soy_yo=false;
$fecha=date("Y/m/d");

 // este condicional existe para asegurarme de que mis propias visitas no se cuenten 
  if (!((isset($_GET['yo'])) && ($_GET['yo'] == "SI")))
   { 
	  $soy_yo=false;
	  
	  $consulta_visitas=mysql_query("select * from visitas where ((fecha = '$fecha') and (pagina='3'))",$link) or die(mysql_error());  
	  if (mysql_num_rows($consulta_visitas) > 0) 
		{
		  $result_visitas=mysql_fetch_array($consulta_visitas);
		  $visitas=$result_visitas['num_visitas']+1;
		  echo $visitas;
		}
	  else
		{
		  $visitas=1;	 
		}	  
	  
	  if (mysql_num_rows($consulta_visitas) > 0) 
		{ // se guarda en la base de datos.
		  echo $visitas;
		  $edita=mysql_query("update visitas set num_visitas='$visitas' where ((fecha = '$fecha') and (pagina='3'))",$link) or die(mysql_error());
		}
	  else
		{ // si no trajo resultados, es la primera vez que ven esta tira, asi que se inserta el contador en la bd
		  $insertar_visita=mysql_query("insert into visitas(pagina,fecha,num_visitas) values ('3','$fecha','1')",$link) or die(mysql_error());	 
		}
   } 
   else
   {
     $soy_yo=true; // se usa para saber si soy yo y asi muestro los emails o no.
   }

?><!-- InstanceEndEditable --></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="pie2" --><!-- InstanceEndEditable --></td></td>
  </tr>
</table>
<?php
	if ((isset($_GET['yo'])) && ($_GET['yo'] == "SI"))
	   {$adicional='?yo=SI';} else {$adicional='';}
	?>

<map name="Map" id="Map">
    <area shape="rect" coords="115,98,200,128" href="galeria.php<?php echo $adicional; ?>" alt="Tiras" />
    <area shape="rect" coords="13,100,95,126" href="index.php<?php echo $adicional; ?>" alt="Inicio" />
  <area shape="rect" coords="545,98,629,127" href="nosotros.php<?php echo $adicional; ?>" alt="Nosotros" />
<area shape="rect" coords="438,99,521,128" href="enlaces.php<?php echo $adicional; ?>" alt="Enlaces" />
<area shape="rect" coords="217,98,315,127" href="personajes.php<?php echo $adicional; ?>" alt="Personajes" />
<area shape="rect" coords="334,98,424,127" href="extras.php<?php echo $adicional; ?>" alt="Extras" />
<area shape="rect" coords="647,98,733,127" href="contactenos.php<?php echo $adicional; ?>" alt="Contactanos" />
</map></p>
<p>&nbsp; </p>
</body>
<!-- InstanceEnd --></html>
