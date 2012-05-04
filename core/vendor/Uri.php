<?php
class Uri
{
	private $raiz = "web";

	public function setRaiz($raizArg){
		$this->raiz = $raizArg;
	}

	public function getRaiz(){
		return $this->raiz;
	}

	public function path($ruta=null){
		$path = "/";

		if($ruta!=null){
			if($ruta == "/"){
				$path = $this->getRaiz();
			}else{
				$path = "/". $this->getRaiz() . "/" . $ruta;
			}	
		}

		return $path;
	}
}






?>