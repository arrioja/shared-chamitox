
<?php 
// set up some basic configuration
$email_to = 'pedroarrioja@gmail.com';
$subject = 'Comentario desde ChamitoX.com';
// receive variables from mail_form.html
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email_address = $_POST['email_address'];
if ($email_address == NULL){
	$dont_send = true;
} else {
 	$dont_send = false;
}

$inquiry = $_POST['inquiry'];
$interest= $_POST['interest'];

$message = "Nombre:      " . $firstname . "\n";
$message .= "Apellido:      " . $lastname . "\n";
$message .= "Email:      " . $email_address . "\n\n";
$message .= "Comentario:      " . $inquiry . "\n";
$message .= "Me Parecio:      " . $interest . "\n";

?>

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
.style1 {color: #FFFFFF}
-->
</style><!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="49%"><img src="../imgs/index_encabezado_izda.png" alt="izda" width="100%" height="165" /></td>
    <td width="2%"><img src="../imgs/index_encabezado.png" alt="centro" width="900" height="165" border="0" usemap="#Map" /></td>
    <td width="49%"><img src="../imgs/index_encabezado_dcha.png" alt="dcha" width="100%" height="165" /></td>
  </tr>
  <tr valign="top">
    <td><!-- InstanceBeginEditable name="izda" -->izda<!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" -->
    <span class="style1">
<!--  the following line is optional-->
<br />
<br />
<?php 
if ($dont_send == false){

	if ( mail($email_to , $subject , $message ) ) {
		echo "Gracias por enviarnos sus comentarios; tan pronto como sea posible leeré su mensaje. Gracias!. Pedro. ";

	} else {
		echo "Ha Fallado el Envío."; 

	}


} else {
	echo "Por Favor, coloque su dirección de correo electrónico" ;

}
?>
    </span><!-- InstanceEndEditable --></td>
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
<area shape="rect" coords="334,98,424,127" href="../extras.php<?php echo $adicional; ?>" alt="Extras" />
<area shape="rect" coords="647,98,733,127" href="../contactenos.php<?php echo $adicional; ?>" alt="Contactanos" />
</map></p>
<p>&nbsp; </p>
</body>
<!-- InstanceEnd --></html>
