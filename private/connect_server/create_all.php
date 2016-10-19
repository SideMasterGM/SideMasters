<meta charset="utf-8">
<?php
	include ("connect_server.php");

	/*Insert code XML in the categories.*/

	$tables = array('sm_log' => "CREATE TABLE sm_log (
			username VARCHAR(50) NOT NULL PRIMARY KEY,
			author VARCHAR(50) DEFAULT '-', 							
			img_perfil VARCHAR(1000) DEFAULT '-', 						
			email VARCHAR(50) NOT NULL UNIQUE,
			privileges VARCHAR(6) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL
		)",
		'sm_login' => "CREATE TABLE sm_login (
			username VARCHAR(50) NOT NULL,
			password VARCHAR(75) NOT NULL,
			FOREIGN KEY(username) REFERENCES sm_log(username) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		'sm_category' => "CREATE TABLE sm_category (
			category_name VARCHAR(255) NOT NULL PRIMARY KEY
		)", 
		'sm_sub_category' => "CREATE TABLE sm_sub_category (
			sub_category_name VARCHAR(255) NOT NULL PRIMARY KEY,
			category_name VARCHAR(255) NOT NULL DEFAULT 'Noticias',
			FOREIGN KEY(category_name) REFERENCES sm_category(category_name) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		'sm_publish_article' => "CREATE TABLE sm_publish_article (
			title VARCHAR(700) PRIMARY KEY NOT NULL, 
			username VARCHAR(50) NOT NULL, 
			date_log VARCHAR(255) NOT NULL, 
			content LONGTEXT NOT NULL, 
			FOREIGN KEY(username) REFERENCES sm_log(username) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		'sm_article_categories' => "CREATE TABLE sm_article_categories (
			title VARCHAR(700) NOT NULL,
			category VARCHAR(255) NOT NULL, 
			FOREIGN KEY (title) REFERENCES sm_publish_article(title) ON UPDATE CASCADE ON DELETE CASCADE
		)", 
		'sm_enter' => "CREATE TABLE sm_enter (
			ip_addr VARCHAR(15) NOT NULL PRIMARY KEY, 
			user_domain VARCHAR(255) DEFAULT '-', 
			gateway_interface VARCHAR(12) DEFAULT '-', 
			server_name VARCHAR(255) DEFAULT '-', 
			server_protocol VARCHAR(12) DEFAULT '-', 
			request_method VARCHAR(10) DEFAULT '-', 
			request_time VARCHAR(20) DEFAULT '-', 
			document_root VARCHAR(255) DEFAULT '-', 
			accept_language VARCHAR(255) DEFAULT '-', 
			http_referer VARCHAR(400) DEFAULT '-', 
			data_navegator VARCHAR(255) DEFAULT '-', 
			uri_url VARCHAR(255) DEFAULT '-', 
			date_unix VARCHAR(100) NOT NULL, 
			username VARCHAR(255) DEFAULT '-'
		)", 
		'sm_recommendation' => "CREATE TABLE sm_recommendation (
			subject VARCHAR(255) NOT NULL DEFAULT '-', 
			content VARCHAR(1000) NOT NULL DEFAULT '-', 
			date_unix VARCHAR(100) NOT NULL, 
			username VARCHAR(255) DEFAULT '-' 
		)"
 	);

	$categories 	= "INSERT INTO sm_category (category_name) VALUES ('Programación'), ('Frameworks'), ('OS'), ('Apps'), ('Juegos'), ('CMS'), ('Noticias');";
	$sub_categories = array(0 => 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('C Puro','Programación'), ('CPP', 'Programación'), ('CSharp','Programación'), ('Batch','Programación'), ('JavaScript','Programación'), ('HTML','Programación'), ('CSS','Programación'), ('XML','Programación'), ('ASP','Programación'), ('PHP','Programación'), ('Python','Programación'), ('Ruby','Programación'), ('MySQL','Programación'), ('MongoDB','Programación'), ('PostgreSQL','Programación'), ('NoSQL','Programación');", 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('Ruby On Rails','Frameworks'), ('CodeIgniter', 'Frameworks'), ('Kohana','Frameworks'), ('CakePHP','Frameworks'), ('Zend','Frameworks'), ('Yii','Frameworks'), ('Pylons','Frameworks'), ('Satalyst','Frameworks'), ('Symphony','Frameworks'), ('Django','Frameworks'), ('TurboGears','Frameworks');", 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('Windows 7','OS'), ('Windows 8', 'OS'), ('Windows 8.1','OS'), ('Windows 10','OS'), ('Ubuntu','OS'), ('Backtrack','OS'), ('Fedora','OS'), ('RedHat','OS'), ('Mac 0s X 10','OS'), ('Mac 0s X Mountain Lion','OS'), ('Mac 0s X Leopard','OS'), ('Mac 0s X 11','OS');", 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('Android','Apps'), ('Apple IOS', 'Apps'), ('Windows Phone','Apps');", 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('PC','Juegos'), ('Play Station 2', 'Juegos'), ('Play Station 3','Juegos'), ('Play Station 4','Juegos'), ('WII','Juegos'), ('PSP','Juegos'), ('Super Nintendo','Juegos'), ('3DS','Juegos'), ('SEGA','Juegos'), ('Game Cube','Juegos'), ('64','Juegos'), ('PSVita','Juegos'), ('GameBoy','Juegos'), ('XBOX 360','Juegos'), ('XBOX One','Juegos'), ('Wii U','Juegos');", 
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('Blogger','CMS'), ('Drupal', 'CMS'), ('Joomla','CMS'), ('Magnolia','CMS'), ('Plone','CMS'), ('PrestaShop','CMS'), ('Tumblr','CMS'), ('WordPress','CMS'), ('Mambo Server','CMS'), ('Limonada','CMS');",
		"INSERT INTO sm_sub_category (sub_category_name, category_name) VALUES ('Noticias', 'Noticias');"
	);

	$cont = 0; $errors = 0; 
	foreach ($tables as $key => $value){
		if (!$SM->query($tables[$key])){
			echo "Ocurrió un problema en la tabla #:<b>".($cont+1)."</b>, Tabla: <b>".$key."</b><br/>\n";
			$errors++;
		}
		$cont++;
	}

	if ($SM->query($categories)){
		for ($x = 0; $x < count($sub_categories); $x++){
			if (!$SM->query($sub_categories[$x])){
				exit();
			}
		}
	} else {
		?><br/><?php echo "Ocurrió un problema al intentar insertar las categorías!."; ?><br/><?php
	}

	$password = "Programador";
	$password = password_hash($password, PASSWORD_DEFAULT);

	$query_log = "INSERT INTO sm_log (username, author, img_perfil, email, privileges, date_log, date_log_unix) VALUES ('Side Master','Jerson Martínez','-','developer@sidemasters.com','admin','".date('Y-n-j')."','".time()."');";
	$query_login = "INSERT INTO sm_login (username, password) VALUES ('Side Master','".$password."');";

	if ($SM->query($query_log)){
		if ($SM->query($query_login)){
				$path = "../desktop/users/";
				if (!file_exists($path)){
					@mkdir($path, 0700);
				}

				$path .= "Side Master/";
				if (!file_exists($path)){
					@mkdir($path, 0700);
				}
			echo "\n<hr>Se han creado <b>".($cont - $errors)."</b> tablas de manera correcta!.\n<hr/>";
		} else {
			echo "\nNo se ha podido almacenar en \"sm_Login\"\n";
		}
	} else {
		echo "\nNo se ha podido almacenar en \"sm_Log\"\n";
	}

?>