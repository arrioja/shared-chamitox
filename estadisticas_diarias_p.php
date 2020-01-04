<?php
  $cod_comic=$_POST['cc'];
  $total=$_POST['tot'];
  include("db/conexion.php");
  include("libs/utilidades.php");
  include("libs/mibarra/mibarra.php");
  $link=conectarse("chamitox");
   $consulta=mysql_query("SELECT visitas.fecha, SUM(visitas.num_visitas) AS total_visitas 
                                FROM visitas
						 WHERE (visitas.pagina = '$cod_comic')
						 GROUP BY visitas.fecha ORDER BY visitas.fecha DESC",$link) or die(mysql_error()); 
  $color=array("#FFFFFF","#CCFFFF"); // para darle colores alternos a las lineas que muestro
  $rojo="#FF0000";
  $contador_color=0; // este contador permitira darle la alternabilidad a los colores	

   $consulta_max=mysql_query("SELECT MAX(visitas.num_visitas) AS maximo_visitas 
                              FROM visitas
						      WHERE (visitas.pagina = '$cod_comic')",$link) or die(mysql_error()); 
   $result_max=mysql_fetch_array($consulta_max);

  
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Estad&iacute;sticas de Visitas chamitox.com</title>
<link href="css/formularios.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="encabezado_formularios">
    <td colspan="2">Estad&iacute;sticas  Diarias Para el la pagina Comic <?php echo $cod_comic;?></td>
  </tr>
  <tr class="encabezado_formularios">
    <td width="17%">Fecha</td>
    <td width="83%">Visitas</td>
  </tr>
 <?php    
   while ($estadistica=mysql_fetch_array($consulta))
 {?>
  <tr class="datos_formularios" bgcolor="<?php echo $color[$contador_color%2]; ?>">

    <td height="20" valign="middle"><div align="center"><?php echo cambiaf_a_normal($estadistica['fecha'])?></div></td>
    <td valign="middle"><div align="left">
      <?php 
// si se quiere que los graficos salgan en base al mayor de los valores del dia y no en base al total se usa la siguiente linea
	$por = round((($estadistica['total_visitas'] * 100) / $result_max['maximo_visitas'] ));
// si se quiere que los graficos salgan en base al total de ese dia, se usa la siguiente linea en vez de la anterior.
// 	$por = round((($estadistica['total_visitas'] * 100) / $total ));

// si se quiere que salgan los porcentajes, se usa la siguiente linea
// grafica_lineal($por,16,5); echo $por."% (".$estadistica['total_visitas'].")";
// si no se quiere que salgan los porcentajes, se usa la siguiente linea
   grafica_lineal($por,20,5); echo "(".$estadistica['total_visitas'].")";
     //echo $estadistica['total_visitas'];

?>
      
    </div></td>
  </tr>
 <?php $contador_color++; }?>
</table>
</body>
</html>
