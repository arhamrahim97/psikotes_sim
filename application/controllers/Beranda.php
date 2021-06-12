<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/pengusul/header_beranda');
		$this->load->view('page/pengusul/beranda');
		$this->load->view('templates/pengusul/footer_beranda');
	}
}
