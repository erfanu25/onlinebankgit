<?php
require_once('tools/dbconfig.php');        
  require_once('tools/functions.php');
	$obj = new cls_func();

	include('session.php');

	session_start();
	session_destroy();
	header('location:index.php');
?>