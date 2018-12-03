	<?php
	require("clases/eventosHermanos.php");
	$evento = new EventosHermanos();
	?>

	<?php if (isset($_POST['hermano'])): ?>

			<?php $evento-> deleteHermano($_POST['evento'], $_POST['hermano']); ?>

	<?php elseif (isset($_POST['evento'])): ?>

			<?php $evento->getHermanos($_POST); ?>
		
	<?php endif ?>
