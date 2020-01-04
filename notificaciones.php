<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<style type="text/css">
<!--
body {
	background-image: url();
	background-color:#000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFFFFF;
}
.form_backing {
	font-family: "Courier New", Courier, monospace;
	font-size: 11px;
	color: #FFFFFF;
	background-color: #666666;
}
.style1 {color: #FFFFFF}
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
    <td><!-- InstanceBeginEditable name="izda" --><!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" -->
<form id="form1" name="form1" method="post" action="libs/notificacion_script.php">
  <table width="631" border="10" align="center" cellpadding="3" cellspacing="0">
    <tr>
      <td width="100">Password</td>
      <td><input name="password" type="text" class="form_backing" id="password" size="40" /></td>
    </tr>
    <tr>
      <td width="100"><p class="style1">Texto Sugerido:</p>        </td>
      <td><p>
        <textarea name="mensaje" cols="80" rows="10" class="form_backing" id="mensaje">****************************************
**********   ChamitoX.com   ************
****************************************
La tira cómica del adulto contemporáneo.
****************************************

Reciba un cordial saludos de parte del equipo de trabajo de ChamitoX.com
(osea, yo); es con mucha alegría que le envio este e-mail para notificarle
que ya se encuentra disponible una nueva tira cómica en ChamitoX.com.

Para ver la tira nueva, simplemente visite la siguiente dirección:
http://www.chamitox.com/galeria.php

Para visitar el sitio de ChamitoX:
http://www.chamitox.com

Para ver desde la primera tira cómica:
http://www.chamitox.com/galeria.php?num=1

Saludos.
Atte.
Pedro E. Arrioja M.

******************************
Este es un mensaje automático de parte de ChamitoX.com, no responda a este
mensaje, ya que los correos enviados a este buzón no son revisados.
Si no desea seguir recibiendo notificaciones desde nuestra página, por
favor ingrese en www.chamitox.com y haya click en el link correspondiente
a la opci&oacute;n "darse de baja".</textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="send_mail" id="send_mail" value="Enviar Notificaci&oacute;n" />
      </div></td>
      </tr>
  </table>
</form>
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
