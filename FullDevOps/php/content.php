<link rel="stylesheet" href="css/style2.css">

<?php
	include ("php/BackToTop.php");
?>

<br/><br/><br/>

<div class="container">
	<div id="theSidebar" class="sidebar">
		<!-- Nada -->
	</div>

	<div id="theGrid" class="main">
		<?php
			include ("private/connect_server/connect_server.php");
			include ("php/CalcDate.php");
			?>
				<section class="grid container_post">
			<?php

			if (isset($_GET['category'])){
				include ("php/MenuRightBottom.php");
				include ("php/AddColor.php");

				$GetTitlteTags = "SELECT title FROM sm_article_categories WHERE category='".$_GET['category']."';";
				$RestApply = $SM->query($GetTitlteTags);
				$count = 0;
				while (@$RunRow = $RestApply->fetch_array(MYSQLI_ASSOC)){
					$NewQueryTitle = $SM->query("SELECT * FROM sm_publish_article WHERE title='".$RunRow['title']."';");
					while ($RR = $NewQueryTitle->fetch_array(MYSQLI_ASSOC)){
						?>
							<a class="grid__item post" href="#">
								<h2 class="title title--preview"><?php echo $RR['title']; ?></h2>
								<div class="loader"></div>
								<span class="category">Life &amp; Death</span>
								<div class="meta meta--preview">
									<?php
										$QueryImgPerfil = "SELECT img_perfil FROM sm_log WHERE username='".$RR['username']."';";
										$NewQuery = $SM->query($QueryImgPerfil);
										while ($Start = $NewQuery->fetch_array(MYSQLI_ASSOC))
											$DataImgPerfil = $Start['img_perfil'];

										if ($DataImgPerfil != "-"){
										if (is_file("private/desktop/".$DataImgPerfil)){
											?><img class="meta__avatar" width="60px" title="Imagen de perfil del autor" src="<?php echo "private/desktop/".$DataImgPerfil; ?>" alt="author04" /><?php
										} else {
											?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
										}
									} else {
										?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
									}
									?>
									<span class="meta__date"><i class="fa fa-calendar-o"></i>
										<?php
											if (date("Y") == date("Y", $RR['date_log']))
												echo date('j M', $RR['date_log']);
											else
												echo date('j M Y', $RR['date_log']);
										?>
									</span>
									<span class="meta__reading-time"><i class="fa fa-clock-o"></i>
										<?php echo nicetime(date("Y-m-d H:i", $RR['date_log'])); ?>
									</span>
								</div>
							</a>
						<?php
					}
					$count++;
				}

				if ($count == 0){
					if ($RValue == true)
						NotFound("La categoría ".htmlspecialchars($_GET['category'])." actualmente no tiene contenido para mostrar!.");
					else
						NotFound("El dato ingresado no es una categoría, vuelva a intentarlo cuando se escriba una como esta!.");
				}

				?></section> <?php
					include ("php/content_article_category.php");
			} else if (isset($_POST['search']) || isset($_GET['search'])){
				$SearchVal = (empty(@$_POST['search'])) ? @$_GET['search'] : @$_POST['search'];
				$SearchVal = htmlspecialchars($SearchVal);

				if (isset($_GET['comment'])){
					if ($_GET['comment'] == "yes"){
						$SearchTitle = "SELECT * FROM sm_publish_article WHERE title = '".$SearchVal."';";
					} else {
						$SearchTitle = "SELECT * FROM sm_publish_article WHERE title LIKE '%".$SearchVal."%';";
					}
				} else {
					$SearchTitle = "SELECT * FROM sm_publish_article WHERE title LIKE '%".$SearchVal."%';";
				}

				$RestApply = $SM->query($SearchTitle);
				$count = 0;
				while (@$RR = @$RestApply->fetch_array(MYSQLI_ASSOC)){
					?>
						<a class="grid__item post" href="#">
							<h2 class="title title--preview"><?php echo $RR['title']; ?></h2>
							<div class="loader"></div>
							<span class="category">Life &amp; Death</span>
							<div class="meta meta--preview">
								<?php
									$QueryImgPerfil = "SELECT img_perfil FROM sm_log WHERE username='".$RR['username']."';";
									$NewQuery = $SM->query($QueryImgPerfil);
									while ($Start = $NewQuery->fetch_array(MYSQLI_ASSOC))
										$DataImgPerfil = $Start['img_perfil'];

									if ($DataImgPerfil != "-"){
										if (is_file("private/desktop/".$DataImgPerfil)){
											?><img class="meta__avatar" width="60px" title="Imagen de perfil del autor" src="<?php echo "private/desktop/".$DataImgPerfil; ?>" alt="author04" /><?php
										} else {
											?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
										}
									} else {
										?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
									}
								?>
								<span class="meta__date"><i class="fa fa-calendar-o"></i>
									<?php
										if (date("Y") == date("Y", $RR['date_log']))
											echo date('j M', $RR['date_log']);
										else
											echo date('j M Y', $RR['date_log']);
									?>
								</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i>
									<?php echo nicetime(date("Y-m-d H:i", $RR['date_log'])); ?>
								</span>
							</div>
						</a>
					<?php
					$count++;
				}

				if ($count == 0){
					NotFound("La información que solicitó lamentablemente no fué encontrada!.");
				}

				?></section> <?php
					include ("php/content_article_search.php");
			} else {
				include ("php/MenuRightBottom.php");
				$limit = 9;
				$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
				if (!is_numeric($page)){ $page = 1;}
				$sql = "SELECT * FROM sm_publish_article ORDER BY date_log DESC";
				$start = ($page * $limit) - $limit;
				$result = $SM->query($sql);

				if(@$result->num_rows > ($page * $limit) ){
					$next = ++$page;
				}

				$R = $SM->query($sql." LIMIT ".$start.", ".$limit.";");
				if (@$query->num_rows < 0) {
					@header('HTTP/1.0 404 Not Found');
					echo 'Lo sentimos, perdimos conexión con el servidor.!';
					exit();
				}
				$count = 0;
				while ($CheckRow = $R->fetch_array(MYSQLI_ASSOC)){
					?>
						<a class="grid__item post" href="#">
							<h2 class="title title--preview"><?php echo $CheckRow['title']; ?></h2>
							<div class="loader"></div>
							<span class="category">Life &amp; Death</span>
							<div class="meta meta--preview">
								<?php
									$QueryImgPerfil = "SELECT img_perfil FROM sm_log WHERE username='".$CheckRow['username']."';";
									$NewQuery = $SM->query($QueryImgPerfil);
									while ($Start = $NewQuery->fetch_array(MYSQLI_ASSOC))
										$DataImgPerfil = $Start['img_perfil'];

									if ($DataImgPerfil != "-"){
										if (is_file("private/desktop/".$DataImgPerfil)){
											?><img class="meta__avatar" width="60px" title="Imagen de perfil del autor" src="<?php echo "private/desktop/".$DataImgPerfil; ?>" alt="author04" /><?php
										} else {
											?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
										}
									} else {
										?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
									}
								?>
								<span class="meta__date"><i class="fa fa-calendar-o"></i>
									<?php
										if (date("Y") == date("Y", $CheckRow['date_log']))
											echo date('j M', $CheckRow['date_log']);
										else
											echo date('j M Y', $CheckRow['date_log']);
									?>
								</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i>
									<?php echo nicetime(date("Y-m-d H:i", $CheckRow['date_log'])); ?>
								</span>
							</div>
						</a>
					<?php
					$count++;
				}

				if ($count == 0){
					NotFound("De momento la base de datos del sitio web no tiene contenido que mostrar!.");
				}
			?>

					<footer class="page-meta">
						<?php if (isset($next)): ?>
							<div class="nav">
								<a href='index.php?p=<?php echo $next?>'>Cargar más...</a>
							</div>
						<?php endif?>
					</footer>
				</section>

				<?php
					include ("php/content_article.php");
				?><?php
			}
		?>
	</div>
</div>

<script src="js/main.js"></script>
<script src="js/index.js"></script>

<?php
	function NotFound($content){
		?>
			<div class="NotFound">
				<div class="ups">
					Up's
					<input type="button" onclick="javascript: window.location.href='index.php';" value="OK" />
				</div>
				<p class="p">
					<?php echo $content; ?>
				</p>
				<p class="note"><b>Nota:</b> Filtraremos su búsqueda para futuras solicitudes.</p>
			</div>
		<?php
	}
?>