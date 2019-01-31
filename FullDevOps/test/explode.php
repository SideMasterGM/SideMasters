<?php
	$string = "PHP, HTML, CSS, ";

	$array_ = explode(",", $string);

	for ($i = 0; $i<count($array_); $i++){
		echo $array_[$i]; ?><br/><?php
	}
?>