<?php 
error_reporting(E_ALL);
require('./class.progressbar.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <title>ProgressBar - Full feature Demo</title>
</head>
<body>
<p style="text-align:center;">
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" />
 </a>
</p>
<?php
$prb1 = new ProgressBar(40, 270);
$prb1->left = 50;
$prb1->top = 50;
$prb1->max = 220;
$prb1->pedding = 2;
$prb1->addLabel('percent','pct1');
$prb1->setLabelPosition('pct1',50,35,40,0,'right');
$prb1->setBarDirection('down');
$prb1->show();

$prb2 = new ProgressBar(300, 40);
$prb2->left = 120;
$prb2->top = 50;
$prb2->border = 2;
$prb2->color = '#6699ff';
$prb2->bgr_color = '#000000';
$prb2->brd_color = '#660066';
$prb2->addLabel('text','txt1','|');
$prb2->setLabelPosition('crt1',120,30,10,0,'center');
$prb2->show();

$prb3 = new ProgressBar(400, 70);
$prb3->left = 120;
$prb3->top = 120;
$prb3->color = '#ff6633';
$prb3->bgr_color = 'yellow';
$prb3->setBarDirection('left');
$prb3->addLabel('text','txt1');
$prb3->show();

$prb4 = new ProgressBar(600, 100);
$prb4->left = 120;
$prb4->top = 220;
$prb4->min = 50;
$prb4->max = 150;
$prb4->border = 0;
$prb4->color = '#cccc66';
$prb4->bgr_color = '#66ccff';
$prb4->addLabel('percent','pct1');
$prb4->setLabelPosition('pct1',120,220,600,100,'center');
$prb4->setLabelFont('pct1',78);
$prb4->show();

@set_time_limit(300);

for($i=1; $i<=220; $i++) {
	$prb1->moveStep($i);
	if ($i==50) {$prb2->hide();}
	if ($i==100) {$prb3->hide();}
	if ($i==200) {$prb4->hide();}
	usleep(10000);
}
$prb1->moveMin();
$prb1->setBarDirection('up');

$prb2->unhide();
for($i=1; $i<=100; $i++) {
	$prb2->moveStep($i);
	$prb2->setLabelPosition('txt1',($i * 3) + 120,30,10,0,'center');
	$prb2->setBarColor('#00'.dechex(100-$i+100).dechex($i+80));
	$prb1->moveNext();
	usleep(100000);
}
$prb2->setLabelValue('crt1','');

$prb3->unhide();
$prb3->setLabelValue('txt1','searching ...');
for($i=1; $i<=100; $i++) {
	if($i==30) {$prb3->setLabelValue('txt1','loading ...');}
	if($i==60) {$prb3->setLabelValue('txt1','writing ...');}
	$prb3->moveStep($i);
	$prb1->moveNext();
	usleep(100000);
}
$prb3->setLabelValue('txt1','complete');

$prb4->unhide();
for($i=50; $i<=150; $i+=5) {
	$prb4->moveStep($i);
	$prb1->moveNext();
	sleep(1);
}
?>
</body>
</html>