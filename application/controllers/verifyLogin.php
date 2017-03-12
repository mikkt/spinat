<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifyLogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user', '', TRUE);
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('Login', 'refresh');
		}
		else
		{
			redirect('Pages');
		}
	}
	
	public function check_database($password)
	{
		$username = $this->input->post('username');
		
		$result = $this->user->login($username, $password);
		/*var_dump($result);
		echo '<pre>';
		echo print_r($result);
		echo '</pre>';
		exit;
		*/
		if (!empty($result))
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
			return FALSE;
		}
	}
}
