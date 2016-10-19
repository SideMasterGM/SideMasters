<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>	
		<?php
			$string = "<script>alert('Sigo en problemas');</script>";
			?>
				<a href="buscar.php?id=<?php echo $string; ?>">Select Here</a>
			<?php
		?>
	</body>
</html>