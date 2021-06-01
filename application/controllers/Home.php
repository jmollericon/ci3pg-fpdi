<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('vendor/autoload.php');
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
		redirect(base_url());
	}
	public function editar_pdf() {
		$archivo = "uploads/files/documento_pdf_1622504189.pdf";
		$pdf = new Fpdi(); # initiate FPDI
		$pdf->setSourceFile($archivo); # set the source file
		$numero_paginas = $this->numero_paginas($archivo);
		#echo $numero_paginas;
		for ($i=1; $i<= $numero_paginas; $i++) {
			$pdf->AddPage(); # add a page
			$tplId = $pdf->importPage($i); # import page i
			$page_size = $pdf->getImportedPageSize($tplId); //['orientation'];
			$width = $page_size['width'];
			$height = $page_size['height'];
			$orientation = $page_size['orientation'];
			$pdf->useTemplate($tplId, 0, 0, $width, $height, true);
			$pdf->Image('uploads/qr.jpg', 5, 5, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$pdf->SetXY(5, 23);
			$pdf->SetFont('Arial', 'B', '8');
			$pdf->Write(0, "P: ".$i." - O: ".$orientation);
		}
		$pdf->Output();
	}
	public function numero_paginas($archivo) {
		$f = $archivo;
		$stream = fopen($f, "r");
		$content = fread ($stream, filesize($f));
		if(!$stream || !$content)
			return 0;
		$count = 0;
		// Regular Expressions found by Googling (all linked to SO answers):
		$regex = "/\/Count\s+(\d+)/";
		$regex2 = "/\/Page\W*(\d+)/";
		$regex3 = "/\/N\s+(\d+)/";
		if(preg_match_all($regex, $content, $matches))
			$count = max($matches);
		return $count[0];
	}
}
