<?php
session_start();
require_once 'data.php';
	if (!isset ($_SESSION['produtos'])){
		$_SESSION['produtos'] = $produtos_base;
	} 

	if (!isset ($_SESSION['usuarios'])){
		$_SESSION['usuarios'] = $usuarios_base;
	}
// session_destroy();
?>

