<?php 
/*   ****************************************************  INFO DEL ARCHIVO 
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Inscribir personas a la lista de distribucion de ChamitoX.
  		Modificado el: 	11/12/2008 por Pedro E. Arrioja M. - Creación
  			  Versión: 	0.1b
     ****************************************************  FIN DE INFO
*/
// $id=$_GET['id'];
 $alea = rand(0,999999999);	
 $email=$_POST['email'];
 include ("conexion.php");
 $link=conectarse("chamitox"); 
 mysql_query("BEGIN");  //inicio la transaccion
 $consulta=mysql_query("select * from suscriptores where email = '$email'")or die(mysql_error());


  $additional_headers = "From:notificaciones@chamitox.com\n".
                        "Reply-To: notificaciones@chamitox.com";
 
  $email_to=$email;
  
  $subject = 'Procedimiento de Baja de ChamitoX.com';
  $message = "
**********   ChamitoX.com   ************
****************************************
La tira cómica del adulto contemporáneo.
****************************************

Reciba un saludo desde www.chamitox.com, si esta recibiendo este correo es
que ha solicitado ser dado de baja de nuestra lista de distribución de 
noticias, si es así, coloque el siguiente código en la página web y 
dejará de recibie notificaciones; si por el contrario Ud. no ha solicitado 
ser dado de baja de nuestros sistemas, simplemente ignore este mensaje.

Código: ".$alea."

Saludos.
Atte.
Pedro E. Arrioja M.
";?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<meta name="ChamitoX" content="chamitox, chamito, risas, diversion, comics, tiras, comicas." />
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
<link href="../css/cuerpos.css" rel="stylesheet" type="text/css" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<link href="../css/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2w {
	font-size: 14
}
.style1 {color: #FFFFFF}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="49%"><img src="../imgs/index_encabezado_izda.png" alt="izda" width="100%" height="165" /></td>
    <td width="2%"><img src="../imgs/index_encabezado.png" alt="centro" width="900" height="165" border="0" usemap="#Map" /></td>
    <td width="49%"><img src="../imgs/index_encabezado_dcha.png" alt="dcha" width="100%" height="165" /></td>
  </tr>
  <tr valign="top">
    <td><!-- InstanceBeginEditable name="izda" --><!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" -->
      <div align="center" class="vinculos">
        <div align="left"></div>
        <br />
        <br />
        <?php 
			 if (mysql_num_rows($consulta) > 0) 
			   { 
			   
			 	 if ( mail($email_to , $subject , $message, $additional_headers) ) {
					 echo "El mensaje de correo ha sido enviado";
			
				 } else {
					 echo "Ha fallado el envío del correo."; 
				 }; 
			  			   
				 if ($edita=mysql_query("update suscriptores set codidtemp='$alea' where email='$email'"))    
				 {
				   mysql_query("COMMIT");  // para grabar los datos definitivamente y cerrar la transaccion
                     ?>
                        <table width="100%" border="1" cellspacing="0" cellpadding="0">
                          <tr class="style2w">
                            <td width="44%"><img src="../imgs/logos/cara_chamitox.png" alt="cara" width="317" height="353" align="left" /></td>
                            <td width="56%"><div align="justify">
                              <p class="style1">Un correo electr&oacute;nico ha sido enviado a <?php echo $email; ?>, en &eacute;l se encuentra un c&oacute;digo num&eacute;rico, coloque el c&oacute;digo que se le ha suministrado en la siguiente casilla y presione el boton &quot;Confirmar&quot;.</p>
                              <form id="form1" name="form1" method="post" action="confirma_baja.php">
                                <label>
                                  <input name="codigo" type="text" id="codigo" maxlength="10" />
                                </label>
                                <label>
                                <input type="submit" name="Confirma" id="Confirma" value="Confirmar" />
                                </label>
                                <input name="correo" type="hidden" id="correo" value="<?php echo $email;?>" />
                              </form>
                              <p class="style1">&nbsp;</p>
                            </div>
                              <label>
                              <div align="center">
                                <div align="center">
                                  <input type="button" name="inicio" id="inicio" value="Ir al Inicio" onclick="javascript: location.href='../index.php'" />
                                    </div>
                            </label></td>
                          </tr>
                        </table>
<?php 
				 }
				  else
				 {
				   $msg_error=mysql_error(); // tengo que tomarlo antes porque despues que hago rollback el error desaparece	 
			?>	 
                        <table width="100%" border="1" cellspacing="0" cellpadding="0">
                          <tr class="style2w">
                            <td width="44%"><img src="../imgs/logos/cara_chamitox.png" alt="cara" width="317" height="353" align="left" /></td>
                            <td width="56%" background="../contactenos.php"><div align="justify">
                              <p class="style1">Ha ocurrido un error (<?php echo $msg_error; ?>) al momento de procesar su solicitud, por favor int&eacute;ntelo de nuevo m&aacute;s tarde y si contin&uacute;a teniendo problemas env&iacute;e un mensaje mediante la p&aacute;gina de cont&aacute;ctenos.</p>
                              <p align="right" class="style1">Gracias y hasta pronto. </p>
                            </div>
                              <label>
                              <div align="center">
                                <div align="center">
                                  <input type="button" name="inicio" id="inicio" value="Ir al Inicio" onclick="javascript: location.href='../index.php'" />
                              </div>
                            </label></td>
                          </tr>
                        </table>
				 <?php 
				  };  
				}
			  else
				{
			?>
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr class="style2w">
            <td width="44%"><img src="../imgs/logos/cara_chamitox.png" alt="cara" width="317" height="353" align="left" /></td>
            <td width="56%"><div align="justify">
              <p class="style1">La Dirección de E-mail suministrada no se encuentra registrada en nuestra pagina, pero tranquil@, no le pares, todos cometemos errores, quiz&aacute; la copiaste mal o quiz&aacute; en realidad no te quieres des-suscribir de nuestra p&aacute;gina. &nbsp;&nbsp;O tal vez... solo tal vez... todo sea parte de una conspiraci&oacute;n de malvadas empresas multinacionales cuyo &uacute;nico prop&oacute;sito sea mantenerte inscrit@ en esta pagina violando todos tus derechos y haciendote sentir impotente como un intento de doblegar tu voluntad para que te deprimas y sigas comprando esas hamburguesas que tanto te gustan, aumentes muchos kilos y luego tengas que hacerte una liposucci&oacute;n donde probablemente puedas morir en la operaci&oacute;n dejando a tu familia desamparada y asi cobrarte mucho mas dinero por gastos funerarios, abogados y negaciones de seguro de vida y as&iacute;  toda tu familia tenga que trabajar por tres generaciones para pagarles la deuda...</p>
              <p align="right" class="style1">...nunca lo sabremos. </p>
            </div>
              <label>
              <div align="center">
                <div align="center">
                  <input type="button" name="inicio" id="inicio" value="Ir al Inicio" onclick="javascript: location.href='../index.php'" />
                    </div>
            </label></td>
          </tr>
        </table>
		<?php 
			
			}
	  ?>
        <br />
        <br />
      <br />
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
<area shape="rect" coords="334,98,424,127" href="../extras.php<?php echo $adicional; ?>" alt="Extras" />
<area shape="rect" coords="647,98,733,127" href="../contactenos.php<?php echo $adicional; ?>" alt="Contactanos" />
</map></p>
<p>&nbsp; </p>
</body>
<!-- InstanceEnd --></html>
