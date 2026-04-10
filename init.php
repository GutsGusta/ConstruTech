<?php
session_start();
require_once 'partials/data.php'
	if (!isset ($_SESSION['produtos'])){
		$_SESSION['produtos'] = $produtos_base;
	}
?>
