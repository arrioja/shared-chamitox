<?php
include("db/conexion.php");
include("libs/utilidades.php");
$link=conectarse("chamitox");
$max = 2; // dice de cual es el útimo comic disponible.
$visitas=0;
$soy_yo=false;

$fecha=date("Y/m/d");


if (isset($_POST['comentario']) && isset($_POST['nombre']) && isset($_POST['numcomic']))
  {
    if (($_POST['comentario']!='') && ($_POST['nombre']!='') && ($_POST['numcomic']!=''))
      {
        $insertar=mysql_query("insert into comentarios(cod_comic,nombre,mensaje,email) 
   							   values ('$_POST[numcomic]','$_POST[nombre]','$_POST[comentario]','$_POST[email]')",$link) or die(mysql_error());
	  }
   $start = $_POST['numcomic'];  
  }
else
  {
    $start = $_GET['num'];
  }

if ($start == NULL)
  {
	$start = $max;	// dice desde que numero se comienza a ver los comics.	
  }
  $consulta=mysql_query("select * from comentarios where cod_comic='$start' order by timestamp desc",$link) or die(mysql_error());
  // Para el Conteo de Visitas a la tira.
  $consulta_visitas=mysql_query("select * from visitas where ((fecha = '$fecha') and (cod_comic='$start'))",$link) or die(mysql_error());  
  if (mysql_num_rows($consulta_visitas) > 0) 
	{
	  $result_visitas=mysql_fetch_array($consulta_visitas);
	  $visitas=$result_visitas['num_visitas']+1;
	}
  else
	{
	  $visitas=1;	 
	}
  
 // este condicional existe para asegurarme de que mis propias visitas no se cuenten 
  if (!((isset($_GET['yo'])) && ($_GET['yo'] == "SI")))
   { 
	  $soy_yo=false;
	  if (mysql_num_rows($consulta_visitas) > 0) 
		{ // se guarda en la base de datos.
		  $edita=mysql_query("update visitas set num_visitas='$visitas' where ((fecha = '$fecha') and (cod_comic='$start'))",$link) or die(mysql_error());
		}
	  else
		{ // si no trajo resultados, es la primera vez que ven esta tira, asi que se inserta el contador en la bd
		  $insertar_visita=mysql_query("insert into visitas(cod_comic,fecha, num_visitas) values ('$start','$fecha','1')",$link) or die(mysql_error());	 
		}
   } 
   else
   {
     $soy_yo=true; // se usa para saber si soy yo y asi muestro los emails o no.
   }
 
//para sacar el total de las visitas
$consulta_total=mysql_query("select SUM(num_visitas) as total from visitas where (cod_comic='$start')",$link) or die(mysql_error());
$result_total=mysql_fetch_array($consulta_total); 
  
  $color=array("#FFFFFF","#CCFFFF"); // para darle colores alternos a las lineas que muestro
  $rojo="#FF0000";
  $contador_color=0; // este contador permitira darle la alternabilidad a los colores	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Los Comics de (ChamitoX)</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
body {
	background-color: #000000;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="49%"><img src="imgs/index_encabezado_izda.png" alt="izda" width="100%" height="165" /></td>
    <td width="2%"><img src="imgs/index_encabezado.png" alt="centro" width="900" height="165" border="0" usemap="#Map" /></td>
    <td width="49%"><img src="imgs/index_encabezado_dcha.png" alt="dcha" width="100%" height="165" /></td>
  </tr>
</table>
<map name="Map" id="Map">
  <area shape="rect" coords="115,98,200,128" href="galeria.php" alt="Tiras" />
<area shape="rect" coords="14,99,96,127" href="index.php" alt="Inicio" />
</map>
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">
      <a href="imgs/comicshq/comic_<?php echo $start?>.jpg"><img src="imgs/comics/comic_<?php echo $start?>.jpg" alt="Haga Click para verla en ALTA CALIDAD" width="800" height="270" border="0" /></a></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="150"><div align="center"> <?php
	if ($soy_yo == true) {$adicional='&yo=SI';} else {$adicional='';}
	if ($start != 1){
	  echo '<a href="galeria.php?num='.($start - 1).$adicional.'"><img src="imgs/anterior.png" alt="Pr&oacute;ximo" width="54" height="38" border="0" /></a>';		

		//echo "<a href=\"galeria.php?num=".($start - 1)."\"> Previo </a>";
		
	}
	?>
    </div></td>
    <td width="396"><div align="center"><strong>Comics de ChamitoX.com</strong> por <a href="mailto:pedroarrioja@gmail.com">Pedro E. Arrioja M. </a><br />
      (click en la tira para   alta calidad.) (Pr&oacute;xima tira: 15/10/2008)<br />
   Tira #<strong><?php echo $start." de ".$max;?></strong> / Visitas: Hoy:<strong><?php echo $visitas; ?></strong>, Total:<strong><?php echo $result_total['total']; ?></strong>.</div></td>
    <td width="150"><div align="center"><?php	
	if ($start < $max){	   
		//echo "<a href=\"galeria.php?num=".($start + 1)."\"> Pr&oacute;ximo </a>";
	echo '<a href="galeria.php?num='.($start + 1).$adicional.'"><img src="imgs/proximo.png" alt="Pr&oacute;ximo" width="54" height="38" border="0" /></a>';		
	}
	?>
        </div></td>
  </tr>
  <tr bgcolor="#000066">
    <td colspan="3"><div align="center" class="style1">COMENTARIOS DE LOS VISITANTES</div></td>
  </tr>
  <?php   

  
  while ($msg=mysql_fetch_array($consulta))
 {?>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td colspan="3"><div align="justify"><strong><br />
      <?php echo $msg['nombre']." </strong>(".date("d/m/Y",strtotime($msg['timestamp'])).' - '.date("h:i A",strtotime($msg['timestamp'])).")"; ?>  <?php if ($soy_yo == true) {echo '(email:'.$msg['email'].')';}?> :     <br />
        <?php echo $msg['mensaje']; ?><br /><br />

    </div>    </td>
  </tr>
<?php 
$contador_color++;
}?>
  
  <tr bgcolor="#000066">
    <td colspan="3"><div align="center" class="style1">--- ESCRIBA UN COMENTARIO ---</div></td>
  </tr>
  <tr bgcolor="#000066">
    <td colspan="3"><div align="justify" class="style2">Si coloca su e-mail (opcional) al momento de escribir su comentario, el sistema le enviar&aacute; un correo electr&oacute;nico cada vez que una nueva tira c&oacute;mica se encuentre disponible.</div></td>
  </tr><form id="form1" name="form1" method="post" action="galeria.php">
  <tr>
    <td bgcolor="#CCCCCC"><div align="right"><strong>Nombre:</strong></div></td>
    <td colspan="2"><span id="sprytextfield1">
      <label>
      <input name="nombre" type="text" id="nombre" size="60" maxlength="100" />
      </label>
      <span class="textfieldRequiredMsg">El nombre es requerido.</span></span>
      <input name="numcomic" type="hidden" id="numcomic" value="<?php echo $start; ?>" /></td>
   </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right"><strong> E-mail (Opcional):</strong></div></td>
    <td colspan="2"><span id="sprytextfield2">
      <label>
      <input name="email" type="text" id="email" size="60" maxlength="100" />
      <span class="textfieldInvalidFormatMsg">Formato no v&aacute;.</span>      </label>
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right"><strong>Comentario:</strong></div></td>
    <td colspan="2"><span id="sprytextarea1">
    <label>
    <textarea name="comentario" id="comentario" cols="60" rows="5"></textarea>
    <span id="countsprytextarea1">&nbsp;</span>        </label>
    <span class="textareaRequiredMsg">El Mensaje es Requerido.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
  </tr>
  <tr>
    <td height="26" colspan="3">
      <div align="right">
        <input type="submit" name="Enviar" id="Enviar" value="Enviar Comentario" />
      </div></td>
    </tr>
  <tr>
    <td height="26" colspan="3"><div align="center"><?php if ($soy_yo == true) {echo '<a href="estadisticas.php?yo=SI">Estad&iacute;sticas</a>';} ?></div></td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"], maxChars:1500, counterId:"countsprytextarea1"});
//-->
  </script>
</body>
</html>
