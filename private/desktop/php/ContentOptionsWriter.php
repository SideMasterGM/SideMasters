<div class="container">
    <div class="docs-container mt40" id="docs">
        <div class="row table-layout">
            <div class="col-xs-3 left-col">
                <span id="left-col-toggle" class="fa fa-navicon"></span>
                
                <div id="nav-spy" class="posr">
                    <ul class="list-group list-group-accordion">
                        <li class="list-group-item list-group-header br-n">
                            Menú de opciones
                        </li>
                        <li class="list-group-item active">
                            <a class="" href="#general" data-toggle="tab"> Redactar art&iacute;culo </a>
                        </li> 

                        <li class="list-group-item">
                            <a href="#published" data-toggle="tab"> Publicados </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#saved" data-toggle="tab"> Guardados </a>
                        </li>

                        <li class="list-group-item">
                            <a class="" href="#postgrados" data-toggle="tab"> Crear usuario </a>
                        </li> 

                        <li class="list-group-item">
                            <a class="" href="#config" data-toggle="tab"> Configuración </a>
                        </li> 
                    </ul>

                     <?php include ("php/InformationEnd.php"); ?>

                    <a href="#" class="scrollup"><span class="fa fa-level-up"></span></a>
                </div>
            </div>

            <!-- Documentation Content -->
            <div class="col-xs-9 center-col va-t">
                <div id="docs-content" class="tab-content pn">
                    <div class="tab-pane fade active in" id="general" role="tabpanel">
                        <section class="bs-docs-section">
                            <script type="text/javascript" src="php/ckeditor/ckeditor.js"></script>
                            <form action="php/PublishArticle.php" method="post">
                                <textarea class="ckeditor" id="editorcd" name="content_article" required></textarea required>
                                <script type="text/javascript" src="js/f_ckeditor.js"></script>
                                <input type="text" name="title_article" id="title_article" placeholder="T&iacute;tulo del art&iacute;culo" />
                                <input type="submit" name="publish_article" id="publish_article" value="Publicar" />
                                <input type="button" name="saved_article" id="saved_article" value="Guardar">
                            </form>

                        </section>
                    <script src="js/main.js"></script>                
                </div>

                <div class="tab-pane fade" id="published" role="tabpanel">
                    <h3 id="" class="page-header">Aún no hay artíclos publicados.</h3>
                </div>

                <div class="tab-pane fade" id="saved" role="tabpanel">
                    <h3 id="" class="page-header">Aún no hay artíclos guardados.</h3>
                </div>

                <div class="tab-pane fade" id="config" role="tabpanel">
                    <h3 id="" class="page-header">Configuración de la cuenta!.</h3>
                </div>
            </div>
        </div>
    </div>
</div>