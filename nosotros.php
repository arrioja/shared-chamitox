<?php
include("libs/contador.php");
cuenta_visita(6);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<title>Tiras C&oacute;micas de ChamitoX</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
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
    <td><!-- InstanceBeginEditable name="body2" -->
      <div align="justify">
        <p class="style1"><img src="imgs/foto_nosotros.jpg" alt="yo" width="499" height="425" align="left" />Bueeeeno, cuando me refiero a nosotros, quiero principalmente decir mi esposa mi hijo y yo,  y el hecho de que en este momento me este apuntando con un arma de fuego no quiere decir de ninguna manera que me encuentre bajo coacci&oacute;n alguna para colocar este comentario acerca de mi muy amable, cari&ntilde;osa, nada violenta y sobre todo complaciente esposa. ;-).</p>
        <p class="style1">Ahora bien, cumplidos todos los requisitos legales, cuaim&iacute;sticos y perturbantemente jalabol&iacute;ticos, es hora de hablar un poco de mi; mi Nombre: Pedro E. Arrioja M., pero pueden llamarme Pedro o si lo prefieren (solo chicas), papito lindo; soy Venezolano, Pa' que no quepa duda Carupanero!., vivo en la Isla de Margarita, Estado Nueva Esparta, soy Ingeniero de Sistemas, casado con una mujer maravillosa (volvi&oacute;), y con un precioso hijito; me encaaaaaanta programar en casi cualquier cosa, y adoro jugar ajedrez;  he decidido ocupar un poco de mi tiempo libre a realizar una peque&ntilde;a y nada pretenciosa tira c&oacute;mica para animar un poco al mundo; as&iacute; que (sin contar el software libre que he creado), he decidido dar otro peque&ntilde;o y modesto aporte; espero que disfruten esta tira c&oacute;mica tanto como yo disfruto haci&eacute;ndola. Si desean colaborar con el mantenimiento de este sitio web, lo pueden hacer via paypal o adquiriendo cualquiera de los productos promocionados. Los ni&ntilde;os pobres del padre Zanganini se lo agradecer&aacute;n.</p>
        <p align="right" class="style1">Atte.<br />
        Pedro E. Arrioja M.</p>
      </div>
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
