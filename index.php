<?php 
  include("libs/contador.php");
  cuenta_visita(1);

  //include("db/conexion.php");
  $Xlink=conectarse("chamitox");
  //para sacar el total de las visitas
  $Xconsulta_total=mysql_query("select SUM(num_visitas) as total from visitas",$Xlink) or die(mysql_error());
  $Xresult_total=mysql_fetch_array($Xconsulta_total); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->

<title>La Tira C&oacute;mica de ChamitoX</title>

<meta name="Comics, Risas y diversion, ChamitoX.Com" content="chamitox, chamito, risas, diversion, comics, tiras, comicas.">

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<link href="css/cuerpos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-size: 10px;
}
.style3 {font-size: 9px}
-->
</style>
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
    <td><!-- InstanceBeginEditable name="body2" --><br />
        <p align="justify" class="style1"><img src="imgs/logos/cara_chamitox.png" alt="cara" width="317" height="353" align="left" />Bienvenido a la p&aacute;gina web de ChamitoX, &eacute;sta p&aacute;gina web no pretende convertirse en un vicio m&aacute;s; por lo tanto, antes de ver las tiras c&oacute;micas que aqui se presentan responda concienzudamente las siguientes preguntas: &iquest;Fuma?, &iquest;Bebe?, &iquest;Va a muchas fiestas?, &iquest;ha tenido tantas relaciones sexuales que es imposible llevar la cuenta?, Si ha respondido que &quot;NO&quot; a  estas preguntas, permitame primero: &quot;JA, JA JA JA!&quot; reirme de Usted y luego recetarle que LEA INMEDIATAMENTE alguna de las tiras comicas de esta p&aacute;gina para que por lo menos sonr&iacute;a, porque si no lo hace muy probablemente termine suicida o peor a&uacute;n... quiz&aacute;s hasta cometa una locura y se case. uuuuuy, que miedo. :-((</p>
      <p align="right" class="style1">En fin, que la disfrutes y a los que han preguntado: SI, para ver las tiras haz click en <strong>&quot;tiras&quot;</strong>.</p>
      <p align="right" class="style1">Atte. Pedro E. Arrioja M.</p>
      <p align="justify" class="style2">Advertencia: Este sitio web no es apropiado para menores de edad; ya que podr&iacute;a contener material de car&aacute;cter sexual, lenguaje fuerte y quiz&aacute;s im&aacute;genes expl&iacute;citas de violencia.</p>
      <p align="justify" class="style2">YA NO DESEA RECIBIR NUESTROS E-MAILS?, dese de baja  <a href="bajas.php">AQUI</a>.</p>
      <!-- InstanceEndEditable --></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="pie2" -->
    <p align="center" class="style1">Wow!, &iquest;ya tengo <strong><?php echo $Xresult_total['total']; ?></strong> visitas?. o quiz&aacute;s ser&aacute; que... <br />
      POR EL AMOR DE DIOS, MAM&Aacute;AA!; HAY OTRAS P&Aacute;GINAS EN INTERNET !!!!! <br />
      <br />
      <span class="style3">ChamitoX.com Todos los Derechos Reservados (&copy;) 2008<br />
(y los izquierdos tambi&eacute;n)</span><br />
      <div align="center" class="style2"><?php 	if ((isset($_GET['yo'])) && ($_GET['yo'] == "SI"))
	    {echo '<a href="estadisticas.php?yo=SI">Estad&iacute;sticas</a>&nbsp;&nbsp;&nbsp;<a href="notificaciones.php?yo=SI">Notificaciones</a>&nbsp;&nbsp;&nbsp;<a href="inscripciones.php?yo=SI">Inscripciones</a>';} ?>
      </div>
    </p>
    <!-- InstanceEndEditable --></td></td>
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
