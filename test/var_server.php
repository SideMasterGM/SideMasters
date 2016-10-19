<?php
	echo $_SERVER['SERVER_NAME']."<br/>";
	echo $_SERVER['REMOTE_HOST']."<br/>";
	echo $_SERVER['DOCUMENT_ROOT']."<br/>";
	function Jerson(){
		echo "The name function is: ".__FUNCTION__;
	}

	Jerson();
?>