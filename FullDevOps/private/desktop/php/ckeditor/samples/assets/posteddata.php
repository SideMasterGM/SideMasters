<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			echo $title_article = $_POST['title_artcicle']."<br/>";
			echo $content_article = htmlspecialchars(stripslashes((string)$_POST['content_article']));
			echo "<br/>".$option_article = $_POST['option']."<br/>";
			echo $description_article = $_POST['description_article']."<br/>";

			$path_img = "../../imagenes/";
			if (!file_exists($path_img)){
				@mkdir("../../imagenes/", 0700);
			}

			/*Cuidado se te olvida sidemastersito, este codigo es para guardar el articulo en la db
			LEE DESGRACIADO que nunca lees comentario....

			HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.*/
			@session_start();
			echo $_SESSION['username'];

			if (isset($_POST['publish'])){
				$nombreArchivo = $_FILES['archivo']['name'];
				$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
				if (move_uploaded_file($nombreTmpArchivo, $path_img.$nombreArchivo)){
					$path_destino = "security/private/imagenes/".$nombreArchivo;
					echo "<img src='".$path_img.$nombreArchivo."' />";
				} else {
					echo "<br/>Ocurrio un error en la movida de la imagen.";
				}
			} else {
				echo "No has entrado en condicion alguna.";
			}
		?>
	</body>
</html>