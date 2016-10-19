<!-- Window Modal Login -->
<link rel="stylesheet" href="css/modalRequest.css">
<div id="PublishedTrue" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Publicación del artículo!.</h2></center>
		</div>
		<div class="copy">
			<p>Lo anteriormente redactado se ha publicado con éxito!.</p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>

<div id="DeletePostTrue" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Eliminación del artículo!.</h2></center>
		</div>
		<div class="copy">
			<p>El artículo se ha eliminado permanentemente con éxito!.</p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>

<div id="DeletePostFalse" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Eliminación del artículo!.</h2></center>
		</div>
		<div class="copy">
			<p>El artículo que se ha solicitado eliminar, no se ha podido eliminar, el fichero aún existe.</p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>

<div id="PublishedFalse" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Publicación del artículo!.</h2></center>
		</div>
		<div class="copy">
			<?php 
				if (isset($_GET['Error'])){
					$ReturnMessage = $_GET['Error'];
				} else {
					$ReturnMessage = "No hay error.";
				}
			?>
			<p id="ProblemPublish">Ha ocurrido el siguiente problema: <?php echo $ReturnMessage; ?></p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>

<div id="ChangeImgPerfilTrue" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Cambio de imagen de perfil</h2></center>
		</div>
		<div class="copy">
			<p>La imagen de perfil se ha actualizado de manera correcta.</p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>

<div id="ChangeImgPerfilFalse" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Cambio de imagen de perfil</h2></center>
		</div>
		<div class="copy">
			<?php 
				if (isset($_GET['Error'])){
					$ReturnMessage = $_GET['Error'];
				} else {
					$ReturnMessage = "No hay error.";
				}
			?>
			<p id="ProblemPublish">Ha ocurrido el siguiente problema: <?php echo $ReturnMessage; ?></p>
		</div><br>
	</div>
	<a onclick="javascript: window.location.href='#';">
		<div class="overlay"></div>
	</a>
</div>