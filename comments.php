<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("php/head.php"); ?>
	</head>

	<body>
	
		<header>
			<?php include("private/connect_server/connect_server.php"); ?>
			<?php include("php/header.php"); ?>
			<?php include("php/MenuCenter.php"); ?>
		</header>

		<?php 
			if (isset($_GET['category']) && @$_GET['category'] != ""){
				?>
					<div id="disqus_thread" style="width: 80%; z-index: -1; position: absolute; margin: 60px 10%;"></div>
					<script>
					    (function() {  // DON'T EDIT BELOW THIS LINE
					        var d = document, s = d.createElement('script');
					        
					        s.src = '//sidemasters.disqus.com/embed.js';
					        
					        s.setAttribute('data-timestamp', +new Date());
					        (d.head || d.body).appendChild(s);
					    })();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
				<?php
			} else {
				include ("php/panel_menu.php");
			}
		?>
	
		<footer>
			<?php include("php/footer.php"); ?>
		</footer>
	</body>
</html>
