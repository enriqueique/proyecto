<?php
if (isset($_GET['id'])) {
	require "clases/pagos.php"; 
	$pagos = new Pagos();
	$pagos->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>