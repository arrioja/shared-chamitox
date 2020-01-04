<?php
include("libs/contador.php");
cuenta_visita(5);
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
<style type="text/css">
<!--
.style2 {font-size: 9px}
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
    <td><!-- InstanceBeginEditable name="body2" -->
      <p align="justify" class="style1">Si te han gustado las tiras c&oacute;micas de ChamitoX, ahora puedes tenerlo m&aacute;s cerca y formar parte del ClanX; en esta secci&oacute;n encontrar&aacute;s wallpapers, artes, recuerdos y dem&aacute;s art&iacute;culos para ti, tus amigos y allegados.</p>
      <p align="center" class="style1"><a href="imgs/logos/logochamitox2048x846.png"><img src="imgs/logos/logochamitox0256x106.png" alt="Logo256" width="256" height="106" border="0" title="Logo ChamitoX Alta Resolución" /></a><br />
      </p>
      <p align="justify" class="style1">ChamitoX ya tiene grupo en FaceBook, hazte parte de nosotros y haz tus comentarios, publica tus FotoFan con tus art&iacute;culos de ChamitoX y comenta tus mejores chistes o sobre la vida y peripecias de los personajes. &iquest;ya perteneces al ClanX?.</p>
      <p align="center" class="style1"><a href="http://www.facebook.com/group.php?gid=49798715534"><img src="imgs/logos/logo_facebook.png" alt="Club en Facebook" width="223" height="82" border="0" longdesc="Club de ChamitoX en FaceBook" /></a><br />
        <br />
  Ya puedes adquirir cualquiera de las siguientes mercanc&iacute;as: (exclusividades, de excelente calidad, productos que casi nadie en el mundo tiene: (claro, como nadie lee la tira...!!! jajaja).</p>
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="46%" class="style1"><div align="center"><strong>Im&aacute;gen del Producto</strong></div></td>
          <td width="54%" class="style1"><div align="center"><strong>Descripci&oacute;n y Precios</strong></div></td>
        </tr>
        <tr>
          <td class="style1"><div align="center" class="style2"><img src="imgs/mercancia/Taza_ChamitoX_01_02_200px.png" alt="Taza" width="200" height="200" /><img src="imgs/mercancia/Taza_ChamitoX_01_01_200px.png" alt="Taza" width="200" height="193" /><br />
            La im&aacute;gen corresponde a una sola taza por ambos lados.</div></td>
          <td class="style1"><div align="justify">
            <p>Hermosa Taza (9,5cm de alto y 8 de di&aacute;metro) de ChamitoX con el Logo a FULL Color, ideal para tomar t&eacute; frio, aguita, o rompersela en la cabeza a ese ser querido que tanto te ha hecho sufrir. :-). <br />
              Si lo deseas, se puede hacer la taza con la tira c&oacute;mica que m&aacute;s te haya gustado o con el Logo, tan s&oacute;lo por &nbsp;&nbsp; <strong>Bs. 40,00.<br />
              </strong><br />
              Tambi&eacute;n hay dise&ntilde;os de tazas con
              la im&aacute;gen del personaje que desees y un mensaje personalizado que quieras ponerle, a <strong>Bs. 50,00.</strong> Hay una taza con la im&aacute;gen del Padre Zanganini que est&aacute; causando sensaci&oacute;n, uno de los mensajes m&aacute;s usado: &quot;Feliz Cumplea&ntilde;os, eres un Zanganini&quot;. ;-) </p>
            <p align="center"><a href="contactenos.php">Pregunte sin compromiso</a></p>
          </div></td>
        </tr>
      </table>
      <p align="justify" class="style1">&nbsp;</p>
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
