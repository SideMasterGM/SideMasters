<?php
	$MyArray = array(0 => "Enero de abriel", 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

	for ($i = 0; $i<12; $i++){
		echo "Indice [".$i."]: ".$MyArray[$i];
		?><br/><?php
	} 
?>