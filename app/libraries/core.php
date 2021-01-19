<?php 
// App Core class
// Creates URL & Loads core controller
// URL Format - /controller/method/params

Class Core{
	protected $currentController ='Pages';
	protected $currentMethod='index';
	protected $params=[];


	public function __construct(){
		$this->getUrl();
	}

	public function getUrl(){
		echo $_GET['url'];
	}


}