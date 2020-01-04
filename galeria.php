<?php
session_start();
include("db/conexion.php");
include("libs/utilidades.php");
$link=conectarse("chamitox");
$max = 12; // dice de cual es el �timo comic disponible.
$_SESSION['max']=$max;
$visitas=0;
$soy_yo=false;
$inicial = true; // para controlar que si la pagina se carga por primera vez se muestre la lista de comics sin apretar el boton.

$fecha=date("Y/m/d");

    if (isset($_POST['comentario']) && isset($_POST['nombre']) && isset($_POST['numcomic']))
      {
        if (isset($_POST['check']) && ($_POST['check'] == 'nueve'))
        {
            if (($_POST['comentario']!='') && ($_POST['nombre']!='') && ($_POST['numcomic']!=''))
              {
                $insertar=mysql_query("insert into comentarios(cod_comic,nombre,mensaje,email)
                                       values ('$_POST[numcomic]','$_POST[nombre]','$_POST[comentario]','$_POST[email]')",$link) or die(mysql_error());

                $consulta_mail=mysql_query("select * from suscriptores where email = '$_POST[email]'")or die(mysql_error());
                if (mysql_num_rows($consulta_mail) == 0)
                  {
                    $ingresa=mysql_query("insert into suscriptores(email,nombres) values ('$_POST[email]','$_POST[nombre]')") or die(mysql_error());
                  }


              }
        }
       $start = $_POST['numcomic'];
      }
    else
      {
        $start = $_GET['num'];
        if ($start >= 6)
          {
            $_SESSION['nu'] = $start; // para decir desde donde se inician los thumbnails de los comics
          }
      }


if ($start == NULL)
  {
	$start = $max;	// dice desde que numero se comienza a ver los comics.	
  }

   if (!(isset($_SESSION['nu']))) 
     {
       $_SESSION['nu'] = $start; // para decir desde donde se inician los thumbnails de los comics
     };
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
  
//  $color=array("#FFFFFF","#CCFFFF"); // para darle colores alternos a las lineas que muestro
  $color=array("#FFFFFF","#FFCC99"); 
  $rojo="#FF0000";
  $contador_color=0; // este contador permitira darle la alternabilidad a los colores	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/chamitox.dwt" codeOutsideHTMLIsLocked="false" -->
<head><!-- InstanceBeginEditable name="head2" -->
<meta name="Comics, Risas y diversion, ChamitoX.Com" content="chamitox, chamito, risas, diversion, comics, tiras, comicas.">
<title>La Tira C&oacute;mica de ChamitoX</title>
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
.style3 {color: #000000}
-->
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
 
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
<link href="css/cuerpos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 14px}
.style10 {font-size: 14}
.style11 {font-size: 14; color: #FFFFFF; }
-->
</style>


 <script language="JavaScript" type="text/javascript">
<!--

function carga(target, signo)
{
  var peticion;
  sig=signo;
  num = document.getElementById("num_list").value;
  var myConn = new XHConn();
  if (!myConn) alert("XMLHTTP no esta disponible. Int�ntalo con un navegador mas nuevo.");
  peticion=function(oXML){document.getElementById(target).innerHTML=oXML.responseText;};  
  myConn.connect("columna_comics.php", "POST", "nu="+num+"&ope="+sig, peticion);
};

function carga2(target, signo2)
{
  var peticion2;
  sig2=signo2;
  num2 = document.getElementById("num_list").value;
  var myConn = new XHConn();
  if (!myConn) alert("XMLHTTP no esta disponible. Int�ntalo con un navegador mas nuevo.");
  peticion2=function(oXML){document.getElementById(target).innerHTML=oXML.responseText;};  
  myConn2.connect("columna_comics.php", "POST", "nu="+num2+"&ope="+sig2, peticion2);
};

//-->
</script>
<script language="JavaScript" src="libs/XHConn.js" type="text/javascript"></script>



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
    <td><!-- InstanceBeginEditable name="izda" --><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center" class="style2">
            <div align="center">          
                <input name="num_list" type="hidden" id="num_list" value="<?php echo $_SESSION['nu']; ?>" />
                <form id="form2" name="form2" method="post" action="">
                  <input type="button" name="Xmas" id="Xmas" value="+" onclick="carga('lista_comics','mas');" />
                  <input type="button" name="Xmenos" id="Xmenos" value="-" onclick="carga('lista_comics','menos');" />
                                                </form>
                <form id="form3" name="form3" method="post" action="">
                </form>
              </div>
          </div></td>
        </tr>
        <tr>
         <?php 				
				if ($inicial == true) 
				  {
				    $inicial = false;
					?>
                     <script type="text/javascript">  
                    <!--
                       carga('lista_comics','nulo');
                    //-->
                    </script>   
					
	                <?php		
				  }		
            ?>
          <td><div align="center" id="lista_comics"><span class="style11"><strong>Otras de </strong><br />
            <br />
            Listado de Comics.<br />
            <br />
            <br />
          </span></div></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
    <td><!-- InstanceBeginEditable name="body2" -->
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">
      <a href="imgs/comicshq/comic_<?php echo $start?>.jpg"><img src="imgs/comics/comic_<?php echo $start?>.jpg" alt="Haga Click para verla en ALTA CALIDAD" width="800" height="270" border="0" /></a></td>
    </tr>
  <tr bgcolor="#FFCC99">
    <td width="150"><div align="center"><?php
	if ($soy_yo == true) {$adicional='&yo=SI';} else {$adicional='';}
	if ($start != 1){
	  echo '<a href="galeria.php?num='.($start - 1).$adicional.'"><img src="imgs/anterior.png" alt="Pr&oacute;ximo" width="165" height="61" border="0" /></a>';		

		//echo "<a href=\"galeria.php?num=".($start - 1)."\"> Previo </a>";
		
	}
	?>
      </div></td>
      <td width="396"><div align="center"><span class="style4"><strong>Comics de ChamitoX.com</strong> por <a href="contactenos.php">Pedro E. Arrioja M. </a><br />
        (click en la tira para   alta calidad.) (Pr&oacute;xima tira: 15/02/2010)<br />
        Tira #<strong><?php echo $start." de ".$max;?></strong> / Visitas: Hoy:<strong><?php echo $visitas; ?></strong>, Total:<strong><?php echo $result_total['total']; ?></strong>.</span></div></td>
      <td width="150"><div align="center"><?php	
	if ($start < $max){	   
		//echo "<a href=\"galeria.php?num=".($start + 1)."\"> Pr&oacute;ximo </a>";
	echo '<a href="galeria.php?num='.($start + 1).$adicional.'"><img src="imgs/proximo.png" alt="Pr&oacute;ximo" width="165" height="61" border="0" /></a>';		
	}
	?>
        </div></td>
    </tr>

  <tr bgcolor="#999999">
    <td colspan="3"><div align="center" class="style1 style3">COMENTARIOS DE LOS VISITANTES</div></td>
    </tr>
  <?php   

  
  while ($msg=mysql_fetch_array($consulta))
 {?>
  <tr bgcolor="<?php echo $color[$contador_color%2]; ?>">
    <td colspan="3"><div align="justify" class="style3"><strong><br />
      <?php echo $msg['nombre']." </strong>(".date("d/m/Y",strtotime($msg['timestamp'])).' - '.date("h:i A",strtotime($msg['timestamp'])).")"; ?>  <?php if ($soy_yo == true) {echo '(email:'.$msg['email'].')';?> <a href="db/eliminar_comentario.php?com=<?php echo $start; ?>&id=<?php echo $msg['id']; ?>">Eliminar</a><br /> <?php }?> :     <br />
      <?php echo $msg['mensaje']; ?>
      <br />
      
      </div>    </td>
    </tr>
  <?php 
$contador_color++;
}?>
  
  <tr bgcolor="#999999">
    <td colspan="3"><div align="center" class="style1 style3">--- ESCRIBA UN COMENTARIO ---</div></td>
    </tr>
  <tr bgcolor="#999999">
    <td colspan="3"><div align="justify" class="style2 style3">Si coloca su e-mail (opcional) al momento de escribir su comentario, el sistema le enviar&aacute; un correo electr&oacute;nico cada vez que una nueva tira c&oacute;mica se encuentre disponible. Es GRATIS!.</div></td>
    </tr><form id="form1" name="form1" method="post" action="galeria.php">
      <tr>
        <td bgcolor="#CCCCCC"><div align="right" class="style3"><strong>Nombre:</strong></div></td>
      <td colspan="2" bgcolor="#CCCCCC"><span id="sprytextfield1">
        <label>
          <input name="nombre" type="text" id="nombre" size="60" maxlength="100" />
          </label>
        <span class="textfieldRequiredMsg">El nombre es requerido.</span></span>
        <input name="numcomic" type="hidden" id="numcomic" value="<?php echo $start; ?>" /></td>
     </tr>
      <tr>
        <td bgcolor="#CCCCCC"><div align="right" class="style3"><strong> E-mail (Opcional):</strong></div></td>
      <td colspan="2" bgcolor="#CCCCCC"><span id="sprytextfield2">
        <label>
          <input name="email" type="text" id="email" size="60" maxlength="100" />
          <span class="textfieldInvalidFormatMsg">Formato no v&aacute;.</span>      </label>
        </span></td>
    </tr>
      <tr>
        <td bgcolor="#CCCCCC"><div align="right" class="style3"><strong>Comentario:</strong></div></td>
      <td colspan="2" bgcolor="#CCCCCC"><span id="sprytextarea1">
        <label>
          <textarea name="comentario" id="comentario" cols="60" rows="5"></textarea>
          <span id="countsprytextarea1">&nbsp;</span>        </label>
        <span class="textareaRequiredMsg">El Mensaje es Requerido.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
    </tr>
      <tr>
        <td bgcolor="#CCCCCC"><div align="right" class="style3"><strong> Cual es la raiz cuadrada de ochenta y uno (en letras y minusculas)?:</strong></div></td>
      <td colspan="2" bgcolor="#CCCCCC"><span id="sprytextfield2">
        <label>
          <input name="check" type="text" id="check" size="60" maxlength="100" />
     </label>
        </span></td>
    </tr>
      <tr bgcolor="#CCCCCC">
        <td height="26" colspan="3">
          <div align="right">
            <input type="submit" name="Enviar" id="Enviar" value="Enviar Comentario" />
            </div></td>
      </tr>
      <tr bgcolor="#333333">
        <td colspan="3"><div align="center"></div></td>
      </tr>
      <tr bgcolor="#333333">
        <td colspan="3"><div align="center"></div></td>
      </tr>
      <tr>
        <td height="26" colspan="3"></td>
    </tr>
      </form>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p><script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"], maxChars:1500, counterId:"countsprytextarea1"});
//-->
  </script>
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
