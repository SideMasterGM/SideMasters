<?php
	echo "Return Filename with __FILE__: ".__FILE__;
	echo "<br/>The new filename is : ".$_SERVER['PHP_SELF']."<br/>";
	echo "DOCUMENT_ROOT: ".$_SERVER['DOCUMENT_ROOT']."<br/>";
	echo "Remote User: ".$_SERVER['REMOTE_USER']."<br/>";
	echo "Script Filename: ".$_SERVER['SCRIPT_FILENAME'];
?>