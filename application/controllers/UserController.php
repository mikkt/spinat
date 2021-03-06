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
        // Google auth
        $this->load->library('Googleplus');
        $CLIENT_ID = '561474587766-j2qniuago771cri440rb8us4thq32gf2.apps.googleusercontent.com';
        $CLIENT_SECRET = 'qzhnzh7Nc3b6tBcKT8cDEoIE';
        $APPLICATION_NAME = "Spinat";

        $client = new Google_Client();
        $client->setApplicationName($APPLICATION_NAME);
        $client->setClientId($CLIENT_ID);
        $client->setClientSecret($CLIENT_SECRET);
        $client->setRedirectUri('http://localhost/index.php/UserController/verifyLogin/');
        $client->setScopes('email');

        $plus = new Google_Service_Plus($client);

        # $_GET['code'] on Googlega logimise puhul.
        if(isset($_GET['code'])){
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();

            $me = $plus->people->get('me');

            #$name = $me->getDisplayName();
            #$email = $me->getEmails()[0]->value;
            $sess_array = array(
                'user_id' => $_GET['code'],
                'username' => $me->getDisplayName(),
                'is_google' => True,
            );
            $this->session->set_userdata('logged_in', $sess_array);
            //$this->session->set_userdata('language', 'estonian');

            redirect('Pages');
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

            if($this->form_validation->run() == FALSE)
            {
				$this->session->set_flashdata('errors', validation_errors());
                redirect('Pages', 'refresh');
            }
            else
            {
                redirect('Pages');
            }
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
					'username' => $row->username,
                    'is_google' => False,
				);
				$this->session->set_userdata('logged_in', $sess_array);
                //$this->session->set_userdata('language', 'estonian');
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
		
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['username'] = $username;
			$data['email'] = $email;
			$data['title'] = 'Registreeru';
			require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_register');
            $data['lang_text_header'] = $this->lang->line('text_header');
            $data['lang_text_content'] = $this->lang->line('text_content');
            $data['lang_repeat_password'] = $this->lang->line('repeat_password');
			$this->load->view('templates/header',$data);
            $this->load->view('templates/nav_guest');
            $this->load->view('pages/registreeru', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$userData = array(
				'username' => $username,
				'password' => MD5($this->input->post('password')),
				'email' => $email
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
	// http://localhost/spinat/index.php/UserController/logout
	public function logout()
	{
        $_REQUEST["logout"] = "t";

		if($this->session->userdata('logged_in'))
		{
            $this->session->unset_userdata('logged_in');
            //$this->session->unset_userdata('language');
            session_destroy();
            // Kui directib lihtsalt välja, siis keel läheb config['lang'] peale. Nüüd redirectib logout->setlang(hetke_keel)->pealeht
            if ($this->session->userdata('language'))
    		    redirect('Pages/setLang/' . $this->session->userdata('language'), 'refresh');
            else
                redirect('Pages', 'refresh');
		}
        if(isset($_REQUEST['logout'])){

            session_unset();
            redirect('Pages', 'refresh');
        }
	}
	
	public function changeEmail()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_email', 'E-mail', 'trim|required|min_length[8]|max_length[50]');
		$email = $this->input->post('new_email');
		$user_id = $this->session->userdata('logged_in')["user_id"];
		
		if ($this->form_validation->run())
		{
			$this->user->changeEmail($user_id, $email);
			redirect('Pages/seaded');
			
		} else {
			redirect('Pages/seaded');
		}
	}
	
	public function changePassword()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('current_password', 'Current password', 'trim|required');
		$this->form_validation->set_rules('new_password', 'New password', 'trim|required|matches[new_password_repeat]');
		$this->form_validation->set_rules('new_password_repeat', 'Confirm new password', 'trim|required');
		
		$current_password = MD5($this->input->post('current_password'));
		$user_id = $this->session->userdata('logged_in')["user_id"];
		
		if ($this->form_validation->run())
		{
			$pwarray = $this->user->checkPassword($user_id, $current_password);
			if (!empty($pwarray))
			{
			    $newPasswordLen = strlen($this->input->post('new_password'));
				$new_password = MD5($this->input->post('new_password'));
				$confirm_password = MD5($this->input->post('new_password_repeat'));
				if ($newPasswordLen >= 8) {
                    $this->user->changePassword($user_id, $new_password);
                    redirect('Pages/seaded');
                } else {
                    redirect('Pages/seaded');
                }
			}
		} else {
			redirect('Pages/seaded');
		}
	}
	
	/*
	 *	Toitumise seadete muutmine kokku.
	 */
	 
	 public function changeSettings()
	 {
		$this->load->library('form_validation');
		 
		$this->form_validation->set_rules('new_height', 'Height', 'trim|numeric');
		$this->form_validation->set_rules('new_weight', 'Weight', 'trim|numeric');
		$this->form_validation->set_rules('new_weight', 'Weight', 'trim|numeric');
		$this->form_validation->set_rules('new_goal', 'Weight goal', 'trim|numeric');
		 
		$age = $this->input->post('new_age');
		$height = $this->input->post('new_height');
		$weight = $this->input->post('new_weight');
		$goal = $this->input->post('new_goal');
		
		$user_id = $this->session->userdata('logged_in')["user_id"];
		
		if ($this->form_validation->run()) {
			
			if ($age < 120 && $age > 0) {
				$this->user->changeAge($user_id, $age);
			}
			if ($height < 250 && $height > 50) {
				$this->user->changeHeight($user_id, $height);
			}
			if ($weight < 500 && $weight > 20) {
				$this->user->changeWeight($user_id, $weight);
			}
			if ($goal < 500 && $goal > 20) {
				$this->user->changeWeightGoal($user_id, $goal);
			}
			redirect('Pages/seaded');
		} else {
			redirect('Pages/seaded');
		}
	 }
/*	
	public function changeAge()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_age', 'Age', 'trim|required|numeric');
		$age = $this->input->post('new_age');

		if ($age < 120 && $age > 0) {
            $user_id = $this->session->userdata('logged_in')["user_id"];

            if ($this->form_validation->run()) {
                $this->user->changeAge($user_id, $age);
                redirect('Pages/seaded');
            } else {
                redirect('Pages/seaded');
            }
        } else {
            redirect('Pages/seaded');
        }
	}
	
	public function changeHeight()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_height', 'Height', 'trim|required|numeric');
		$height = $this->input->post('new_height');

		if ($height < 250 && $height > 50){
            $user_id = $this->session->userdata('logged_in')["user_id"];

            if ($this->form_validation->run())
            {
                $this->user->changeHeight($user_id, $height);
                redirect('Pages/seaded');
            } else {
                redirect('Pages/seaded');
            }
        } else {
            redirect('Pages/seaded');
        }
	}
	
	public function changeWeight()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_weight', 'Weight', 'trim|required|numeric');
		$weight = $this->input->post('new_weight');

		if ($weight < 500 && $weight > 20){
            $user_id = $this->session->userdata('logged_in')["user_id"];

            if ($this->form_validation->run())
            {
                $this->user->changeWeight($user_id, $weight);
                redirect('Pages/seaded');
            } else {
                redirect('Pages/seaded');
            }
        } else {
            redirect('Pages/seaded');
        }
	}
	
	public function changeWeightGoal()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_goal', 'Weight goal', 'trim|required|numeric');
		$goal = $this->input->post('new_goal');

		if ($goal < 500 && $goal > 20) {
            $user_id = $this->session->userdata('logged_in')["user_id"];

            if ($this->form_validation->run())
            {
                $this->user->changeWeightGoal($user_id, $goal);
                redirect('Pages/seaded');
            } else {
                redirect('Pages/seaded');
            }
        } else {
            redirect('Pages/seaded');
        }
	}
	*/
}
		