<?php
	ob_start();
	session_start();
	include("include/config.php");
	include("include/defs.php");

	/* Log Seguimiento */
	$arrVal = array(
									"id_module" => 2,
									"description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha salido del sistema.",
									"id_user" => $_SESSION['MR_USER_ID'],
									"log_time" => date("Y-m-d H:i:s")
								 );

	$nId = InsertRec("log_tracing", $arrVal);
	/*  Fin Log Seguimiento */

	session_destroy();
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	header('Location: ' . $home_url);
?>
