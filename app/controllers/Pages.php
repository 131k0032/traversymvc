<?php 

class Pages extends Controller{

	public function __construct(){
		// echo 'PAGES LOADDE';
	}


	public function index(){
		// $this->view('hello');
		$data=['title'=>'Welcome'];

		$this->view('pages/index', $data);
	}


	public function about(){
		$this->view('pages/about');
	}

}