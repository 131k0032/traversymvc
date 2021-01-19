<?php 

// Controlador base, carga los modelos y las vistas
class Controller{

	// Carga el modelos
	public function model($model){
		// Solicita el archivo
		require_once '../app/models/'.$model.'.php';
		// Instanciando el modelo
		return new $model();

	}

	public function view($view, $data = []){
		if (file_exists('../app/views/'.$view.'.php')) {
			require_once '../app/views/'.$view.'.php';
		}else{
			// view dont exist
			die('View dont exist');
		}

	}



}