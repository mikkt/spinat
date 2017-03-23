<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Controller igasuguste kasutaja kontoga seotud funktsioonide jaoks (sisselogimine, väljalogimine, konto loomine, seadete muutmine jne.)
*/

Class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	
	/*
	Kasutaja sisselogimise funktsioon. Loob formi views/pealeht.php jaoks.
	*/
	public function verifyLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('Login', 'refresh');
		}
		else
		{
			redirect('Pages');
		}
	}
	
	/*
	verifyLogini poolt kasutuses olev funktsioon. Kasutab models/User.php login funktsiooni. Kui login funktsioon tagastab andmetega array, 
	siis see funktsioon lisab $_SESSION global arraysse kasutaja staatuseks 'logged_in' ning kasutaja id ja kasutajanime.
	*/
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
	
	/*
	Funktsioon uue konto loomiseks. 
	*/
	function createAccount()
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
			
			if ($this->user->insertUser($userData))
			{
				redirect('Pages');
			}
		}
	}
	
	/*
	Funktsioon kasutaja välja logimiseks. Kui kasutaja on sisse logitud ja see funktsioon callitakse,
	siis session data kustub ja kasutaja redirectitakse avalehele.
	*/
	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Pages', 'refresh');
		}
	}
}
		