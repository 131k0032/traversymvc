<?php 

class Pages extends Controller{

	public function __construct(){
		// echo 'PAGES LOADDE';
		$this->postModel=$this->model('Post');//Load the model
	}


	public function index(){
		// $this->view('hello');
		$post = $this->postModel->getPosts(); //Call a model functio

		$data=[
			'title'=>'Welcome',
			'posts'=>$post
		];

	

		$this->view('pages/index', $data);
	}


	public function about(){
		$data=['title'=>'About'];

		$this->view('pages/about', $data);
	}

}