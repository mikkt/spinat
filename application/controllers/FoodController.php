<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class FoodController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ingredient');
	}
	
	public function insertIngredient()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('foodName', 'Toiduaine nimi', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('energy', 'Kalorid 100kcal kohta', 'trim|required|numeric');
		$this->form_validation->set_rules('carbohydrates', 'Süsivesikud', 'trim|required|numeric');
		$this->form_validation->set_rules('fat', 'Rasvad', 'trim|required|numeric');
		$this->form_validation->set_rules('protein', 'Valgud', 'trim|required|numeric');
		
		/*$ingredientData = array(
				'ingredient_name' => $this->input->post('foodName'),
				'ingredient_energy' => $this->input->post('energy'),
				'carbohydrates' => $this->input->post('carbohydrates'),
				'fat' => $this->input->post('fat'),
				'protein' => $this->input->post('protein')
		);*/
		
		/*print_r($ingredientData);
		echo '<br />';
		var_dump($this->form_validation->run());
		break;*/
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('Pages/lisa_toiduaine');
		}
		else
		{
			$ingredientData = array(
				'ingredient_name' => $this->input->post('foodName'),
				'carbohydrates' => $this->input->post('carbohydrates'),
				'fat' => $this->input->post('fat'),
				'protein' => $this->input->post('protein'),
				'ingredient_energy' => $this->input->post('energy'),
			);

			
			if ($this->Ingredient->insertIngredient($ingredientData))
			{
				redirect('Pages/toiduained');
			}
		}
	}
}