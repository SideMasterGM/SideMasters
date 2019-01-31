<?php
	if (isset($_POST['ValorFinal'])){
		include ("../../../private/connect_server/connect_server.php");
		$Data = $_POST['ValorFinal'];

		$Query = "DELETE FROM sm_publish_article WHERE title='".$Data."';";
		if ($SM->query($Query)){
			header("Location: ../#DeletePostTrue");
		} else {
			header("Location: ../#DeletePostFalse");
		}

	} else {
		header("Location: ../");
	}
?>