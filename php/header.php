<script src="js/functions.js"></script>

<link rel="stylesheet" href="css/header.css">
<section id="header-section">

	<?php
		if (@$_SESSION['login'] != "Open")
			include ("php/MenuRightTop.php");
		else
			include ("php/MenuRightTopOpen.php");
	?>

	<div class="tape">
		<div class="logo">
			<a class="cd-bouncy-nav-trigger" href="#0">
				<img src="src/fav/sidemasters_w.png" class="fa-spin" alt="SideMasters" title="SideMasters" />
			</a>
		</div>

		<div class="options">
			<nav>
				<ul>
					<li id="Programaci&oacute;n">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-code" style="margin-right: 5px"></span>
			              <span class="metro-title">Programaci&oacute;n</span>
			            </a>
						<div>
							<ul>
								<li class="titulo naranja">
									<a href="#" class="metro-tile bg-warning light">
						              <span class="fa fa-desktop" style="margin-right: 25px"></span>
						              <span class="metro-title">Escritorio</span>
						            </a>
								</li>
								<li><a href="index?category=C Puro"><span class="fa fa-share-alt" style="margin-right: 25px"></span>C</a></li>
								<li><a href="index?category=CPP"><span class="fa fa-share-alt" style="margin-right: 25px"></span>C++</a></li>
								<li><a href="index?category=CSharp"><span class="fa fa-windows" style="margin-right: 25px"></span>C#</a></li>
								<li><a href="index?category=Batch"><span class="fa fa-share-alt" style="margin-right: 25px"></span>Batch</a></li>
							</ul>

							<ul>
								<li class="titulo azul">
									<a href="#" class="metro-tile bg-warning light">
						              <span class="fa fa-desktop" style="margin-right: 25px"></span>
						              <span class="metro-title">Front-End Web</span>
						            </a>
								</li>
								<li><a href="index?category=JavaScript"><span class="fa fa-fire" style="margin-right: 25px"></span>JavaScript</a></li>
								<li><a href="index?category=HTML"><span class="fa fa-html5" style="margin-right: 25px"></span>HTML *</a></li>
								<li><a href="index?category=CSS"><span class="fa fa-css3" style="margin-right: 25px"></span>CSS *</a></li>
								<li><a href="index?category=XML"><span class="fa fa-code" style="margin-right: 25px"></span>XML</a></li>
							</ul>

							<ul>
								<li class="titulo rojo">
									<a href="#" class="metro-tile bg-warning light">
						              <span class="fa fa-desktop" style="margin-right: 25px"></span>
						              <span class="metro-title">Back-End Web</span>
						            </a>
								</li>
								<li><a href="index?category=ASP"><span class="fa fa-code-fork" style="margin-right: 25px"></span>ASP</a></li>
								<li><a href="index?category=PHP"><span class="fa fa-code-fork" style="margin-right: 25px"></span>PHP</a></li>
								<li><a href="index?category=Python"><span class="fa fa-code-fork" style="margin-right: 25px"></span>Python</a></li>
								<li><a href="index?category=Ruby"><span class="fa fa-code-fork" style="margin-right: 25px"></span>Ruby</a></li>
							</ul>

							<ul>
								<li class="titulo verde">
									<a href="#" class="metro-tile bg-warning light">
						              <span class="fa fa-desktop" style="margin-right: 25px"></span>
						              <span class="metro-title">Base de Datos</span>
						            </a>
								</li>
								<li><a href="index?category=MySQL"><span class="fa fa-database" style="margin-right: 25px"></span>MySQL</a></li>
								<li><a href="index?category=MongoDB"><span class="fa fa-database" style="margin-right: 25px"></span>MongoDB</a></li>
								<li><a href="index?category=PostgreSQL"><span class="fa fa-database" style="margin-right: 25px"></span>PostgreSQL</a></li>
								<li><a href="index?category=NoSQL"><span class="fa fa-database" style="margin-right: 25px"></span>NoSQL</a></li>
							</ul>
						</div>
					</li>
					<li id="Frameworks">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-fire" style="margin-right: 5px"></span>
			              <span class="metro-title">Framework's</span>
			            </a>
						<div>
							<ul>
								<li class="titulo naranja"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 1</a></li>
								<li><a href="index?category=Ruby On Rails"><span class="fa fa-fire" style="margin-right: 25px"></span>Ruby On Rails</a></li>
								<li><a href="index?category=CodeIgniter"><span class="fa fa-fire" style="margin-right: 25px"></span>CodeIgniter</a></li>
								<li><a href="index?category=Kohana"><span class="fa fa-fire" style="margin-right: 25px"></span>Kohana</a></li>
							</ul>
							<ul>
								<li class="titulo azul"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 2</a></li>
								<li><a href="index?category=CakePHP"><span class="fa fa-fire" style="margin-right: 25px"></span>CakePHP</a></li>
								<li><a href="index?category=Zend"><span class="fa fa-fire" style="margin-right: 25px"></span>Zend</a></li>
								<li><a href="index?category=Yii"><span class="fa fa-fire" style="margin-right: 25px"></span>Yii</a></li>
							</ul>
							<ul>
								<li class="titulo rojo"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 3</a></li>
								<li><a href="index?category=Pylons"><span class="fa fa-fire" style="margin-right: 25px"></span>Pylons</a></li>
								<li><a href="index?category=Catalyst"><span class="fa fa-fire" style="margin-right: 25px"></span>Catalyst</a></li>
								<li><a href="index?category=Symphony"><span class="fa fa-fire" style="margin-right: 25px"></span>Symphony</a></li>
							</ul>
							<ul>
								<li class="titulo verde"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 4</a></li>
								<li><a href="index?category=Django"><span class="fa fa-fire" style="margin-right: 25px"></span>Django</a></li>
								<li><a href="index?category=TurboGears"><span class="fa fa-fire" style="margin-right: 25px"></span>TurboGears</a></li>
							</ul>
						</div>
					</li>
					<li id="OS">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-folder-open" style="margin-right: 5px"></span>
			              <span class="metro-title">OS</span>
			            </a>
						<div>
							<ul>
								<li class="titulo naranja"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Microsoft Windows</a></li>
								<li><a href="index?category=Windows 7"><span class="fa fa-windows" style="margin-right: 25px"></span>Windows 7</a></li>
								<li><a href="index?category=Windows 8"><span class="fa fa-windows" style="margin-right: 25px"></span>Windows 8</a></li>
								<li><a href="index?category=Windows 8.1"><span class="fa fa-windows" style="margin-right: 25px"></span>Windows 8.1</a></li>
								<li><a href="index?category=Windows 10"><span class="fa fa-windows" style="margin-right: 25px"></span>Windows 10</a></li>
							</ul>
							<ul>
								<li class="titulo azul"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>UNIX / Linux</a></li>
								<li><a href="index?category=Ubuntu"><span class="fa fa-linux" style="margin-right: 25px"></span>Ubuntu</a></li>
								<li><a href="index?category=BackTrack"><span class="fa fa-linux" style="margin-right: 25px"></span>BackTrack</a></li>
								<li><a href="index?category=Fedora"><span class="fa fa-linux" style="margin-right: 25px"></span>Fedora</a></li>
								<li><a href="index?category=RedHat"><span class="fa fa-linux" style="margin-right: 25px"></span>RedHat</a></li>
							</ul>
							<ul>
								<li class="titulo verde"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Macintosh Apple</a></li>
								<li><a href="index?category=Mac 0s X 10"><span class="fa fa-apple" style="margin-right: 25px"></span>Mac 0s X 10</a></li>
								<li><a href="index?category=Mac 0s X Mountain Lion"><span class="fa fa-apple" style="margin-right: 25px"></span>Mac 0s X Mountain Lion</a></li>
								<li><a href="index?category=Mac 0s X Leopard"><span class="fa fa-apple" style="margin-right: 25px"></span>Mac 0s X Leopard</a></li>
								<li><a href="index?category=Mac 0s X 11"><span class="fa fa-apple" style="margin-right: 25px"></span>Mac 0s X 11</a></li>
							</ul>
						</div>
					</li>
					<li id="Apps">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-magic" style="margin-right: 5px"></span>
			              <span class="metro-title">Apps</span>
			            </a>
						<div>
							<ul>
								<li class="titulo verde"><a href="index?category=Android"><span class="fa fa-android" style="margin-right: 25px"></span>Android</a></li>
							</ul>

							<ul>
								<li class="titulo naranja"><a href="index?category=Apple IOS"><span class="fa fa-apple" style="margin-right: 25px"></span>Apple IOS</a></li>
							</ul>
							<ul>
								<li class="titulo azul"><a href="index?category=Windows Phone"><span class="fa fa-windows" style="margin-right: 25px"></span>Windows Phone</a></li>
							</ul>
						</div>
					</li>
					<li id="Juegos">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-gamepad" style="margin-right: 5px"></span>
			              <span class="metro-title">Juegos</span>
			            </a>
						<div>
							<ul>
								<li class="titulo naranja"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 1</a></li>
								<li><a href="index?category=PC"><span class="fa fa-fire" style="margin-right: 25px"></span>PC</a></li>
								<li><a href="index?category=Play Station 2"><span class="fa fa-fire" style="margin-right: 25px"></span>Play Station 2</a></li>
								<li><a href="index?category=Play Station 3"><span class="fa fa-fire" style="margin-right: 25px"></span>Play Station 3</a></li>
								<li><a href="index?category=Play Station 4"><span class="fa fa-fire" style="margin-right: 25px"></span>Play Station 4</a></li>
							</ul>
							<ul>
								<li class="titulo azul"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 2</a></li>
								<li><a href="index?category=WII"><span class="fa fa-fire" style="margin-right: 25px"></span>Wii</a></li>
								<li><a href="index?category=PSP"><span class="fa fa-fire" style="margin-right: 25px"></span>PSP</a></li>
								<li><a href="index?category=Super Nintendo"><span class="fa fa-fire" style="margin-right: 25px"></span>Super Nintendo</a></li>
								<li><a href="index?category=3DS"><span class="fa fa-fire" style="margin-right: 25px"></span>3DS</a></li>
							</ul>
							<ul>
								<li class="titulo rojo"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 3</a></li>
								<li><a href="index?category=SEGA"><span class="fa fa-fire" style="margin-right: 25px"></span>SEGA</a></li>
								<li><a href="index?category=Game Cube"><span class="fa fa-fire" style="margin-right: 25px"></span>Game Cube</a></li>
								<li><a href="index?category=64"><span class="fa fa-fire" style="margin-right: 25px"></span>64</a></li>
								<li><a href="index?category=PSVita"><span class="fa fa-fire" style="margin-right: 25px"></span>PSVita</a></li>
							</ul>
							<ul>
								<li class="titulo verde"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 4</a></li>
								<li><a href="index?category=GameBoy"><span class="fa fa-fire" style="margin-right: 25px"></span>GameBoy</a></li>
								<li><a href="index?category=XBOX 360"><span class="fa fa-fire" style="margin-right: 25px"></span>XBOX 360</a></li>
								<li><a href="index?category=XBOX One"><span class="fa fa-fire" style="margin-right: 25px"></span>XBOX One</a></li>
								<li><a href="index?category=Wii U"><span class="fa fa-fire" style="margin-right: 25px"></span>Wii U</a></li>
							</ul>
						</div>
					</li>
					<li id="CMS">
						<a href="#" class="metro-tile bg-warning light">
			              <span class="fa fa-codepen" style="margin-right: 5px"></span>
			              <span class="metro-title">CMS</span>
			            </a>
						<div>
							<ul>
								<li class="titulo verde"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 1</a></li>
								<li><a href="index?category=Blogger"><span class="fa fa-fire" style="margin-right: 25px"></span>Blogger</a></li>
								<li><a href="index?category=Drupal"><span class="fa fa-fire" style="margin-right: 25px"></span>Drupal</a></li>
								<li><a href="index?category=Joomla"><span class="fa fa-fire" style="margin-right: 25px"></span>Joomla</a></li>
								<li><a href="index?category=Magnolia"><span class="fa fa-fire" style="margin-right: 25px"></span>Magnolia</a></li>
							</ul>
							<ul>
								<li class="titulo azul"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 2</a></li>
								<li><a href="index?category=Plone"><span class="fa fa-fire" style="margin-right: 25px"></span>Plone</a></li>
								<li><a href="index?category=PrestaShop"><span class="fa fa-fire" style="margin-right: 25px"></span>PrestaShop</a></li>
								<li><a href="index?category=Tumblr"><span class="fa fa-fire" style="margin-right: 25px"></span>Tumblr</a></li>
							</ul>
							<ul>
								<li class="titulo rojo"><a href="#"><span class="fa fa-fire" style="margin-right: 25px"></span>Espacio 3</a></li>
								<li><a href="index?category=WordPress"><span class="fa fa-fire" style="margin-right: 25px"></span>WordPress</a></li>
								<li><a href="index?category=Mambo Server"><span class="fa fa-fire" style="margin-right: 25px"></span>Mambo Server</a></li>
								<li><a href="index?category=Limonada"><span class="fa fa-fire" style="margin-right: 25px"></span>Limonada</a></li
							</ul>
						</div>
					</li>
					<li id="Noticias" class="news">
						<a href="index?category=Noticias" class="metro-tile bg-warning light">
			              <span class="fa fa-globe" style="margin-right: 5px"></span>
			              <span class="metro-title">Noticias</span>
			            </a>
					</li>
					
				</ul>
			</nav>
		</div>
		<!-- This is the tape - Menu !-->

		<div class="search">
			<center>
				<form action="index" method="get" id="FormSearchNow">
					<input type="text" name="search" id="search" placeholder="¡Genial!, ¿Sabías que...?" autofocus/>
					<img src="src/img-icons/search_white.png" onclick="javascript: document.getElementById('FormSearchNow').submit();" alt="Buscar" title="Hacer la busqueda">
				</form>
			</center>
		</div>
		<script src="js/search.js"></script>
	</div>

	<?php
		if (@$_SESSION['login'] != "Open"){
			include ("php/ModalLoginAndSignIn.php");
		}
	?>

</section>