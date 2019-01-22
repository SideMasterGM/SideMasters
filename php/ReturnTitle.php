<?php
	function ReturnTitle(){
		if (isset($_GET['category']) && !empty($_GET['category'])){
			return "FullDevOps - ".$_GET['category'];
		} else if (isset($_GET['search']) && !empty($_GET['search'])){
			return "FullDevOps - ".$_GET['search'];
		}

		return "FullDevOps - Programación, Frameworks, Sistemas Operativos, Aplicaciones Móviles, Juegos, CMS, Noticias";
	}

	function ReturnURLImg(){
		$URL = "http://www.fulldevops.es/src/img-test/img_fb.png";
		return $URL;
	}

?>