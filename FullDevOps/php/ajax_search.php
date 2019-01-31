<?php
	include ("../private/connect_server/connect_server.php");

	$busqueda = new Ajax();
	echo json_encode($busqueda->Buscar($_GET['term']));

?>