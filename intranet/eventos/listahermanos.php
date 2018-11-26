	<?php
	require("clases/eventosHermanos.php");

	$evento = new EventosHermanos();
	$evento->getHermanos($_POST['evento']);
	?>
