<?php
if (isset($_GET['id'])) {
	require "clases/hermanos.php"; 
	$hermanos = new Hermanos();
	$hermanos->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>
