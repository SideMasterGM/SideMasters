<?php
	function ReturnTitle(){
		if (isset($_GET['category']) && !empty($_GET['category'])){
			return "Side Masters - ".$_GET['category'];
		} else if (isset($_GET['search']) && !empty($_GET['search'])){
			return "Side Masters - ".$_GET['search'];
		}

		return "Side Masters - Programación, Frameworks, Sistemas Operativos, Aplicaciones Móviles, Juegos, CMS, Noticias";
	}

	function ReturnURLImg(){
		$URL = "https://www.sidemasters.com/src/img-test/img_fb.png";
		return $URL;
	}

?>