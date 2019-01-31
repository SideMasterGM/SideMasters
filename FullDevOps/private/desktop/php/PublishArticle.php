<?php
	if (isset($_POST['content_article'], $_POST['title_article'])){

		$content_article = $_POST['content_article'];
		$title_article	 = htmlspecialchars($_POST['title_article']);
		
		$check = strlen($content_article) * strlen($title_article);

		if ($check > 0){
			include ("../../connect_server/connect_server.php");
			@session_start();
			//$title_article = $SM->real_escape_string($_POST['title_article']);
			$array_ = explode(", ", $_POST['category_selected']);

			if (@$_POST['WhatIs'] == "Publicar" || @$_POST['WhatIs'] == "Reintentar"){
				$content_article = htmlspecialchars($_POST['content_article']);
				$Query = "INSERT INTO sm_publish_article (username, title, date_log, content) VALUES ('".@$_SESSION['username']."','".$title_article."','".time()."','".htmlspecialchars_decode($content_article)."');";
				
				if ($SM->query($Query)){
					for ($x = 0; $x < count($array_); $x++){
						$InsertTags = "INSERT INTO sm_article_categories (title, category) VALUES ('".$title_article."','".$array_[$x]."');";
						if (!$SM->query($InsertTags)){
							echo "La categoría: <b>".$array_[$x]."</b> no se pudo insertar!.";
						}
					}

					if ($x != count($array_)-1)
						header("Location: ../index.php?Error=".urlencode("Categorías no registradas!.")."#PublishedFalse");
					header("Location: ../index.php#PublishedTrue");
				} else {
					$RHere = $SM->query("SELECT * FROM sm_publish_article WHERE title='".htmlspecialchars_decode($title_article)."';");
					if ($RHere->num_rows > 0){
						header("Location: ../index.php?Error=".urlencode("El título ya existe, ingrese otro.")."&TitleSaved=".urldecode($title_article)."&ContentSaved=".urlencode(htmlspecialchars_decode($content_article))."&Selected_Categories=".urlencode($_POST['category_selected'])."#PublishedFalse");
						die();
					}
					header("Location: ../index.php?Error=".urlencode("La redacción no se ha publicado.")."&TitleSaved=".urldecode($title_article)."&ContentSaved=".urlencode(htmlspecialchars_decode($content_article))."&Selected_Categories=".urlencode($_POST['category_selected'])."#PublishedFalse");
				}
			} else if (@$_POST['WhatIs'] == "Editar"){
				$OriginalTitle = $_POST['OriginalTitle'];
				$UpdateTitle = 'UPDATE sm_publish_article SET title="'.$title_article.'" WHERE title="'.$OriginalTitle.'";';
				$UpdateContent = "UPDATE sm_publish_article SET content='".$content_article."' WHERE title='".$title_article."';";
				if ($SM->query($UpdateTitle)){
					if ($SM->query($UpdateContent)){
						if ($SM->query("DELETE FROM sm_article_categories WHERE title='".$title_article."';")){
							for ($x = 0; $x < count($array_); $x++){
								if ($array_[$x] != ""){
									$InsertTags = "INSERT INTO sm_article_categories (title, category) VALUES ('".$title_article."','".$array_[$x]."');";
									if (!$SM->query($InsertTags)){
										echo "La categoría: <b>".$array_[$x]."</b> no se pudo insertar!.";
									}
								}
							}
							header("Location: ../index.php#PublishedTrue");
						} else {
							echo "Error al querer eliminar los registros con el nombre anterior!.";
						}
					} else {
						echo "Error al actualizar el contenido!.";
					}
				} else {
					echo "Error al actualizar el titulo!.";
				}

				exit();

			}
		} else {
			if ($content_article == "" && $title_article == ""){
				header("Location: ../index.php?Error=".urlencode("No hay titulo ni contenido que publicar")."#PublishedFalse");
			} else if ($content_article == "" && $title_article != ""){
				header("Location: ../index.php?Error=".urlencode("No hay contenido que publicar.")."&TitleSaved=".urlencode($title_article)."#PublishedFalse");
			} else if ($content_article != "" && $title_article == ""){
				header("Location: ../index.php?Error=".urlencode("No hay titulo del contenido a publicar.")."&ContentSaved=".urlencode($content_article)."#PublishedFalse");
			} else {
				header("Location: ../index.php?Error=".urlencode("No hay datos que publicar.")."#PublishedFalse");
			}
		}
	}
?>