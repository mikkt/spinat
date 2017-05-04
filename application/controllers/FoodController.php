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
	
	public function addMealIngredient()
	{

		$user_id = $this->session->userdata('logged_in')["user_id"];
		$ingredientName = $this->input->get('ingredientName');
		$quantity = $this->input->get('quantity');
		$date = $this->input->get('date');
		$meal_id_arr = $this->Ingredient->getMealId($user_id, $date);
		$ingredient_id = $this->Ingredient->getIngredientId($ingredientName)[0]['ingredient_id'];
		
		$ingredient_data = $this->Ingredient->getIngredientData($ingredientName);
		
		
		if (empty($meal_id_arr)) 
		{
			$this->Ingredient->createMeal($user_id, 1, $date);
			$meal_id = $this->Ingredient->getMealId($user_id, $date)[0]['meal_id'];
			$this->Ingredient->addIngredientToMeal($meal_id, $ingredient_id, $quantity);
			$this->output->set_content_type('application/json')->set_output(json_encode($ingredient_data));
		} else {
			$meal_id = $meal_id_arr[0]['meal_id'];
			$checkIngredient = $this->Ingredient->checkMealIngredient($meal_id, $ingredientName);
			if ($checkIngredient)
			{
				$this->Ingredient->increaseIngredientAmount($meal_id, $ingredient_id, $quantity);
			} else {
				$this->Ingredient->addIngredientToMeal($meal_id, $ingredient_id, $quantity);
				$this->output->set_content_type('application/json')->set_output(json_encode($ingredient_data));
			}
		}
		
	}
}