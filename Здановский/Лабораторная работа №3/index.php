<?php
require_once('controller.php');
$main=1;
$ClientIp=$_SERVER['REMOTE_ADDR'];
$CurrTime=$_SERVER['REQUEST_TIME'];
if (!isset($_GET['page']))
	$data = getPage($main);
else $data = getPage($_GET['page']);
$pages = getNav();
if (!isset($_GET['ip'])){
	if (!isset($_GET['time']))
		$string=on_line($_GET['ip'],$_GET['time']);
	else $string=on_line($_GET['ip'],$CurrTime);
}
else {
	if (!isset($_GET['time']))
		$string=on_line($ClientIp,$_GET['time']);
	else $string=on_line($ClientIp,$CurrTime);
}
return require_once('templates.php');
?>