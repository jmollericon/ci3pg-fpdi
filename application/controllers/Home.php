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
	public function guardar_pdf() {
		$dir = 'uploads/files/';
		if(!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}

		$namefile = $dir."documento_pdf_".strtotime(date('Y-m-d H:i:s')).'.pdf';

		if(move_uploaded_file($_FILES['documento']['tmp_name'], $namefile)) {
			$data['documento'] = $namefile;
			$this->HomeModel->guardarArchivoNombre($data);

		}
		echo "Guardando:<br>";
		print_r($_POST);
		echo "<br>";
		print_r($_FILES);
	}
}
