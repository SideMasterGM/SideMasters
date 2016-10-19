<?php
	include ("connect_server.php");

	if ($SM->query("DROP DATABASE sidemasters;")){
		echo "Destrucción completada...";
		if ($SM->query("CREATE DATABASE sidemasters;")){
			echo "<br/>Base de datos renovada!.<br/>";
			include ("create_all.php");
		} else {
			echo "<br/>No se pudo escribir sobre la nueva base de datos!.<br/>";
		}
	} else {
		echo "No se ha podido realizar la destrucción!.";
	}

?>