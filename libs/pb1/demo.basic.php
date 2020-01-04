<?php require('./class.progressbar.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <title>ProgressBar - Simple Example</title>
</head>
<body>
<p style="position:absolute;left:50px;width:300px;text-align:center;">
 <a href="http://validator.w3.org/check?uri=referer">
 <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" />
 </a>
</p>
<?php
$prb = new ProgressBar(300, 30);	// create new ProgressBar (width:300px,height:30px)
$prb->left = 50;	// position from top
$prb->top = 80;	// position from left

$prb->show();	// show the ProgressBar

// move the Bar
for($i=1; $i<=100; $i++) {
	$prb->moveStep($i);
	usleep(100000);
}
?>
</body>
</html>