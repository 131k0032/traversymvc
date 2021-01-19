<?php 
// Archivo config.php
require_once 'config/config.php';

// Cargando librerias
// require_once 'libraries/Controller.php';
// require_once 'libraries/Core.php';
// require_once 'libraries/Database.php';

// Carga automatica de librerias
spl_autoload_register(function ($className){
	require_once 'libraries/'.$className.'.php';
});