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
		
		$this->form_validation->set_rules('foodName', 'Toiduaine nimi', 'required|max_length(50)');
		$this->form_validation->set_rules('energy', 'Kalorid 100kcal kohta', 'required');
		$this->form_validation->set_rules('carbohydrates', 'Süsivesikud', 'required');
		$this->form_validation->set_rules('fat', 'Rasvad', 'required');
		$this->form_validation->set_rules('protein', 'Valgud', 'required');
		
		echo '<br />';
		var_dump($this->form_validation->run());
		break;
		if ($this->form_validation->run() == FALSE)
		{
			/*echo '<br />';
			echo 'asdasdasdasdasdadasdasdas';
			break;*/
			redirect('Pages/lisa_toiduaine');
		}
		else
		{
			$ingredientData = array(
				'ingredient_name' => $this->input->post('name'),
				'ingredient_energy' => $this->input->post('energy'),
				'carbohydrates' => $this->input->post('carbohydrates'),
				'fat' => $this->input->post('fat'),
				'protein' => $this->input->post('protein')
			);
			echo '<br />';
			print_r($ingredientData);
			break;
			
			if ($this->ingredient->insertIngredient($ingredientData))
			{
				redirect('Pages/toiduained');
			}
		}
	}
}