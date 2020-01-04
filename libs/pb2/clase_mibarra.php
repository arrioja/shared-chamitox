<?php

	/*
		MiBarra.php
		Version v1.0.1

		Object Oriented Progress Bar - v1.0.1
		Barra de progreso Orientada a Objetos - v1.0.1

		History:
		v1.0 - PSRN - 10/05/2004 - Initial Version
		v1.0.1 - PSRN - 14/05/2004 - 1 Minor Bug in "Save" method.
		                           - Some comments added.

		By Pablo Niklas <pniklas@sinectis.com.ar>

		License: GNU.-

		Thanx to phpclasses.org for having posted this little class, and its administrator
		for having added some useful detailed descriptions about this class.
	*/

class MiBarra {

		//Pxs between the text and the borders
		var $espacio=8;

		var $im;
		var $anchobarra;
		var $porciento;

		//Font
		var $font="/usr/X11R6/lib/X11/fonts/Type1/agateb.pfb";

		var $texto;
		var $ancho;
		var $alto;
		var $actual;
		var $maximo;
		var $caja;
		var $ancho_caja;

		var $color_fondo;
		var $color_borde;
		var $color_barra;
		var $color_texto;

		//Constructor
		function MiBarra ($ancho, $alto, $maximo) {
			$this->ancho = $ancho;
			$this->alto = $alto;
			$this->maximo = $maximo;

			$this->im = ImageCreate($this->ancho,$this->alto);

			//Color settings
			//Background
			$r=hexdec("FF");
			$g=hexdec("FF");
			$b=hexdec("FF");
			$this->color_fondo=ImageColorAllocate($this->im,$r,$g,$b);

			//Border
			$r=hexdec("00");
			$g=hexdec("00");
			$b=hexdec("00");
			$this->color_borde=ImageColorAllocate($this->im,$r,$g,$b);

			//Bar itself
			$r=hexdec("ac");
			$g=hexdec("7f");
			$b=hexdec("7f");
			$this->color_barra=ImageColorAllocate($this->im,$r,$g,$b);

			//Text
			$r=hexdec("00");
			$g=hexdec("00");
			$b=hexdec("00");
			$this->color_texto=ImageColorAllocate($this->im,$r,$g,$b);

			//Draw the rectangle
			ImageRectangle($this->im,0,0,$this->ancho-1,$this->alto-1,$this->color_borde);
		}

		function Update ($actual) {
			$this->actual=$actual;

			$this->anchobarra=round(($this->actual/$this->maximo)*$this->ancho);
			$this->porciento=round(($this->actual/$this->maximo)*100);

			$texto="$this->porciento%";

			//Fill the rectangle
			ImageFilledRectangle($this->im,1,1,$this->anchobarra-2,$this->alto-2,$this->color_barra);

			//'Cos TTF fonts are width variable, I have to put them in a box, and then center it.
			$this->caja=ImageTTFBBox($this->alto-($this->espacio*2),0,$this->font,$texto);
			$this->ancho_caja=$this->caja[2]-$this->caja[0];

			//Write the numbers and "%"
			ImageTTFText($this->im,$this->alto-($this->espacio*2),0,($this->ancho-$this->ancho_caja)/2,$this->alto-$this->espacio,$this->color_texto,$this->font,$texto);
		}

		//Send the JPG stream.
		function Stream () {
			Header("Content-type: image/jpeg");
			ImageJPEG($this->im);
		}

		/*To save the graphic - For servers that don't support gd - Yeahh there's some outhere.. ;)

		  Remember that $file have to be saved in a place where the server have the access to write,
		  or else this method won't work.

		  Of course, $file can include the path of the file to be saved.
		*/
		
		function Save ($file) {
			ImageJPEG($this->im,"$file.jpg");
		}

	}

?>
