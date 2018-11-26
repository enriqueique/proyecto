<?php
if (isset($_GET['id'])) {
	require "clases/eventosHermanos.php"; 
	$evento = new EventosHermanos();
	$evento->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>
