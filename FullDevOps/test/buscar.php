<?php
	if (isset($_GET['id'])){
		$new = htmlspecialchars($_GET['id']);
		echo $new;
		?>
			<br />
		<?php
		$newTwo = htmlspecialchars_decode($_GET['id']);
		echo $newTwo;
	}
?>