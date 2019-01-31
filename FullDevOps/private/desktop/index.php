<?php
    include ("php/verify.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include ("php/head.php"); ?>
    </head>

    <body style="min-height: 500px;" data-spy="scroll" data-target="#nav-spy" data-offset="300">

        <!-- Navbar -->
        <nav class="navbar bg-light docs-navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <a class="navbar-brand" href="index">
                        <img src="../../src/fav/sidemasters.png" width="40px" style="box-shadow: 0px 50px 0px 0px rgb(237, 237, 237) inset; border-radius: 50%;" />
                        <b>Side Masters</b>
                        <?php
                            if ($Privileges == "admin"){
                                echo "Administrator";
                            } else if ($Privileges == "writer"){
                                echo "Writer";
                            } else {
                                echo "Limit";
                            }
                        ?>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse">

                    <!-- navbar right -->
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index"><i class="fa fa-user" style="margin-right: 10px;"></i><?php echo $_SESSION['username']; ?></a></li>
                            <li class="active"><a href="" onclick="Funct_GoMainPage()"><i class="fa fa-home" style="margin-right: 10px;"></i>P&aacute;gina principal</a></li>
                            <li class="active"><a href="php/logout"><i class="fa fa-sign-out" style="margin-right: 10px;"></i>Cerrar sesi&oacute;n</a></li>
                        </ul>
                        <?php
                            $QueryAuthor = "SELECT author, img_perfil FROM sm_log WHERE username='".@$_SESSION['username']."';";
                            $New = $SM->query($QueryAuthor);
                            while ($Run = $New->fetch_array(MYSQLI_ASSOC)){
                                $DataAuthor = $Run['author'];
                                $DataPerfil = $Run['img_perfil'];
                            }

                            if ($DataPerfil == "-"){
                                ?> <img src="../../img/authors/usermale.png" onmouseout="javascript: this.src='../../img/authors/usermale.png';" onmouseover="javascript: this.src='../../img/authors/cameraicon.png';" class="ImgPerfil" alt="Imagen de perfil" data-toggle="modal" data-target="#myModal" title="Cambiar imagen" /><?php
                            } else {
                                if (file_exists($DataPerfil)){
                                  ?> <img src="<?php echo $DataPerfil; ?>" onmouseout="javascript: this.src='<?php echo $DataPerfil; ?>';" onmouseover="javascript: this.src='../../img/authors/cameraicon.png';" class="ImgPerfil" alt="Imagen de perfil" data-toggle="modal" data-target="#myModal" title="Cambiar imagen" /><?php
                                } else {
                                  ?> <img src="../../img/authors/usermale.png" onmouseout="javascript: this.src='../../img/authors/usermale.png';" onmouseover="javascript: this.src='../../img/authors/cameraicon.png';" class="ImgPerfil" alt="Imagen de perfil" data-toggle="modal" data-target="#myModal" title="Cambiar imagen" /><?php
                                }
                            }
                        ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Agrega una imagen de perfil</h4>
                          </div>

                            <form action="php/ChangeImgPerfil.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="FILE" id="take-picture" name="archivo" class="show_imagen" accept="image/*" />
                                    <img src="img/User-Interface.png" alt="" id="show-picture" for="take-picture"/>
                                    <script src="js/show_img.js"></script>
                                </div>
                                <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                   <button type="submit" class="btn btn-primary">Listo</button>
                                </div>
                            </form>

                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </nav>

        <?php
            include ("php/ContentOptions.php");
            include ("php/modalRequest.php");
            include ("php/foot.php");
        ?>
    </body>
</html>
