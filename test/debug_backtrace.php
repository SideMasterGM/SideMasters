<?php
	function MakingTest($String){
		echo "Hello: ".$String;
		var_dump(debug_backtrace());
	}

	MakingTest("Friend");

?>