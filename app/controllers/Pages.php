<?php 

class Pages extends Controller{

	public function __construct(){
		// echo 'PAGES LOADDE';
	}


	public function index(){
		// $this->view('hello');
	}


	public function about($id){
		echo $id;	
	}

}