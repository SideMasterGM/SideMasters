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
                            <a class="" href="#general" data-toggle="tab"><i class="fa fa-text-height" style="margin-right: 15px;"></i>Redactar art&iacute;culo</a>
                        </li>

                        <li class="list-group-item">
                            <a href="#published" data-toggle="tab"><i class="fa fa-globe" style="margin-right: 15px;"></i>Publicados</a>
                        </li>

                       <!--  <li class="list-group-item">
                            <a href="#saved" data-toggle="tab"><i class="fa fa-floppy-o" style="margin-right: 15px;"></i>Guardados</a>
                        </li>

                         <li class="list-group-item">
                            <a class="" href="#postgrados" data-toggle="tab"><i class="fa fa-user-plus" style="margin-right: 15px;"></i>Crear usuario</a>
                        </li>

                        <li class="list-group-item">
                            <a class="" href="#config" data-toggle="tab"><i class="fa fa-cogs" style="margin-right: 15px;"></i>Configuración</a> -->
                        </li>
                    </ul>

                   <?php include ("php/InformationEnd.php"); ?>

                    <a href="#" class="scrollup"><span class="fa fa-level-up"></span></a>
                </div>
            </div>

            <div class="col-xs-9 center-col va-t">
                <div id="docs-content" class="tab-content pn">
                    <div class="tab-pane fade active in" id="general" role="tabpanel">
                        <section class="bs-docs-section">
                            <script type="text/javascript" src="php/ckeditor/ckeditor.js"></script>
                            <form action="php/PublishArticle.php" method="post">
                                <textarea class="ckeditor" id="editorcd" name="content_article">
                                    <?php
                                        if (isset($_GET['ContentSaved'])){
                                            echo @htmlspecialchars($_GET['ContentSaved']);
                                        } else if (isset($_POST['ViewArticleForTitle'])){
                                            $ViewArticleQuery = $SM->query("SELECT * FROM sm_publish_article WHERE title='".$_POST['ViewArticleForTitle']."';");
                                            while ($VAHere = $ViewArticleQuery->fetch_array(MYSQLI_ASSOC)){
                                                echo @htmlspecialchars($VAHere['content']);
                                            }
                                        }
                                    ?>
                                </textarea>
                                <script type="text/javascript" src="js/f_ckeditor.js"></script>
                                <?php
                                    if (isset($_GET['TitleSaved'])){
                                        $ChangeTitle = $_GET['TitleSaved'];
                                        $NewTitleButton = "Reintentar";
                                    } else if (isset($_POST['ViewArticleForTitle'])){
                                        $ChangeTitle = $_POST['ViewArticleForTitle'];
                                        $NewTitleButton = "Editar";
                                    } else {
                                        $ChangeTitle = "";
                                        $NewTitleButton = "Publicar";
                                    }

                                    ?>
                                        <input type="hidden" name="WhatIs" value="<?php echo $NewTitleButton; ?>" />
                                        <input type="hidden" name="OriginalTitle" value="<?php echo @$_POST['ViewArticleForTitle']; ?>" />
                                    <?php
                                ?>
                                <input type="text" name="title_article" id="title_article" value="<?php echo @$ChangeTitle; ?>" placeholder="T&iacute;tulo del art&iacute;culo" />
                                <img class="img_tags" onclick="window.location.href='#select_category';" src="img/price-tags.png" alt="icon" />
                                <input type="submit" name="publish_article" id="publish_article" value="<?php echo $NewTitleButton; ?>" />
                                <!-- <input type="button" name="saved_article" id="saved_article" value="Guardar"> -->
                                <?php include ("php/SelectCategories.php"); ?>
                                <input type="hidden" name="OldCategories" value="<?php echo $NewTitleButton; ?>" />
                            </form>

                        </section>
                    <script src="js/main.js"></script>
                </div>

                <div class="tab-pane fade functional" id="published" role="tabpanel">
                    <?php
                        $QueryArticles = $SM->query("SELECT * FROM sm_publish_article ORDER BY date_log DESC;");
                        if (!$QueryArticles->num_rows){
                            NotFound("No hay artículos publicados!.");
                        } else {
                            ?>
                                <table style="width: 100%">
                                    <tr>
                                        <!-- <td title="Seleccionar todo"><input type="checkbox" /></td> -->
                                        <td title="Título del artículo" width="10px"><i class="fa fa-file"></i></td>
                                        <td title="Título del artículo"><b>Título</b></td>
                                        <td title="Fecha de publicación del artículo"><i class="fa fa-calendar"></i><b>Fecha</b></td>
                                        <td title="Tiempo en el que fué publicado"><i class="fa fa-clock-o"></i><b>Tiempo</b></td>
                                        <td title="Usuario que publicó el artículo"><b>Autor</b></td>
                                    </tr>
                                <?php
                                    include ("../../php/CalcDate.php"); $CountArticles = 0;
                                    while ($RQArticle = $QueryArticles->fetch_array(MYSQLI_ASSOC)){
                                        ?>
                                            <tr class="tr" ondblclick="_sendFormEditArticle('<?php echo 'SendFormArticle'.$CountArticles; ?>')" id="<?php echo 'SendFormArticle'.$CountArticles.'Item'; ?>" onclick="ItemSelected('<?php echo 'SendFormArticle'.$CountArticles.'Item'; ?>');" >
                                                <form action="" id="SendFormArticle<?php echo $CountArticles++; ?>" method="post">
                                                    <td width="10px"><i class="fa fa-file"></i></td>
                                                    <td title="<?php echo $RQArticle['title']; ?>">
                                                        <?php 
                                                            if (strlen($RQArticle['title']) >= 85){
                                                                echo substr($RQArticle['title'], 0, 85)."..."; 
                                                            } else {
                                                                echo $RQArticle['title']; 
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><i class="fa fa-calendar"></i><?php echo date('Y/m/d', $RQArticle['date_log']); ?></td>
                                                    <td><i class="fa fa-clock-o"></i><?php echo nicetime(date("Y-m-d H:i", $RQArticle['date_log'])); ?></td>
                                                    <td><?php
                                                            $QImage = $SM->query("SELECT * FROM sm_log WHERE username = '".$RQArticle['username']."' ;");
                                                            while ($QImg = $QImage->fetch_array(MYSQLI_ASSOC))
                                                                $DImgPerfil = $QImg['img_perfil'];

                                                            if ($DImgPerfil == "-"){
                                                              $PathImgDefault = "../../img/authors/usermale.png";
                                                            } else {
                                                              if (file_exists($DImgPerfil)){
                                                                $PathImgDefault = $DImgPerfil;
                                                              } else {
                                                                $PathImgDefault = "../../img/authors/usermale.png";
                                                              }
                                                            }
                                                            ?> <img src="<?php echo $PathImgDefault; ?>" class="MinImgPerfil" alt="Perfil" title="<?php echo $RQArticle['username']; ?>" /><?php

                                                        ?>
                                                    </td>
                                                    <input type="hidden" name="ViewArticleForTitle" value="<?php echo $RQArticle['title']; ?>" />
                                                </form>
                                            </tr>

                                            <div id="<?php echo 'SendFormArticle'.($CountArticles - 1).'Modal'; ?>" class="modalmask_modal">
                                                <div class="modalbox_modal movedown_modal">
                                                    <a href="#close" title="Close" class="close">X</a>
                                                    <p style="text-shadow: 1px 1px 1px #000; font-size: 17px; margin-top: 3px"><b>Propiedades: <?php echo $RQArticle['title']; ?></b></p>
                                                    <hr style="margin: -10px 0 10px 0; padding: 0;">
                                                    <?php
                                                        $QImage = $SM->query("SELECT * FROM sm_log WHERE username = '".$RQArticle['username']."' ;");
                                                        while ($QImg = $QImage->fetch_array(MYSQLI_ASSOC)){
                                                            $NameUser = $QImg['username'];
                                                            $DataA = $QImg['author'];
                                                        }
                                                        ?>
                                                            <input type="text" style="width: 45%; border: none; text-align: right; padding: 15px; margin: 5px 0 5px 0; background-color: #EEE; font-family: bold; margin-bottom: 8px;" value="Perfil de usuario" disabled />
                                                            <div class="imgCont" style="float: right; width: 53%;">
                                                                <img src="<?php echo $PathImgDefault; ?>" style="float: right; box-shadow: 0 0 2px 0 #000; width: 60px;" class="MinImgPerfil" alt="Perfil" title="<?php echo $RQArticle['username']; ?>" />
                                                            </div>
                                                            <hr style="margin: 0 0 10px 0;">

                                                            <input type="text" style="width: 35%; border: none; text-align: right; padding: 5px; background-color: #EEE; font-family: bold; margin: -5px 0 8px; 0" value="Propietario" disabled />
                                                            <input type="text" style="width: 63%; border: none; text-align: right; padding: 5px; background-color: #F8F8F8; margin-bottom: 8px;" value="<?php echo $NameUser; ?>" disabled />

                                                            <input type="text" style="width: 35%; border: none; text-align: right; padding: 5px; background-color: #EEE; font-family: bold; margin-bottom: 8px;" value="Fecha" disabled />
                                                            <input type="text" style="width: 63%; border: none; text-align: right; padding: 5px; background-color: #F8F8F8; margin-bottom: 8px;" value="<?php echo date('Y/m/d', $RQArticle['date_log']); ?>" disabled />

                                                            <input type="text" style="width: 35%; border: none; text-align: right; padding: 5px; background-color: #EEE; font-family: bold; margin-bottom: 8px;" value="Publicado" disabled />
                                                            <input type="text" style="width: 63%; border: none; text-align: right; padding: 5px; background-color: #F8F8F8; margin-bottom: 8px;" value="<?php echo nicetime(date("Y-m-d H:i", $RQArticle['date_log'])); ?>" disabled />

                                                            <input type="text" style="width: 35%; border: none; text-align: right; padding: 5px; background-color: #EEE; font-family: bold; margin-bottom: 8px;" value="Autor" disabled />
                                                            <?php
                                                                if ($DataA == "-"){
                                                                    $DataAuthor = "No asignado";
                                                                } else {
                                                                    $DataAuthor = $DataA;
                                                                }
                                                            ?>
                                                            <input type="text" style="width: 63%; border: none; text-align: right; padding: 5px; background-color: #F8F8F8; margin-bottom: 8px;" value="<?php echo $DataAuthor; ?>" disabled />

                                                            <?php
                                                                $QueryTags = $SM->query("SELECT * FROM sm_article_categories WHERE title='".$RQArticle['title']."';");
                                                            ?>
                                                            <input type="text" style="width: 35%; border: none; text-align: right; padding: 5px; background-color: #EEE; font-family: bold; margin-bottom: 8px;" value="Nº Etiquetas" disabled />
                                                            <input type="text" style="width: 63%; border: none; text-align: right; padding: 5px; background-color: #F8F8F8; margin-bottom: 8px;" value="<?php echo $QueryTags->num_rows; ?>" disabled />
                                                            <hr style="margin: 0 0 10px 0;">
                                                            <input type="button" onclick="Funct_Edit()" style="width: 49%; border: none; padding: 5px; background-color: teal; color: #fff;" value="Modificar" id="UpdateForm" />
                                                            <input type="button" onclick="window.location.href='#';" style="width: 49%; border: none; padding: 5px; background-color: steelblue; color: #fff;" value="Aceptar" id="AcceptForm" />
                                                        <?php
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                <input type="hidden" value="" id="SaveIdItem" />
                                </table>
                            <?php
                        }
                    ?>
                    
                    <div id="SharePost" class="modalmask_modal">
                        <div class="modalbox_modal movedown_modal">
                            <div class="container">
                                <img src="img/pinterest.png" onclick="Funct_Share('pt')" alt="Pinterest" title="Pinterest">
                                <img src="img/facebook.png" onclick="Funct_Share('fb')" alt="Facebook" title="Facebook">
                                <img src="img/twitter.png" onclick="Funct_Share('tt')" alt="Twitter" title="Twitter">
                                <img src="img/GooglePlus.png" onclick="Funct_Share('gp')" alt="Google Plus" title="Google +">
                            </div>
                        </div>
                    </div>

                    <div id="delete_post_yes" class="modalmask_modal">
                        <div class="modalbox_modal movedown_modal">
                            <p>El artículo ha sido eliminado con éxito!.</p>
                        </div>
                    </div>

                    <div id="GetLink" class="modalmask_modal">
                        <div class="modalbox_modal movedown_modal">
                            <div class="d data-text">
                                <i class="fa fa-link"></i><label style="font-family: cursive;" for="link-text">Link:</label>
                            </div>
                            <div class="d link-text">
                                <input type="text" id="link-text" title="Enlace del artículo" placeholder="Generate link here..." />
                            </div>
                            <div class="d ok">
                                <input type="button" onclick="javascript: window.location.href='#';" title="Aceptar y cerrar este dialogo." value="OK" /><i class="fa fa-check-circle "></i>
                            </div>
                        </div>
                    </div>

                    <div id="ConfirmDelete" class="modalmask_modal">
                        <div class="modalbox_modal movedown_modal">
                            <form action="php/delete_article.php" id="FormDelete_Article" method="post">
                                <p id="SureString"></p>
                                <p><b>Nota:</b> El artículo se eliminará permanentemente!.</p>
                                <div class="buttons">
                                    <input type="button" id="delete_article" onclick="javascript: Funct_DeleteArticle();" class="delete" value="Eliminar" />
                                    <input type="button" class="cancel" onclick="javascript: window.location.href='#';" value="Cancelar" />
                                    <input type="hidden" name="ValorFinal" id="ValueArticleDelete" value="" />
                                </div>                                
                            </form>
                        </div>
                    </div>

                    <div id="contextmenu">
                        <table>
                            <tr onclick="Funct_View()">
                                <td><i class="fa fa-eye"></i>Ver</td>
                            </tr>
                            <tr onclick="Funct_Edit()">
                                <td><i class="fa fa-text-width"></i>Editar</td>
                            </tr>
                            <tr onclick="Funct_Share()">
                                <td><i class="fa fa-share"></i>Compartir</td>
                            </tr>
                            <tr onclick="Funct_GetLink()">
                                <td><i class="fa fa-link"></i>Obtener enlace</td>
                            </tr>
                            <tr onclick="Funct_Forbidden()">
                                <td><i class="fa fa-exclamation-triangle"></i>Restringir</td>
                            </tr>
                            <tr onclick="Funct_Delete()">
                                <td><i class="fa fa-trash"></i>Eliminar</td>
                            </tr>
                            <tr onclick="Funct_Details()">
                                <td><i class="fa fa-info-circle"></i>Propiedades</td>
                            </tr>
                        </table>
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

                    <script>
                        $(".functional").bind('contextmenu', function(event){
                            if ($("#SaveIdItem").val() == ""){
                                //
                            } else {
                                $("#contextmenu").css({"top": (event.pageY - 65) + "px", "left": (event.pageX - 275) + "px"}).show();
                                event.preventDefault();
                            }
                        });

                        $(document).bind('click', function(){
                            $("#contextmenu").hide();
                        });

                    </script>

                </div>

                <div class="tab-pane fade" id="saved" role="tabpanel">
                    <h3 id="" class="page-header">Aún no hay artíclos guardados.</h3>
                </div>

                <div class="tab-pane fade" id="config" role="tabpanel">
                    <h3 id="" class="page-header">Configuración de la cuenta</h3>
                </div>
            </div>
        </div>
    </div>
</div>
