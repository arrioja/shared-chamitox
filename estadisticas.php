<?php
  if ((isset($_GET['yo'])) && ($_GET['yo'] == "SI")) 
  { $soy_yo=true; }
  include("db/conexion.php");
  include("libs/utilidades.php");
  $link=conectarse("chamitox");
  $consulta=mysql_query("SELECT tiras.cod_comic, tiras.titulo, tiras.fecha_publicacion, SUM(visitas.num_visitas) AS total_visitas, 
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Estad&iacute;sticas de Visitas chamitox.com</title>
<link href="css/formularios.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
    <td colspan="3">Estad&iacute;sticas de visitas para p&aacute;ginas del sitio web de ChamitoX:</td>
  </tr>
  <tr class="encabezado_formularios">
    <td width="237"># Pagina</td>
    <td>Visitas</td>
    <td width="102">Detalle</td>
  </tr>
 <?php    
   while ($estadistica_paginas=mysql_fetch_array($consulta_paginas))
 {?>
  <tr class="datos_formularios" bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td><div align="center"><?php echo $estadistica_paginas['pagina']?></div>      <div align="center"></div></td>
    <td><div align="center"><?php echo $estadistica_paginas['total_visitas']?></div></td>
    <td><div align="center">
      <input type="button" name="volver" id="volver" value="Diario" onclick="cargar2('detalle_diario_2','<?php echo $estadistica_paginas['pagina']?>','<?php echo $estadistica_paginas['total_visitas']?>')" />
    </div></td>
  </tr>
 <?php $contador_color++; }?>

  <tr  class="datos_formularios"">
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr  class="datos_formularios"">
    <td colspan="3" valign="middle"><div id="detalle_diario_2" align="center">Para ver las Estad&iacute;sticas detalladas, haga click en el bot&oacute;n de Detalle Diario</div></td>
  </tr>
<?php   	
    if ($soy_yo == true) {$adicional='?yo=SI';} else {$adicional='';} ?>	
  <tr class="datos_formularios"">
    <td colspan="3"><div align="center"><a href="galeria.php<?php echo $adicional;?>">Galeria</a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="726" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="encabezado_formularios">
    <td colspan="6">Estad&iacute;sticas de visitas para tiras c&oacute;micas:</td>
  </tr>
  <tr class="encabezado_formularios">
    <td width="61"># Tira</td>
    <td width="82">Fecha</td>
    <td width="289">T&iacute;tulo</td>
    <td width="95">Visitas</td>
    <td width="111">Comentarios</td>
    <td width="74">Detalle</td>
  </tr>
  <?php    
   while ($estadistica=mysql_fetch_array($consulta))
 {?>
  <tr class="datos_formularios" bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td><div align="center"><?php echo $estadistica['cod_comic']?></div></td>
    <td><div align="center"><?php echo cambiaf_a_normal($estadistica['fecha_publicacion'])?></div></td>
    <td><?php echo $estadistica['titulo']?></td>
    <td><div align="center"><?php echo $estadistica['total_visitas']?></div></td>
    <td><div align="center"><?php echo $estadistica['total_comentarios']?></div></td>
    <td><div align="center">
      <input type="button" name="volver2" id="volver2" value="Diario" onclick="cargar('detalle_diario_1','<?php echo $estadistica['cod_comic']?>','<?php echo $estadistica['total_visitas']?>')" />
    </div></td>
  </tr>
  <?php $contador_color++; }?>
  <tr  class="datos_formularios"">
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr  class="datos_formularios"">
    <td colspan="6" valign="middle"><div id="detalle_diario_1" align="center">Para ver las Estad&iacute;sticas detalladas, haga click en el bot&oacute;n de Detalle Diario</div></td>
  </tr>
  <?php   	
    if ($soy_yo == true) {$adicional='?yo=SI';} else {$adicional='';} ?>
  <tr class="datos_formularios"">
    <td colspan="6"><div align="center"><a href="galeria.php<?php echo $adicional;?>">Galeria</a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
 
</body>
</html>
