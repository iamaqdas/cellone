<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_Model');
		
	}

	public function index()
	{
		$header['pagename'] = 'Home';
		$this->load->view('templates/header',$header);
		$this->load->view('pages/index');
		$this->load->view('templates/footer');
	}
}
