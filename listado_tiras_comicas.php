<?php
  if ((isset($_GET['yo'])) && ($_GET['yo'] == "SI")) 
  { $soy_yo=true; }
  include("db/conexion.php");
  include("libs/utilidades.php");
  $link=conectarse("chamitox");
  $consulta=mysql_query("SELECT tiras.cod_comic, tiras.imagen, tiras.titulo, tiras.fecha_publicacion, SUM(visitas.num_visitas) AS total_visitas, 
                                com.total_comentarios FROM visitas, tiras
						 LEFT JOIN (
						            SELECT comentarios.cod_comic as cc2, COUNT(comentarios.id) AS total_comentarios 
									FROM comentarios
									GROUP BY cc2) as com 
						      ON tiras.cod_comic=com.cc2
						 WHERE (tiras.cod_comic = visitas.cod_comic)
						 GROUP BY tiras.cod_comic ORDER BY tiras.cod_comic DESC",$link) or die(mysql_error());
  $color=array("#FFFFFF","#CCFFFF"); // para darle colores alternos a las lineas que muestro
  $rojo="#FF0000";
  $contador_color=0; // este contador permitira darle la alternabilidad a los colores	
   
  $consulta_paginas=mysql_query("SELECT pagina, SUM(visitas.num_visitas) AS total_visitas 
                                 FROM visitas
						 		 GROUP BY pagina ORDER BY pagina",$link) or die(mysql_error());

  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->


<link href="css/formularios.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #000000;
}
.style1 {color: #000000}
.style5 {
	color: #000000;
	font-size: 14;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style10 {font-size: 14}
-->
</style><!-- InstanceEndEditable -->
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
    <td><!-- InstanceBeginEditable name="body2" -->
<script language="JavaScript" src="libs/XHConn.js"></script>
<SCRIPT language="JavaScript">
<!--
function cargar(target2,id2,tot2)
{
  var peticion2;
  document.getElementById(target2).innerHTML = 'Cargando Datos...';
  var myConn2 = new XHConn();
  if (!myConn2) alert("XMLHTTP no esta disponible. Inténtalo con un navegador mas nuevo.");
  peticion2=function(oXML){document.getElementById(target2).innerHTML=oXML.responseText;};
  myConn2.connect("estadisticas_diarias.php","POST","cc="+id2+"&tot="+tot2,peticion2);
}

function cargar2(target3,id3,tot3)
{
  var peticion3;
  document.getElementById(target3).innerHTML = 'Cargando Datos...';
  var myConn3 = new XHConn();
  if (!myConn3) alert("XMLHTTP no esta disponible. Inténtalo con un navegador mas nuevo.");
  peticion3=function(oXML){document.getElementById(target3).innerHTML=oXML.responseText;};
  myConn3.connect("estadisticas_diarias_p.php","POST","cc="+id3+"&tot="+tot3,peticion3);
}
//-->
</SCRIPT>
<table width="726" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="encabezado_formularios">
    <td colspan="2"><span class="style1">Listado de Tiras C&oacute;micas Disponibles</span></td>
  </tr>
  <tr class="encabezado_formularios">
    <td width="131">&nbsp;</td>
    <td width="589"><span class="style1">Informaci&oacute;n</span></td>
  </tr>
  <?php    
   while ($estadistica=mysql_fetch_array($consulta))
 {?>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td rowspan="4"><span class="style10"><img src="imgs/previos/<?php echo $estadistica['imagen']?>" alt="<?php echo $estadistica['titulo']?>" width="130" height="120" longdesc="<?php echo $estadistica['titulo']?>" /></span></td>
    <td class="style5"> &nbsp;Nro: <strong> <?php echo $estadistica['cod_comic']?></strong></td>
  </tr>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td class="style5">&nbsp;Fecha: <strong> <?php echo cambiaf_a_normal($estadistica['fecha_publicacion'])?></strong></td>
  </tr>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td class="style5">&nbsp;T&iacute;tulo: <strong>&quot;<?php echo $estadistica['titulo']?>&quot;</strong></td>
  </tr>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td class="style5">&nbsp;Visitas: <strong> <?php echo $estadistica['total_visitas']?></strong></td>
  </tr>
  <?php $contador_color++; }?>
  <tr  class="datos_formularios"">
    <td colspan="2">&nbsp;</td>
  </tr>

  <?php   	
    if ($soy_yo == true) {$adicional='?yo=SI';} else {$adicional='';} ?>
  <tr class="datos_formularios"">
    <td colspan="2"><div align="center"><a href="galeria.php<?php echo $adicional;?>">Galeria</a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
 
<!-- InstanceEndEditable --></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="pie2" -->.<!-- InstanceEndEditable --></td></td>
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
