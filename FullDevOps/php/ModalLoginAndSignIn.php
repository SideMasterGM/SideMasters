<!-- Window Modal Login -->
<div id="PrivateLogin" class="ModalLogin">
	<div class="modal-content">
		<div class="header">
			<center><h2>Iniciar sesi&oacute;n</h2></center>
		</div>
		<div class="copy">
			<div class="module form-module">
				<div class="toggle"><i class="fa fa-times fa-pencil"></i>
				  	<div id="toolstip" class="tooltip">Registrarse</div>
				</div>

			  <div class="form">
			    <form id="FormLogin">
			      <input type="text" id="input_username" name="username" placeholder="Nombre de usuario" required/>
			      <input type="password" name="password" placeholder="Contrase&ntilde;a" required/>
			     	<input type="submit" id="ClickLogin" value="Acceder" />
			    	<div id="msgLogin"></div>
			    </form>
			  </div>

			  <div class="form">
			    <form id="FormSignIn">
			      <input type="text" name="log_username" placeholder="Nombre de usuario" required/>
			      <input type="email" name="log_email" placeholder="Correo electr&oacute;nico" required/>
			      <input type="password" name="log_password" id="PassOne" placeholder="Contrase&ntilde;a" required/>
			      <input type="password" name="log_repassword" id="PassTwo" placeholder="Repetir contrase&ntilde;a" required/>
			      <input type="submit" id="ClickSignIn" value="Registrarse" />
			    	<div id="msgSignIn"></div>
			    </form>
			  </div>
			  <div class="cta"><a href="javascript: alert('Waiting to be attended!.');">¿Olvidaste tu contrase&ntilde;a?</a></div>
			</div>
		</div><br>
	</div>
	<a id="CloseOverLay" onmouseover="javascript: document.getElementById('input_username').focus();">
		<div class="overlay"></div>
	</a>
</div>