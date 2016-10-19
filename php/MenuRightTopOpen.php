<meta charset="utf-8" />
<link rel="stylesheet" href="css/MenuRightTop.css">
<nav id="colorNav">
	<ul>
		<li>
            <span class="fa fa-bars fa-lg" ></span>
			<ul>
				<li>
					<a class="user" onclick="javascript: window.location.href='private/desktop/';">
						<span class="fa fa-user fa-lg" style="margin-left: -20px; margin-right: 20px;"></span>
						<?php echo @$_SESSION['username']; ?>
					</a>
				</li>
				<li><a href="comments">¿Algún comentario?</a></li>
				<li><a onclick="javascript: window.location.href='private/desktop/php/logout.php';">Cerrar sesi&oacute;n</a></li>
			</ul>
		</li>
	</ul>
</nav>

<style>
	.tape { background-color: steelblue; }
	#header-section nav ul li a { color: #fff; }
</style>
