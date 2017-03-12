<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifyLogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user', '', TRUE);
	}

	function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('login', 'refresh');
		}
		else
		{
			redirect('pages');
		}
	}
	
	function check_database($password)
	{
		$username = $this->input->post('username');
		
		$result = $this->user->login($username, $password);
		
		if ($result)
		{
			$sess_array = array();
			foreach ($result as $row)
			{
				$sess_array = array(
					'user_id' => $row->user_id,
					'username' => $row->username
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Vale kasutajanimi või parool');
			return false;
		}
	}
}
