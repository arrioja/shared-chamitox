<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<meta name="ChamitoX" content="chamitox, chamito, risas, diversion, comics, tiras, comicas.">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Tiras C&oacute;micas de ChamitoX</title>

<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/formularios.css" rel="stylesheet" type="text/css" />
<link href="css/cuerpos.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
      <div align="center" class="vinculos">
        <form id="form1" name="form1" method="post" action="db/inscribir.php">
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><div align="center">Inscripci&oacute;n a la  pagina de ChamitoX.</div></td>
          </tr>
          <tr>
            <td><div align="right">Nombre:</div></td>
            <td><span id="sprytextfield2">
              <label>
              <input name="nombre" type="text" id="nombre" size="50" />
              </label>
              </span></td>
          </tr>
          <tr>
            <td><div align="right">Apellido:</div></td>
            <td><span id="sprytextfield3">
              <label>
              <input name="apellido" type="text" id="apellido" size="50" />
              </label>
              </span></td>
          </tr>
          <tr>
            <td width="19%"><div align="right">E-mail:</div></td>
            <td width="81%"><span id="sprytextfield1">
            <label>
            <input name="email" type="text" id="email" size="70" />
            </label>
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Suscribir" id="Suscribir" value="Suscribir E-mail" />
            </label></td>
          </tr>
        </table>
        
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    <!-- InstanceEndEditable --></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="pie2" -->.
      <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
//-->
</script>
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
