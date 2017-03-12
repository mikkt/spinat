<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = 'Pealeht';
		
		$this->load->helper(array('form'));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/pealeht', $data);
		$this->load->view('templates/footer');
	}
	
	public function registreeru()
    {
        $data['title'] = 'Registreeru';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/registreeru', $data);
        $this->load->view('templates/footer');
    }
	
	function test()
	{
		$this->load->view('pages/test');
	}
}
