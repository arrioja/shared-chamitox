<?php require('./class.progressbar.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <title>ProgressBar - Window Style</title>
</head>
<body>
<p style="position:absolute;left:50px;width:320px;text-align:center;">
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" />
 </a>
</p>
<?php
$prb = new ProgressBar();	// create new ProgressBar

$prb->pedding = 2;	// Bar Pedding
$prb->brd_color = "#404040 #dfdfdf #dfdfdf #404040";	// Bar Border Color

$prb->setFrame();	// set ProgressBar Frame
$prb->frame['left'] = 50;	// Frame position from left
$prb->frame['top'] = 	80;	// Frame position from top
$prb->addLabel('text','txt1','Please wait ...');	// add Text as Label 'txt1' and value 'Please wait'
$prb->addLabel('percent','pct1');	// add Percent as Label 'pct1'
$prb->addButton('btn1','Restart',$_SERVER['PHP_SELF'].'?restart=1');	// add Button as Label 'btn1' and action '?restart=1'

$prb->show();	// show the ProgressBar

// Move the Bar
for($i=1; $i<=100; $i++) {
	if ($i==15) {$prb->setLabelValue('txt1','Loading Demo');}	// set Text Label value
	if ($i==30) {$prb->setLabelValue('txt1','Scanning ...');}
	if ($i>50 && $i<80) {$prb->setLabelValue('txt1','Send Mail: '.$i.'/130');}	// set Text Label value for each Step
	if ($i==80) {$prb->setLabelValue('txt1','anything else ...');}
	$prb->moveStep($i);
	usleep(100000);
}

$prb->setLabelValue('txt1','Completed');// set Text Label value
?>
</body>
</html>