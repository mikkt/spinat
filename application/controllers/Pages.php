<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
		
    // Pealeht. Praegu suunab lisa_toiduaine lehele, kui kalender valmis siis peaks muutma ümber et suunaks kalendri lehele.
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
            $this->pealeht();

        }
    }
    public function pealeht()
    {
        if($this->session->userdata('logged_in'))
        {
            redirect('Pages');
        }else{

            $data['title'] = 'Spinat';

            $this->load->helper(array('form'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_default');
            $this->load->view('pages/pealeht', $data);
            $this->load->view('templates/footer');
        }
    }

    public function registreeru()
    {
        if($this->session->userdata('logged_in'))
        {
            redirect('Pages');
        }else {
            $data['title'] = 'Registreeru';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_default');
            $this->load->view('pages/registreeru', $data);
            $this->load->view('templates/footer');
        }
    }

    // Prototyybi pdf lk 2
    public function kalender()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Kalender';

			$this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_loggedin');
            $this->load->view('pages/kalender', $data);
			$this->load->view('templates/footer');
		}
		else{
		    redirect('Pages');
        }
    }

    // Prototyybi pdf lk 9; Peaks tegema uue view toiduainete otsimiseks nagu prototüübi viimasel lehel näha.
    public function lisa_toiduaine()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Lisa toiduaine';

			$this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_loggedin');
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
			$this->load->view('templates/navbar_loggedin');
			$this->load->view('pages/paev', $data);
			$this->load->view('templates/footer');
		}else{
            redirect('Pages');

        }

    }

    // Prototyybi pdf lk 5
    public function seaded()
    {
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Seaded';

			$this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_loggedin');
			$this->load->view('pages/seaded', $data);
			$this->load->view('templates/footer');
		}
		else{
            redirect('Pages');
        }
    }

    public function kontakt()
    {
        $this->load->library('googlemaps');

        $config=array();
        $config['zoom']='17';
        $config['center']="Liivi 2, tartu,estonia";

        $marker=array();
        $marker['position']= "Liivi 2, tartu,estonia";
        $this->googlemaps->add_marker($marker);

        $this->googlemaps->initialize($config);
        $data['map']=$this->googlemaps->create_map();

        $data['title'] = 'Kontakt';

        $this->load->view('templates/header', $data);

        if($this->session->userdata('logged_in'))
        {
            $this->load->view('templates/navbar_loggedin');
        }else{
            $this->load->view('templates/navbar_default');
        }

        $this->load->view('pages/kontakt', $data);
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
