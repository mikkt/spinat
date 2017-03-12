<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
		
    // Prototyybi pdf lk 1; Default
    public function index()
    {
        
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['title'] = 'Lisa toiduaine';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/lisa_toiduaine', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('Login', 'refresh');
		}
    }

    // Prototyybi pdf lk 3
    /*public function registreeru()
    {
        $data['title'] = 'Registreeru';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/registreeru', $data);
        $this->load->view('templates/footer');
    }*/

    // Prototyybi pdf lk 2
    public function kalender()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Kalender';

			$this->load->view('templates/header', $data);
			$this->load->view('pages/kalender', $data);
			$this->load->view('templates/footer');
		}
    }

    // Prototyybi pdf lk 9
    public function lisa_toiduaine()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Lisa toiduaine';

			$this->load->view('templates/header', $data);
			$this->load->view('pages/lisa_toiduaine', $data);
			$this->load->view('templates/footer');
		}
    }

    // Prototyybi pdf lk 4
    public function paev()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Päev';

			$this->load->view('templates/header', $data);
			$this->load->view('pages/paev', $data);
			$this->load->view('templates/footer');
		}
    }

    // Prototyybi pdf lk 5
    public function seaded()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Seaded';

			$this->load->view('templates/header', $data);
			$this->load->view('pages/seaded', $data);
			$this->load->view('templates/footer');
		}
    }
		
	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
		}
	}
}

?>