<?php
if (isset($_GET['id'])) {
	require "clases/reunionesHermanos.php"; 
	$reuniones = new ReunionesHermanos();
	$reuniones->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>
