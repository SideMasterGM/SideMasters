<!-- <link rel="stylesheet" href="css/modal_log_sign-in.css"> -->
<div id="login" class="modalmask">
	<div class="modalbox movedown">
		<a href="#close" class="close" title="Cerrar">X</a>
		<h3>Iniciar sesi&oacute;n</h3><hr size="1" noshade="noshade" />
		<label for="">Rellene los siguientes campos.</label>
		<form action="" method="post">
			<input type="text" name="user" id="user" placeholder="Nombre de usuario o Email" required /><br/>
			<input type="password" name="pass" id="pass" placeholder="Contrase&ntilde;a" required />
			<a href="javascript: void">
				<img src="src/img/eye.png" width="25px" onmousedown="function()" onmouseup="function()" />
			</a>
			<input type="submit" id="login" name="login" value="Iniciar sesi&oacute;n" />
		</form>
	</div>
</div>





			<!-- <div id="modal1" class="modalmask" onmouseover="javascript: document.getElementById('username').focus();">
				<div class="modalbox movedown">
					<a href="#close" onclick="_del_pass()" title="Close" class="close">X</a>
					<label class="parrafo">Rellene los siguientes campos!.</label>
					<form action="security/login.php" method="POST">
						<input type="text" name="username" id="username" value="" placeholder="Nombre de usuario o Email" required /> <br/>
						<input type="password" name="password" id="password" value="" placeholder="Contrase&ntilde;a" required /> 
						<a href="javascript: void" > <img src="img/eyel.png" width="25px"  onmousedown="_change_type()" onmouseup="_change_type()" /> </a> <br/>
						<input type="submit" id="loguear" name="loguear" value="Iniciar Sesi&oacute;n" />
					</form>
				</div>
			</div>

			<div id="modal2" class="modalmask_2" onmouseover="javascript: document.getElementById('username').focus();">
				<div class="modalbox_2 movedown_2">
					<a href="#close" onclick="_del_pass()" title="Close" class="close">X</a>
					<h3>Ceo Developers!.</h3><hr size="1" noshade="noshade" />
					<label class="parrafo">La cuenta: <b><?php echo $_SESSION['username']; ?></b> est&aacute; abierta!. ¿Qu&eacute; deseas hacer?</label><br/>
					<a class="href" href="javascript: window.location.href='security/private/'">Ir a mi cuenta</a>
					<form action="security/logout_alt.php" id="destroy_session" method="POST">
						<input type="hidden" value="0" name="send" />
						<a class="href" href="javascript: document.getElementById('destroy_session').submit();">Cerrar sesi&oacute;n</a>
					</form>
					<form action="security/logout_alt.php" id="destroy_session_2" method="POST">
						<a class="href" href="javascript: document.getElementById('destroy_session_2').submit();">Acceder con otra cuenta</a>
						<input type="hidden" value="1" name="send" />
					</form>
					<a class="href" href="#close">Permanecer en la p&aacute;gina</a>
				</div>
			</div> -->