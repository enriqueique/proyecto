	<?php
	require("clases/pagosHermanos.php");
	$pago = new PagosHermanos();
	?>

	<?php if (isset($_POST['hermano'])): ?>

			<?php $pago-> deleteHermano($_POST['pago'], $_POST['hermano']); ?>

	<?php elseif (isset($_POST['pago'])): ?>

			<?php $pago->getHermanos($_POST); ?>
		
	<?php endif ?>
