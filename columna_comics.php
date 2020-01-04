<?php 
  session_start();
  if (isset($_SESSION['nu']))
  {
    $ref = $_SESSION['nu'];
  }
  else
  {
    $ref = 6;
  }
 // para rellenar con ceros;
 if (isset($_POST['ope']))
 {
	 if ($_POST['ope'] == 'mas')
	   { 
	     if ($_SESSION['nu'] < $_SESSION['max'])
		  {
		    $_SESSION['nu'] = $_SESSION['nu']+1;
		    $ref++;
		  }
	   };
	 if ($_POST['ope'] == 'menos')
	   { 
	     if ($_SESSION['nu'] > 6)
		 {
		   $_SESSION['nu'] = $_SESSION['nu']-1;
		   $ref--;
	     }
	   };
 }
 if ($ref < 6) 
   {
     $ref = 6;
   };
  $num_sf=$ref;
for ($i=0; $i<=5; $i++)
{
  $arreglo_comics[$i] = $ref-$i; 
  switch (strlen($arreglo_comics[$i]))
  { case 1: $arreglo_comics[$i]='0000'.$arreglo_comics[$i];
            break;
    case 2: $arreglo_comics[$i]='000'.$arreglo_comics[$i];
            break;
    case 3: $arreglo_comics[$i]='00'.$arreglo_comics[$i];
            break;
    case 4: $arreglo_comics[$i]='0'.$arreglo_comics[$i];
            break;
  };  
};
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
.styleX10 {font-size: 14}
.styleX2 {color: #FFFFFF}
-->
</style>
<link href="css/cuerpos.css" rel="stylesheet" type="text/css" />
<link href="css/formularios.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.styleX11 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center" class="styleX2">
      <div align="center" class="styleX11">Ediciones anteriores</div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="styleX10">
    		  <a href="galeria.php?num=<?php echo $num_sf; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[0]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a><br />
              <a href="galeria.php?num=<?php echo $num_sf-1; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[1]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a><br />
              <a href="galeria.php?num=<?php echo $num_sf-2; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[2]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a><br />
              <a href="galeria.php?num=<?php echo $num_sf-3; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[3]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a><br />
              <a href="galeria.php?num=<?php echo $num_sf-4; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[4]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a><br />
              <a href="galeria.php?num=<?php echo $num_sf-5; ?>"><img src="imgs/previos/comic_<?php echo $arreglo_comics[5]; ?>.jpg" alt="" width="130" height="120" border="0" longdesc="" /></a></span></div></td>
  </tr>
</table>
</body>
</html>
