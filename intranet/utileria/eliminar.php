<?php
if (isset($_GET['id'])) {
	require "clases/utileria.php"; 
	$utileria = new Utileria();
	$utileria->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>