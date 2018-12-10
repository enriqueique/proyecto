<?php
if (isset($_GET['id'])) {
	require "clases/pagosHermanos.php"; 
	$pago = new PagosHermanos();
	$pago->delete($_GET['id']);
}else{
	header("Location: index.php");
}
?>
