<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collections extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('collections_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['title'] = 'Collections';

		$this->load->view('templates/header', $data);
		$this->load->view('collections/collections');
		$this->load->view('templates/footer');
	}

}
