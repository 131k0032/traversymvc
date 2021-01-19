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

		/*----------  Busca en el controlador pa posicion [0]  ----------*/
		if ($url!=null) { //Evita el warning trying
			if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
				// Si existe ponle default
				$this->currentController= ucwords($url[0]);
				// Elimina el url[0]
				unset($url[0]);
			}
		}
		// Incluyendo el controlador
		require_once '../app/controllers/'.$this->currentController.'.php';
		// Instanciando la clase Controlador
		$this->currentController= new $this->currentController;



		//*----------  Busca en el controlador pa posicion [1]  ----------*/
		if ($url!=null) {
			if (isset($url[1])) {
				// Checa si el metodo existe en el controlador
				if (method_exists($this->currentController, $url[1])) {
					$this->currentMethod= $url[1];	
					// Elimina el url[0]
					unset($url[1]);
				}
			}
			// echo $this->currentMethod;
			// Obteniendo parametros
			$this->params = $url ? array_values($url) : [];
			// Call back con parametros de los $array
			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

		}



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