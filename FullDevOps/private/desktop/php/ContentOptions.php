<?php
    if ($Privileges == "admin"){
        include ("php/ContentOptionsAdmin.php");
    } else if ($Privileges == "writer"){
    	// NotFound("Dentro de algunas horas se habilitarán las opciones de usuario. Mientras tanto puede ir agregando una imagen al perfil!.");
        include ("php/ContentOptionsWriter.php");
    } else if ($Privileges == "no") {
    	NotFound("Dentro de algunas horas se habilitarán las opciones de usuario. Mientras tanto puede ir agregando una imagen al perfil!.");
        //include ("php/ContentOptionsNo.php");
    } else {
        header("Location: ../../");
    }

    function NotFound($content){
		?>
			<div class="NotFound">
				<div class="ups">
					Up's
				</div>
				<p class="p">
					<?php echo $content; ?>
				</p>
				<p class="note"><b>Nota:</b> Se está en prueba la versión ".9".</p>
			</div>
		<?php
	}
?>