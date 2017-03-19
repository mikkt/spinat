<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['title'] = 'Spinat';
		
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
	
	/*
	Viib pages/test lehele. Leht igasuguste testimiste jaoks. Lõppversioonis peaks kustutama.
	*/
	function test()
	{
		$this->load->view('pages/test');
	}
}
