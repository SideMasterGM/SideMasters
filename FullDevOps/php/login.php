<?php
	if (isset($_POST['username'], $_POST['password'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if (is_string($username)){
			if (strlen($username) > 0){
				if (strlen($password) > 0){
					$password_crypt = password_hash($password, PASSWORD_DEFAULT);
					if (!get_magic_quotes_gpc()){
						$username = addslashes($username);
					}

					include ("../private/connect_server/connect_server.php");

					$username = $SM->real_escape_string($username);

					$R = $SM->query("SELECT * FROM sm_login WHERE username='".$username."';");
					while ($CheckUser = $R->fetch_array(MYSQLI_ASSOC)){
						if (password_verify($password, $CheckUser['password'])){
							@session_start();
							@$_SESSION['login'] 	= "Open";
							@$_SESSION['username']	= $CheckUser['username'];
							?>
								<script>
									window.location.href="/";
								</script>
							<?php
							exit();
						}
					}
					?><div class="SignInError">Algunos datos son incorrectos.</div><?php
				} else {
					?><div class="SignInError">No hay contraseña para <?php echo htmlspecialchars($username); ?>.</div><?php
				}
			} else {
				?><div class="SignInError">Ingrese el nombre de usuario.</div><?php
			}
		} else {
			?><div class="SignInError">Usuario incorrecto!.</div><?php
		}
	} else {
		?><div class="SignInError">No hay datos a identificar.</div><?php
	}
?>
