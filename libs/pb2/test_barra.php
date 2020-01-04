<?php

	require("clase_mibarra.php");

	if ($cop==1) {
		$oBarra=new MiBarra(200,30,17);
		$oBarra->Update($actual);
		$oBarra->Stream();
	}

	for ($actual=0;$actual<=17;$actual++) {
		echo "<img border=0 src=test_barra.php?cop=1&actual=$actual><br><br>\n";
	}
?>
