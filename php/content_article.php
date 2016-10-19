<section class="content">
	<div class="scroll-wrap container_post_two">
		<?php
			$N = $SM->query($sql." LIMIT ".$start.", ".$limit.";");
			while ($CheckArticle = $N->fetch_array(MYSQLI_ASSOC)){
				?>
					<article class="content__item post_two">
						<span class="category category--full">Life &amp; Death</span>
						<h2 class="title title--full"><?php echo $CheckArticle['title']; ?></h2>
						<div class="meta meta--full id="testDiv" style="height: 700px;" >

							<div class="BackgroundImg">
								<?php
									$QueryAuthor = "SELECT username, author, img_perfil FROM sm_log WHERE username='".$CheckArticle['username']."';";
									$New = $SM->query($QueryAuthor);
									while ($Run = $New->fetch_array(MYSQLI_ASSOC)){
										$DataAuthor = $Run['author'];
										$DataPerfil = $Run['img_perfil'];
										$UserName   = $Run['username'];
									}

									if ($DataPerfil != "-"){
										if (is_file("private/desktop/".$DataPerfil)){
											?><img class="meta__avatar" width="60px" title="Imagen de perfil del autor" src="<?php echo "private/desktop/".$DataPerfil; ?>" alt="author04" /><?php
										} else {
											?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
										}
									} else {
										?><img class="meta__avatar" width="60px" title="No tiene imagen de perfil" src="img/authors/usermale.png" alt="Author" /><?php
									}

									if ($DataAuthor == "-"){
										?> <span class="meta__author"><?php echo $UserName; ?></span> <?php
									} else {
										?> <span class="meta__author" title="<?php echo $DataAuthor; ?>"><?php echo $DataAuthor; ?></span> <?php
									}
								?>
							</div>

							<span class="meta__date"><i class="fa fa-calendar-o"></i>
								<?php
									if (date("Y") == date("Y", $CheckArticle['date_log']))
										echo date('j M', $CheckArticle['date_log']);
									else
										echo date('j M Y', $CheckArticle['date_log']);
								?>
							</span>
							<span class="meta__reading-time"><i class="fa fa-clock-o"></i>
								<?php echo nicetime(date("Y-m-d H:i", $CheckArticle['date_log'])); ?>
							</span>

							<?php
								$MyQuery = "SELECT category FROM sm_article_categories WHERE title='".$CheckArticle['title']."';";
								$RQ = $SM->query($MyQuery);
								?> <br/><p><i class="fa fa-bookmark"></i> Etiquetas</p> <hr> <?php
								while ($RowQ = $RQ->fetch_array(MYSQLI_ASSOC)){
									?>
										<span class="meta__misc" title="Ir a <?php echo $RowQ['category']; ?>" onclick="Funct_CallTag('<?php echo $RowQ['category']; ?>')"><i class="fa fa-check-square"></i><?php echo $RowQ['category']; ?></span>
									<?php
								}
							?>

							<br/><p> <i class="fa fa-share-square"></i><b>Compartir</b></p> <hr>
							<div class="fashare">
								<i class="fa fa-google-plus-square fa-3x" onclick="Funct_Share('gp', '<?php echo $CheckArticle['title']; ?>')" title="Google +"></i>

								<i class="fa fa-facebook-square fa-3x" onclick="Funct_Share('fb', '<?php echo $CheckArticle['title']; ?>')" title="Facebook"></i>

								<i class="fa fa-pinterest-square fa-3x" onclick="Funct_Share('pt', '<?php echo $CheckArticle['title']; ?>')" title="Pinterest"></i>

								<i class="fa fa-twitter-square fa-3x" onclick="Funct_Share('tt', '<?php echo $CheckArticle['title']; ?>')" title="Twitter"></i>
							</div>


						</div>
						<p>
							<?php
								$title_full = $CheckArticle['title'];
								echo $CheckArticle['content']; 
							?>
						</p>
							<center>
								<input type="submit" class="DataTest" onclick="Funct_EjecComment('<?php echo $title_full; ?>');" value="Ver comentarios" />
							</center>
					</article>
				<?php
			}
		?>
	</div>
	<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
</section>
