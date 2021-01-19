<?php 
// App Core class
// Creates URL & Loads core controller
// URL Format - /controller/method/params

Class Core{
	protected $currentController ='Pages';
	protected $currentMethod='index';
	protected $params=[];


	public function __construct(){
		// print_r($this->getUrl());//Imprime en forma de arreglo
		$url= $this->getUrl();

		// Busca en el controlador pa posicion 0
		if ($url!=null) {
			if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
				// Si existe ponle default
				$this->currentController= ucwords($url[0]);
				// Elimina el url[0]
				unset($url[0]);
			}
		}
	

		// Incluyendo el controlador
		require_once '../app/controllers/'.$this->currentController.'.php';
		$this->currentController= new $this->currentController;
	}

	public function getUrl(){
		// Si existe la varibale url en el url
		if (isset($_GET['url'])) {
			$url=rtrim($_GET['url'],'/');
			$url=filter_var($url, FILTER_SANITIZE_URL);
			$url=explode('/', $url);
			return $url;
		}

	}


}