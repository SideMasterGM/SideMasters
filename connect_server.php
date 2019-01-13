<?php
	class SideMasters extends mysqli {
		public function __construct($host, $user, $pass, $db){
			@parent::__construct($host, $user, $pass, $db);
		}
	}

	class Ajax {

		public $buscador;

		public function Buscar($a){
			//$SM = new SideMasters("sidemasters.com.mysql", "sidemasters_com", "Inform@tico01", "sidemasters_com");
			$SM = new SideMasters("127.0.0.1", "root", "root", "devops");

			if (!$SM->query("SET NAMES 'utf8'"))
				die("Error al establecer SET NAMES");

			$this->buscador = $SM->real_escape_string($a);

			$sql = $SM->query("SELECT title FROM sm_publish_article WHERE title LIKE '%".$this->buscador."%' ;");
			$i = 0;

			while ($files = $sql->fetch_array(MYSQLI_ASSOC)){
				if ($i == 8){
					break;
				} else {
					$result[] = htmlspecialchars_decode($files['title']);
				}
				$i++;
			}

			return $result;
		}
	}
	
	$SM = new SideMasters("127.0.0.1", "root", "root", "devops");
	//$SM = new SideMasters("sidemasters.com.mysql", "sidemasters_com", "Inform@tico01", "sidemasters_com");

	if ($SM->connect_error)
		die("Ha ocurrido el siguiente error: ".$SM->connect_errno." -> ".utf8_encode($SM->connect_error));

	if (!$SM->query("SET NAMES 'utf8'"))
		die("Error al establecer SET NAMES");
?>
