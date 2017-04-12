<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class encar extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('basic/header');
		$this->load->view('basic/nav');
		$this->load->view('basic/content');
		$this->load->view('basic/footer');
	}
}
