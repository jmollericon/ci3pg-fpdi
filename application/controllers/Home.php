<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModel');
	}
	public function index()
	{
		$data['productos'] = $this->HomeModel->getProductos();
		$this->load->view('home/index', $data);
	}
}
