<?php
	require_once('controller.php');
	if(!isset($_GET['page']) && !isset($_GET['search']) ) $_GET['page'] = 1;
	$pages = getNav();
	$data = getPage($_GET['page']);
	return require_once('templates.php'); ?>
