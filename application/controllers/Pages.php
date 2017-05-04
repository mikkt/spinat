<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    // Pealeht. Praegu suunab lisa_toiduaine lehele, kui kalender valmis siis peaks muutma ümber et suunaks kalendri lehele.
    // See ei suuna ju kuhugile? :D
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->paev(date("Y"), date("m"), date("j"));
            /*$data['title'] = 'Lisa toiduaine';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/lisa_toiduaine', $data);
            $this->load->view('templates/footer');*/
        } else {
            $this->pealeht();

        }
    }

    public function pealeht()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('Pages');
        } else {
            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_index');
            $data['lang_welcome'] = $this->lang->line('welcome');
            $data['lang_welcome_content'] = $this->lang->line('welcome_content');
            $data['lang_title1'] = $this->lang->line('title1');
            $data['lang_title2'] = $this->lang->line('title2');
            $data['lang_title3'] = $this->lang->line('title3');
            $data['lang_content1'] = $this->lang->line('content1');
            $data['lang_content2'] = $this->lang->line('content2');
            $data['lang_content3'] = $this->lang->line('content3');
            $data['lang_not_user'] = $this->lang->line('not_user');
            $data['lang_join_now'] = $this->lang->line('join_now');

            $data['google_auth'] = $this->get_google_login();
            $data['username'] = $this->get_username();

            $this->load->helper(array('form'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_guest');
            $this->load->view('pages/pealeht', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function registreeru()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('Pages');
        } else {
            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_register');
            $data['lang_text_header'] = $this->lang->line('text_header');
            $data['lang_text_content'] = $this->lang->line('text_content');
            $data['lang_repeat_password'] = $this->lang->line('repeat_password');

            $data['google_auth'] = $this->get_google_login();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_guest');
            $this->load->view('pages/registreeru', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // Prototyybi pdf lk 2
    public function kalender()
    {
        if ($this->session->userdata('logged_in')) {
            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_calendar');

            // Kalender
            $data['day'] = date("d");
            $data['month'] = date("F");

            // Kalendri loomine
            $prefs = array(
                'start_day' => 'monday',
                'month_type' => 'long',
                'day_type' => 'long',
            );

            $site = site_url('pages/paev');
            $prefs['template'] = array(
                'table_open' => '<table border="1" class="table table-bordered">',
                'cal_cell_start' => '<td>',
                'cal_cell_no_content' => '<h4><a href="' . $site . '/' . date("Y") . '/' . date("m") . '/{day}">{day}</a></h4>',
                'cal_cell_end' => '</td>',
                'cal_cell_start_today' => '<td class="info">',
                'cal_cell_no_content_today' => '<h4><strong><a href="' . $site . '/' . date("Y") . '/' . date("m") . '/{day}">{day}</a></strong></h4>',
                'cal_cell_end_today' => '</td>',
                'heading_title_cell' => '<th colspan="{colspan}"><h3>{heading}</h3></th>'
            );

            $this->load->library('calendar', $prefs);
            $this->lang->load('calendar', $this->session->userdata('language'));
            $data['kalender'] = $this->calendar->generate();

            $data['username'] = $this->get_username();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/kalender', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('Pages');
        }
    }

    // Prototyybi pdf lk 9; Peaks tegema uue view toiduainete otsimiseks nagu prototüübi viimasel lehel näha.
    public function lisa_toiduaine()
    {
        if ($this->session->userdata('logged_in')) {
            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_add_ingredient');
            $data['lang_name'] = $this->lang->line('name');
            $data['lang_quantity'] = $this->lang->line('quantity');
            $data['lang_calories'] = $this->lang->line('calories');
            $data['lang_carbs'] = $this->lang->line('carbs');
            $data['lang_fats'] = $this->lang->line('fats');
            $data['lang_proteins'] = $this->lang->line('proteins');
            $data['lang_add_ingredient'] = $this->lang->line('add_ingredient');
            $data['lang_cancel'] = $this->lang->line('cancel');

            $data['username'] = $this->get_username();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/lisa_toiduaine', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function toiduained()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('Ingredient'); //Laeb Ingredient modeli
            $this->data['ingredients'] = $this->Ingredient->getIngredients(); //Kasutab Ingredients modeli getIngredients funktsiooni et andmebaasist toiduained kätte saada
            $this->data['ingredientCount'] = $this->Ingredient->getIngredientCount(); //Kasutab Ingredients modeli getIngredientCount funktsiooni et saada andmebaasist toiduainete count

            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_ingredients');
            $data['lang_name'] = $this->lang->line('name');
            $data['lang_quantity'] = $this->lang->line('quantity');
            $data['lang_calories'] = $this->lang->line('calories');
            $data['lang_carbs'] = $this->lang->line('carbs');
            $data['lang_fats'] = $this->lang->line('fats');
            $data['lang_proteins'] = $this->lang->line('proteins');
            $data['lang_ingredient_db'] = $this->lang->line('ingredient_db');
            $data['lang_search_ingredient'] = $this->lang->line('search_ingredient');
            $data['lang_search_help'] = $this->lang->line('search_help');
            $data['lang_new_ingredient'] = $this->lang->line('new_ingredient');
            $data['lang_different_ingredients'] = $this->lang->line('different_ingredients');

            $data['username'] = $this->get_username();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/toiduained', $this->data); //Passib toiduainete data edasi viewile
            $this->load->view('templates/footer', $data);
        }
    }

    // Prototyybi pdf lk 4
    public function paev($year, $month, $day)
    {
        if ($this->session->userdata('logged_in') && $year && $month && $day) {
            $this->load->library('calendar');
            $this->lang->load('calendar', $this->session->userdata('language'));
            $this->load->helper('date');

            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_day');
            $data['lang_back'] = $this->lang->line('back_to_calendar');
            $data['lang_dinner'] = $this->lang->line('dinner');
            $data['lang_breakfast'] = $this->lang->line('breakfast');
            $data['lang_supper'] = $this->lang->line('supper');
            $data['lang_snacks'] = $this->lang->line('snacks');
            $data['lang_name'] = $this->lang->line('name');
            $data['lang_quantity'] = $this->lang->line('quantity');
            $data['lang_calories'] = $this->lang->line('calories');
            $data['lang_carbs'] = $this->lang->line('carbs');
            $data['lang_fats'] = $this->lang->line('fats');
            $data['lang_proteins'] = $this->lang->line('proteins');
            $data['lang_ingredient_db'] = $this->lang->line('ingredient_db');
            $data['lang_search_ingredient'] = $this->lang->line('search_ingredient');
            $data['lang_search_help'] = $this->lang->line('search_help');
            $data['lang_add_to_menu'] = $this->lang->line('add_to_menu');
            $data['lang_new_ingredient'] = $this->lang->line('new_ingredient');
            $data['lang_today'] = $this->lang->line('today');
			$data['lang_remove_ingredient'] = $this->lang->line('remove_ingredient');


            // kalender
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
			

            $data['username'] = $this->get_username();
			
			/*
			Toidukorra osa
			*/
			
			// Fetchib andmebaasist toidukorra id
			$user_id = $this->session->userdata('logged_in')["user_id"];
			$date = $year . "-" . $month . "-" . $day;
			$meal_id_arr = $this->Ingredient->getMealId($user_id, $date);
			
			if ($meal_id_arr)
			{
				$meal_id = $meal_id_arr[0]['meal_id'];
				// Kasutab toidukorra id-d et fetchida andmebaasist selle id-ga toidukorda kuuluvad ingredientid
				$this->data['meal_ingredients'] = $this->Ingredient->getMealIngredients($meal_id);
			}
			else
			{
				// Kui andmebaasist tulev vastus on tühi, siis annab edasi tühja array kuvamiseks
				$this->data['meal_ingredients'] = array();
			}
			
			
			
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/paev', $this->data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('Pages');

        }

    }

    // Prototyybi pdf lk 5
    public function seaded()
    {
        if ($this->session->userdata('logged_in')) {
            // keel
            require_once 'Import_lang.php';
            $data['title'] = $this->lang->line('title_settings');
            $data['lang_save'] = $this->lang->line('save');
            $data['lang_account_settings'] = $this->lang->line('account_settings');
            $data['lang_diet_settings'] = $this->lang->line('diet_settings');
            $data['lang_current_email'] = $this->lang->line('current_email');
            $data['lang_new_email'] = $this->lang->line('new_email');
            $data['lang_current_password'] = $this->lang->line('current_password');
            $data['lang_new_password'] = $this->lang->line('new_password');
            $data['lang_repeat_password'] = $this->lang->line('repeat_password');
            $data['lang_age'] = $this->lang->line('age');
            $data['lang_change_age'] = $this->lang->line('change_age');
            $data['lang_goal'] = $this->lang->line('goal');
            $data['lang_change_goal'] = $this->lang->line('change_goal');
            $data['lang_height'] = $this->lang->line('height');
            $data['lang_change_height'] = $this->lang->line('change_height');
            $data['lang_weight'] = $this->lang->line('weight');
            $data['lang_change_weight'] = $this->lang->line('change_weight');

            $data['username'] = $this->get_username();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav_user');
            $this->load->view('pages/seaded', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('Pages');
        }
    }

    public function kontakt()
    {
        $this->load->library('googlemaps');

        $config = array();
        $config['zoom'] = '17';
        $config['center'] = "Liivi 2, tartu,estonia";

        $marker = array();
        $marker['position'] = "Liivi 2, tartu,estonia";
        $marker['infowindow_content'] = "Spinat!";
        $this->googlemaps->add_marker($marker);

        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();

        // keel
        require_once 'Import_lang.php';
        $data['title'] = $this->lang->line('title_contact');
        $data['lang_information'] = $this->lang->line('information');
        $data['lang_map'] = $this->lang->line('map');


        $data['username'] = $this->get_username();
        $data['google_auth'] = $this->get_google_login(); # Kui maps ei lae siis võib olla midagi sellega seoses.

        $this->load->view('templates/header', $data);

        if ($this->session->userdata('logged_in')) {
            $this->load->view('templates/nav_user');
        } else {
            $this->load->view('templates/nav_guest');
        }

        $this->load->view('pages/kontakt', $data);
        $this->load->view('templates/footer', $data);
    }

    public function setLang($lang) {
        if ($lang == 'estonian') {
            $this->session->unset_userdata('language');
            $this->session->set_userdata('language', 'estonian');
        } else {
            $this->session->unset_userdata('language');
            $this->session->set_userdata('language', 'english');
        }
        redirect('Pages');
    }

    /*
    Viib pages/test lehele. Leht igasuguste testimiste jaoks. Lõppversioonis peaks kustutama.
    */
    function test()
    {
        $this->load->view('pages/test');
    }

    private function get_username()
    {
        if (isset($this->session->userdata('logged_in')["is_google"]) && $this->session->userdata('logged_in')["is_google"]) {
            $username = $this->session->userdata('logged_in')["username"];
            $username .= "[Google]";
        } else {
            $username = $this->session->userdata('logged_in')["username"];
        }
        return $username;
    }

    # Kasutaja Googlega logimise jaoks.
    private function get_google_login()
    {
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
        require_once 'Import_lang.php';
        # Kas on logitud
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
            #$me = $plus->people->get('me');

            // Nimi ja email
            #$name = $me->getDisplayName();
            #$email = $me->getEmails()[0]->value;

            # See ei tohiks juhtuda. Kui see osa if-st tööle läheb siis on midagi valesti.
            $logout_link = site_url('UserController/logout');
            return $data['google_auth'] = '<a href="' . $logout_link . '" class="btn btn-primary">' . $this->lang->line('logout') . '</a>';
        } else {
            $authUrl = $client->createAuthUrl();
            return '<a href="' . $authUrl . '" class="btn btn-primary">' . $this->lang->line('login_google') . '</a>';
        }
    }
}
