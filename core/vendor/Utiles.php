<?php
class Utiles
{
	public function isPar($numero){
		if(($numero%2) == 0){
			return true;
		}else{
			return false;
		}
	}

	public function getYoutubeID($url) {
	    $tube = parse_url($url);
	    if ($tube["path"] == "/watch") {
	        parse_str($tube["query"], $query);
	        $id = $query["v"];
	    } else {
	        $id = "";   
	    }
	    return $id;
	}

	public function getMes($mes){
		$mesTexto = null;

		switch ($mes) {
			case 1:
				$mesTexto = "Enero";
				break;
			case 2:
				$mesTexto = "Febrero";
				break;
			case 3:
				$mesTexto = "Marzo";
				break;
			case 4:
				$mesTexto = "Abril";
				break;
			case 5:
				$mesTexto = "Mayo";
				break;
			case 6:
				$mesTexto = "Junio";
				break;
			case 7:
				$mesTexto = "Julio";
				break;
			case 8:
				$mesTexto = "Agosto";
				break;
			case 9:
				$mesTexto = "Septiembre";
				break;
			case 10:
				$mesTexto = "Octubre";
				break;
			case 11:
				$mesTexto = "Noviembre";
				break;
			case 12:
				$mesTexto = "Diciembre";
				break;
		}

		return $mesTexto;
	}

	public function getNombreCategoria($categoria){
		$categoriaString = null;

		switch ($categoria) {
			case 'photoshop':
				$categoriaString = "Photoshop";
				break;
			case 'cinema':
				$categoriaString = "Cinema 4D";
				break;
			case 'after':
				$categoriaString = "After Effects";
				break;
			case 'disenio':
				$categoriaString = "Diseño Web";
				break;
		}

		return $categoriaString;
	}

	public function getUrlEmbebed($url){
		preg_match("/v=([^&]+)/i", $url, $matches);
		$id = $matches[1];
		$video = "http://www.youtube.com/v/{id}&hl=en_US&fs=1&";

		$video = str_replace('{id}', $id, $video);

		return $video;
	}
}





?>