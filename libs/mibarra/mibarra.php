<?php 
     # Funciones para generar graficas de barra horizontales

 function grafica_colorida($porcentaje,$alto,$ancho)
{
// esta barra cambia su color dependiendo del porcentaje en que se encuentre, hay 5 colores posibles.
  for ($num=1; $num <=$porcentaje; $num++)
	{
	  switch (true)
	   {
		 case ($num<=20):
						echo '<img src="imgs/rojo.png" width="'.$ancho.'" height="'.$alto.'" border="0">';
						break;
		 case (($num>20) && ($num<=40)):
						echo '<img src="imgs/naranja.png" width="'.$ancho.'" height="'.$alto.'" border="0">';
						break;
		 case (($num>40) && ($num<=60)):
						echo '<img src="imgs/amarillo.png" width="'.$ancho.'" height="'.$alto.'" border="0">';
						break;
		 case (($num>60) && ($num<=80)):
						echo '<img src="imgs/verde.png" width="'.$ancho.'" height="'.$alto.'" border="0">';
						break;
		 case ($num>80):
						echo '<img src="imgs/azul.png" width="'.$ancho.'" height="'.$alto.'" border="0">';
						break;					
	  } // del switch
	} // del for
  return 0;
} 


// En este tipo de barra, se selecciona primero el color que se desea mostrar y luego se  ensambla la barra completa.
 function grafica_lineal($porcentaje,$alto,$ancho)
{
   switch (true)
	  {
		case ($porcentaje<=20):
						$barra = '<img src="imgs/rojo.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
						break;
		case (($porcentaje>20) && ($porcentaje<=40)):
						$barra = '<img src="imgs/naranja.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
						break;
		case (($porcentaje>40) && ($porcentaje<=60)):
						$barra = '<img src="imgs/amarillo.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
						break;
		case (($porcentaje>60) && ($porcentaje<=80)):
						$barra = '<img src="imgs/verde.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
						break;
		case ($porcentaje>80):
						$barra = '<img src="imgs/azul.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
						break;					
	  } // del switch
//	 for ($num=1; $num <=$porcentaje; $num++)
//	{
	  echo $barra;
//	} // del for
  return 0;
}
 

function grafica_color($color,$porcentaje,$alto,$ancho)
{ 
 // En este tipo de barra, se ensambla la barra del color que quiera el usuario.
  switch ($color)
    {
      case 1:$barra = '<img src="imgs/rojo.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
	 		 break;
      case 2:$barra = '<img src="imgs/naranja.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
			 break;
      case 3:$barra = '<img src="imgs/amarillo.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
			 break;
      case 4:$barra = '<img src="imgs/verde.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
			 break;
      case 5:	$barra = '<img src="imgs/azul.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
			 break;	
      default: $barra = '<img src="imgs/azul.png" width="'.$ancho * $porcentaje.'" height="'.$alto.'" border="0">';
			 break;				
    } // del switch
// for ($num=1; $num <=$porcentaje; $num++)
//  {
   echo $barra;
//  } // del for
   return 0;
}


?>
