<?php
// Määrab keele ning nav ja footer laused.
$idiom = $this->session->userdata('language');
$this->lang->load('content', $idiom);

$data['lang_logged_as'] = $this->lang->line('logged_as');
$data['lang_food_diary'] = $this->lang->line('food_diary');
$data['lang_ingredients'] = $this->lang->line('ingredients');
$data['lang_settings'] = $this->lang->line('settings');
$data['lang_logout'] = $this->lang->line('logout');
$data['title_contact'] = $this->lang->line('title_contact');

$data['lang_footer_contact'] = $this->lang->line('footer_contact');

$data['lang_username'] = $this->lang->line('username');
$data['lang_password'] = $this->lang->line('password');
$data['lang_enter_username'] = $this->lang->line('enter_username');
$data['lang_enter_password'] = $this->lang->line('enter_password');
$data['lang_login'] = $this->lang->line('login');
$data['lang_login_google'] = $this->lang->line('login_google');
$data['lang_language'] = $this->lang->line('language');