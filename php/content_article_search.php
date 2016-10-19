<section class="content">
	<div class="scroll-wrap container_post_two">
		<?php
			if (isset($_GET['comment'])){
				if ($_GET['comment'] == "yes"){
					$SearchTitle = "SELECT * FROM sm_publish_article WHERE title = '".$SearchVal."';";
				} else {
					$SearchTitle = "SELECT * FROM sm_publish_article WHERE title LIKE '%".$SearchVal."%';";
				}
			} else {
				$SearchTitle = "SELECT * FROM sm_publish_article WHERE title LIKE '%".$SearchVal."%';";
			}
			$N = $SM->query($SearchTitle);
			while ($CheckArticle = $N->fetch_array(MYSQLI_ASSOC)){
				?>
					<article class="content__item post_two">
						<span class="category category--full">Life &amp; Death</span>
						<h2 class="title title--full"><?php echo $CheckArticle['title']; ?></h2>
						<div class="meta meta--full" id="testDiv" style="height: 700px;" >
							<?php 
								$QueryAuthor = "SELECT username, author, img_perfil FROM sm_log WHERE username='".$CheckArticle['username']."';";
								$New = $SM->query($QueryAuthor);
								while ($Run = $New->fetch_array(MYSQLI_ASSOC)){
									$DataAuthor = $Run['author'];
									$DataPerfil = $Run['img_perfil'];
									$UserName   = $Run['username'];
								}

								if ($DataImgPerfil != "-"){
									if (is_file("private/desktop/".$DataImgPerfil)){
										?><img class="meta__avatar" width="60px" title="Imagen de perfil del autor" src="<?php echo "private/desktop/".$DataImgPerfil; ?>" alt="author04" /><?php
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
							<!-- <span class="meta__misc meta__misc--seperator"><i class="fa fa-comments-o"></i> 7 comments</span>
							<span class="meta__misc"><i class="fa fa-heart"></i> 12 favorites</span> -->
							<?php
								$MyQuery = "SELECT category FROM sm_article_categories WHERE title='".$CheckArticle['title']."';";
								$RQ = $SM->query($MyQuery);
								?> <br/><p> <i class="fa fa-bookmark"></i> Etiquetas</p> <hr> <?php
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
						<?php
							if ($N->num_rows > 1){
								?>
									<center>
										<input type="submit" class="DataTest" onclick="Funct_EjecComment('<?php echo $title_full; ?>');" value="Ver comentarios" />
									</center>
								<?php
							} else {
								?>
									<div id="disqus_thread" style="width: 100%;"></div>
									<script>
									    /**
									     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
									     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
									     */
									    
									    var disqus_config = function () {
									        this.page.url = window.location.protocol + "//" + window.location.host + "/?search=" + encodeURIComponent("<?php echo htmlspecialchars($title_full); ?>");  // Replace PAGE_URL with your page's canonical URL variable
									        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
									    };
									    
									    (function() {  // DON'T EDIT BELOW THIS LINE
									        var d = document, s = d.createElement('script');
									        
									        s.src = '//sidemasters.disqus.com/embed.js';
									        
									        s.setAttribute('data-timestamp', +new Date());
									        (d.head || d.body).appendChild(s);
									    })();
									</script>
									<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
								<?php
							}
						?>
					</article>

				<?php
			}
		?>
	</div>
	<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
</section>