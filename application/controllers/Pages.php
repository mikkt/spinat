<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    // Prototyybi pdf lk 1; Default
    public function index()
    {
        $data['title'] = 'Pealeht';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/pealeht', $data);
        $this->load->view('templates/footer');
    }

    // Prototyybi pdf lk 3
    public function registreeru()
    {
        $data['title'] = 'Registreeru';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/registreeru', $data);
        $this->load->view('templates/footer');
    }

    // Prototyybi pdf lk 2
    public function kalender()
    {
        $data['title'] = 'Kalender';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/kalender', $data);
        $this->load->view('templates/footer');
    }

    // Prototyybi pdf lk 9
    public function lisa_toiduaine()
    {
        $data['title'] = 'Lisa toiduaine';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/lisa_toiduaine', $data);
        $this->load->view('templates/footer');
    }

    // Prototyybi pdf lk 4
    public function paev()
    {
        $data['title'] = 'Päev';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/paev', $data);
        $this->load->view('templates/footer');
    }

    // Prototyybi pdf lk 5
    public function seaded()
    {
        $data['title'] = 'Seaded';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/seaded', $data);
        $this->load->view('templates/footer');
    }
}

?>