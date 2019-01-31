<?php

	if (isset($_POST['log_username'], $_POST['log_email'], $_POST['log_password'], $_POST['log_repassword'])){
		$username 	= trim($_POST['log_username']);
		$email		= trim($_POST['log_email']);
		$password	= trim($_POST['log_password']);
		$repassword	= trim($_POST['log_repassword']);
		
		if (is_string($username) && is_string($email)){
			if (strlen($username) > 0){
				if ((strlen($password) * strlen($repassword)) > 0){
					if (filter_var($email, FILTER_VALIDATE_EMAIL)){
						if ($password == $repassword){
							$password_crypt = password_hash($password, PASSWORD_DEFAULT);

							if (!get_magic_quotes_gpc()){
								$username = addslashes($username);
								$email = addslashes($email);
							}

							include ("../private/connect_server/connect_server.php");

							$username = $SM->real_escape_string($username);
							$email = $SM->real_escape_string($email);

							$count = 0;
							$UserOrEmail = $SM->query("SELECT * FROM sm_log WHERE username='".$username."' OR email='".$email."';");
							while ($Check = $UserOrEmail->fetch_array(MYSQLI_ASSOC)){
								$count++;
							}

							if ($count == 0){
								$InsertLog 		= "INSERT INTO sm_log (username, email, privileges, date_log, date_log_unix) VALUES ('".$username."','".$email."','admin','".date('Y-n-j')."','".time()."');";
								$InsertLogin 	= "INSERT INTO sm_login (username, password) VALUES ('".$username."','".$password_crypt."');";

								if ($SM->query($InsertLog)){
									if ($SM->query($InsertLogin)){
										?><div class="SignInGood">Registro con exito.</div><?php
										
										$path = "../private/desktop/users/";
										if (!file_exists($path)){
											@mkdir($path, 0777);
										}

										$path .= $username."/";
										if (!file_exists($path)){
											@mkdir($path, 0777);
										}

									} else {
										?><div class="SignInError">Datos de usuario no registrados.</div><?php
									}
								} else {
									?><div class="SignInError">Las credenciales no fueron registradas.</div><?php
								}
							} else {
								?><div class="SignInError">Este usuario ya está registrado.</div><?php
							}
						} else {
							?><div class="SignInError">Las claves son diferentes.</div><?php
						}
					} else {
						?><div class="SignInError">Dirección de correo incorrecta!.</div><?php
					}
				} else {
					?><div class="SignInError">Verifique la contraseña.</div><?php
				}
			} else {
				?><div class="SignInError">Ingrese un usuario!.</div><?php
			}
		} else {
			?><div class="SignInError">Nombre de usuario erróneo!.</div><?php
		}
	} else {
		?><div class="SignInError">No hay información que registrar.</div><?php
	}
?>