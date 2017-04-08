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
            $this->paev(date("Y"), date("m"), date("j"));
            /*$data['title'] = 'Lisa toiduaine';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/lisa_toiduaine', $data);
            $this->load->view('templates/footer');*/
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

            $data['google_auth'] = $this->get_google_login();
            $data['username'] = $this->get_username();

            $this->load->helper(array('form'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_guest');
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
            $data['google_auth'] = $this->get_google_login();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_guest');
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
            $data['day'] = date("d");
            $data['month'] = date("F");

            // Kalendri loomine
            $prefs = array(
                'start_day'         => 'monday',
                'month_type'        => 'long',
                'day_type'          => 'long',
            );

            $site = site_url('pages/paev');
            $prefs['template'] = array(
                'table_open'                => '<table border="1" class="table table-bordered">',
                'cal_cell_start'            => '<td>',
                'cal_cell_no_content'       => '<h4><a href="' . $site . '/' . date("Y") . '/' . date("m") . '/{day}">{day}</a></h4>',
                'cal_cell_end'              => '</td>',
                'cal_cell_start_today'      => '<td class="info">',
                'cal_cell_no_content_today' => '<h4><strong><a href="' . $site . '/' . date("Y") . '/' . date("m") . '/{day}">{day}</a></strong></h4>',
                'cal_cell_end_today'        => '</td>',
                'heading_title_cell'        => '<th colspan="{colspan}"><h3>{heading}</h3></th>'
            );

            $this->load->library('calendar', $prefs);
            $data['kalender'] = $this->calendar->generate( );

            $data['username'] = $this->get_username();

			$this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
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
            $data['username'] = $this->get_username();

			$this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/lisa_toiduaine', $data);
			$this->load->view('templates/footer');
		}
    }
	
	public function toiduained()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('Ingredient'); //Laeb Ingredient modeli
			$this->data['ingredients'] = $this->Ingredient->getIngredients(); //Kasutab Ingredients modeli getIngredients funktsiooni et andmebaasist toiduained kätte saada
			$this->data['ingredientCount'] = $this->Ingredient->getIngredientCount(); //Kasutab Ingredients modeli getIngredientCount funktsiooni et saada andmebaasist toiduainete count

			$data['title'] = 'Toiduained';
            $data['username'] = $this->get_username();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav_user');
			$this->load->view('pages/toiduained', $this->data); //Passib toiduainete data edasi viewile
			$this->load->view('templates/footer');
		}
	}

    // Prototyybi pdf lk 4
    public function paev($year, $month, $day)
    {
		if($this->session->userdata('logged_in') && $year && $month && $day)
		{
            $this->load->library('calendar');
            $this->load->helper('date');

			$data['title'] = 'Päev';

            $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
            $time = time();

            if (date('Ymd') == date('Ymd', strtotime($year . $month . $day))) {
                $data['is_today'] = True;
            } else {
                $data['is_today'] = False;
            }

			#$data['today'] = $this->calendar->get_day_names('long')[0];
			$data['today'] = mdate('%l', $time);
            $data['year'] = $year;
            $data['month'] = $this->calendar->get_month_name($month);
            $data['day'] = $day;

            // Toiduainete otsing
            $this->load->model('Ingredient'); //Laeb Ingredient modeli
            $this->data['ingredients'] = $this->Ingredient->getIngredients(); //Kasutab Ingredients modeli getIngredients funktsiooni et andmebaasist toiduained kätte saada
            $this->data['ingredientCount'] = $this->Ingredient->getIngredientCount(); //Kasutab Ingredients modeli getIngredientCount funktsiooni et saada andmebaasist toiduainete count


            $data['username'] = $this->get_username();

			$this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
			$this->load->view('pages/paev', $this->data);
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
            $data['username'] = $this->get_username();

			$this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
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
		$marker['infowindow_content']= "Spinat!";
        $this->googlemaps->add_marker($marker);
							
        $this->googlemaps->initialize($config);
        $data['map']=$this->googlemaps->create_map();

        $data['title'] = 'Kontakt';
        $data['username'] = $this->get_username();
        $data['google_auth'] = $this->get_google_login(); # Kui maps ei lae siis võib olla midagi sellega seoses.

        $this->load->view('templates/header', $data);

        if($this->session->userdata('logged_in'))
        {
            $this->load->view('templates/nav_user');
        }else{
            $this->load->view('templates/nav_guest');
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

    private function get_username() {
        if (isset($this->session->userdata('logged_in')["is_google"]) && $this->session->userdata('logged_in')["is_google"]) {
            $username = $this->session->userdata('logged_in')["username"];
            $username .= "[Google]";
        } else {
            $username = $this->session->userdata('logged_in')["username"];
        }
        return $username;
    }

    # Kasutaja Googlega logimise jaoks.
    private function get_google_login() {
        $this->load->library('Googleplus');
        $CLIENT_ID = '561474587766-j2qniuago771cri440rb8us4thq32gf2.apps.googleusercontent.com';
        $CLIENT_SECRET = 'qzhnzh7Nc3b6tBcKT8cDEoIE';
        $APPLICATION_NAME = "Spinat";

        $client = new Google_Client();
        $client->setApplicationName($APPLICATION_NAME);
        $client->setClientId($CLIENT_ID);
        $client->setClientSecret($CLIENT_SECRET);
        $client->setRedirectUri('http://localhost/spinat/index.php/UserController/verifyLogin/');
        $client->setScopes('email');

        $plus = new Google_Service_Plus($client);

        # Kas on logitud
        if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
            #$me = $plus->people->get('me');

            // Nimi ja email
            #$name = $me->getDisplayName();
            #$email = $me->getEmails()[0]->value;

            # See ei tohiks juhtuda. Kui see osa if-st tööle läheb siis on midagi valesti.
            $logout_link = site_url('UserController/logout');
            return $data['google_auth'] = '<a href="' . $logout_link . '" class="btn btn-primary">Logi välja?</a>';
        } else {
            $authUrl = $client->createAuthUrl();
            return '<a href="' . $authUrl . '" class="btn btn-primary">Logi Googlega</a>';
        }
    }
}
