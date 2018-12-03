	<?php
	require("clases/reunionesHermanos.php");
	$reunion = new ReunionesHermanos();
	?>

	<?php if (isset($_POST['hermano'])): ?>

			<?php $reunion-> deleteHermano($_POST['reunion'], $_POST['hermano']); ?>

	<?php elseif (isset($_POST['reunion'])): ?>

			<?php $reunion->getHermanos($_POST); ?>
		
	<?php endif ?>

