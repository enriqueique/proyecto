<?php
if (isset($_GET['id'])) {
	require "clases/pagos.php"; 
	$pago = new Pagos();
	$pago->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>
