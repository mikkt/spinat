<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->model('user');
	}
	
	function index()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[8]|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[pwdrepeat]');
		$this->form_validation->set_rules('pwdrepeat', 'Confirm Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Registreeru';
			$this->load->view('templates/header');
			$this->load->view('pages/registreeru', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$userData = array(
				'username' => $this->input->post('username'),
				'password' => MD5($this->input->post('password')),
				'email' => $this->input->post('email')
			);
		
			if ($this->user->insert($userData))
			{
				redirect('Login');
			}
		}
	}
}
		