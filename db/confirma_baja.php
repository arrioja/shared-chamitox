<?php 
/*   ****************************************************  INFO DEL ARCHIVO 
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  ejecuta la confirmación de baja de un correo de la lista de distribución.
  		Modificado el: 	11/12/2008 por Pedro E. Arrioja M. - Creación
  			  Versión: 	0.1b
     ****************************************************  FIN DE INFO
*/
 $codigo=$_POST['codigo'];
 $correo=$_POST['correo'];
 include ("conexion.php");
 $link=conectarse("chamitox"); 

?>


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
.style1 {color: #FFFFFF}
.style2w {	font-size: 14
}
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
    <td><!-- InstanceBeginEditable name="izda" --><!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" -->

<?php      
 
mysql_query("BEGIN");  //inicio la transaccion
if ($edita=mysql_query("update suscriptores set status='0' where ((email='$correo') and (codidtemp='$codigo'))"))    
 {
   mysql_query("COMMIT");  // para grabar los datos definitivamente y cerrar la transaccion
?>
      <div align="center">
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr class="style2w">
            <td width="44%"><img src="../imgs/logos/cara_chamitox.png" alt="cara" width="317" height="353" align="left" /></td>
            <td width="56%"><div align="justify">
                <p class="style1">Su solicitud de baja de la lista de distribuci&oacute;n de noticias de ChamitoX.com ha sido procesada satisfactoriamente.</p>
                <p align="right" class="style1">Gracias por ser parte de nosotros. </p>
            </div>
                <label>
                <div align="center">
                <div align="center">
                  <input type="button" name="inicio" id="inicio" value="Ir al Inicio" onclick="javascript: location.href='../index.php'" />
                </div>
              </label></td>
          </tr>
        </table>
      </div>



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
                <input type="button" name="inicio2" id="inicio2" value="Ir al Inicio" onclick="javascript: location.href='../index.php'" />
              </div>
            </label></td>
        </tr>
      </table>
   
   
<?php 
   
   mysql_query("ROLLBACK"); 

  };  
?>
    
      <br />
<br />

      
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
<area shape="rect" coords="334,98,424,127" href="../extras.php<?php echo $adicional; ?>" alt="Extras" />
<area shape="rect" coords="647,98,733,127" href="../contactenos.php<?php echo $adicional; ?>" alt="Contactanos" />
</map></p>
<p>&nbsp; </p>
</body>
<!-- InstanceEnd --></html>
