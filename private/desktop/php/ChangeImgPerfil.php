<?php
	
	$formats 		= array('.jpg','.png','.gif','.jpeg','.bmp');
	$nameFile 		= $_FILES['archivo']['name']; 					/*Name File*/
	$nameFileTmp	= $_FILES['archivo']['tmp_name'];				/*Name File Temp*/
	$ext 			= substr($nameFile, strrpos($nameFile, '.'));	/*View the extension*/
	$ext 			= strtolower($ext);

	if (in_array($ext, $formats)){
		
		@session_start();
		$path_save = "../users/".@$_SESSION['username']."/";
		
		if (!file_exists($path_save))
			@mkdir($path_save, 0777);

		$path_save .= "img_perfil/";
		if (!file_exists($path_save))
			@mkdir($path_save, 0777);

		$path_true = "users/".@$_SESSION['username']."/img_perfil/";
		$AllFile   = "../".$path_true.$nameFile;
		if (move_uploaded_file($nameFileTmp, $AllFile)){
			chmod($AllFile, 0777);
			include ("../../connect_server/connect_server.php");

			// switch($ext) {
			//     case '.jpg':
			//     case '.jpeg':
			//     case '.JPG':
			//     case '.JPEG':
			//        	$image = imagecreatefromjpeg($AllFile);
			//     	break;
			//     case '.gif':
			//        $image = imagecreatefromgif($AllFile);
			//        break;
			//     case '.png':
			//        break;
			//  }

			//imagepng($image, $path_save."ImgPerfil.png");

			//unlink($path_save.$nameFile);

			// if (is_file($AllFile))
			// 	rename($AllFile, "../".$path_true."ImgPerfil".$ext);
			// else
			// 	header("Location: ../index?Error=".urlencode("Inesperado, no es un fichero.")."#ChangeImgPerfilFalse");

			$path_true .= $nameFile;
			$InsertUrl  = "UPDATE sm_log SET img_perfil='".$path_true."' WHERE username='".@$_SESSION['username']."';";
			
			if ($SM->query($InsertUrl))
				header("Location: ../index#ChangeImgPerfilTrue");
			else 
				header("Location: ../index?Error=".urlencode("No se pudo registrar en la base de datos")."#ChangeImgPerfilFalse");
		} else {
			header("Location: ../index?Error=".urlencode("No se pudo mover la imagen.")."#ChangeImgPerfilFalse");
		}
	} else {
		header("Location: ../index?Error=".urlencode("La extensión del fichero no es admitida.")."#ChangeImgPerfilFalse");
	}
?>