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
		
		$this->form_validation->set_rules('foodName', 'Toiduaine nimi', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('energy', 'Kalorid 100kcal kohta', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('carbohydrates', 'Süsivesikud', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('fat', 'Rasvad', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('protein', 'Valgud', 'trim|required|greater_than_equal_to[0]');
		
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
		    $foodname = $this->input->post('foodName');
		    $carbs = $this->input->post('carbohydrates');
		    $fat = $this->input->post('fat');
		    $protein = $this->input->post('protein');
		    $energy = $this->input->post('energy');

			$ingredientData = array(
				'ingredient_name' => $foodname,
				'carbohydrates' => $carbs,
				'fat' => $fat,
				'protein' => $protein,
				'ingredient_energy' => $energy,
			);


			if ($this->Ingredient->insertIngredient($ingredientData))
			{
				redirect('Pages/toiduained');
			} else {
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
		
		if ($quantity < 10000 && $quantity > 0) {
            if (empty($meal_id_arr)) {
                $this->Ingredient->createMeal($user_id, 1, $date);
                $meal_id = $this->Ingredient->getMealId($user_id, $date)[0]['meal_id'];
                $this->Ingredient->addIngredientToMeal($meal_id, $ingredient_id, $quantity);
                $this->output->set_content_type('application/json')->set_output(json_encode($ingredient_data));
            } else {
                $meal_id = $meal_id_arr[0]['meal_id'];
                $checkIngredient = $this->Ingredient->checkMealIngredient($meal_id, $ingredientName);
                if ($checkIngredient) {
                    $this->Ingredient->increaseIngredientAmount($meal_id, $ingredient_id, $quantity);
                    $response = array('ingredient_energy' => -1); // :DDDDDD workaround
                    $this->output->set_content_type('application/json')->set_output(json_encode($response));
                } else {
                    $this->Ingredient->addIngredientToMeal($meal_id, $ingredient_id, $quantity);
                    $this->output->set_content_type('application/json')->set_output(json_encode($ingredient_data));
                }
            }
        }
	}
	
	public function removeMealIngredient()
	{
		$user_id = $this->session->userdata('logged_in')["user_id"];
		$ingredientName = $this->input->get('ingredientName');
		$date = $this->input->get('date');
		$meal_id_arr = $this->Ingredient->getMealId($user_id, $date);
		$meal_id = $meal_id_arr[0]['meal_id'];
		$ingredient_id = $this->Ingredient->getIngredientId($ingredientName)[0]['ingredient_id'];
		
		if (!empty($meal_id_arr))
		{
			$this->Ingredient->removeIngredient($meal_id, $ingredient_id);
			$this->output->set_content_type('application/json')->set_output(json_encode(array('test' => 1)));
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('test' => 0)));
		}
	}
	
	public function updateMealTotal()
	{
		$user_id = $this->session->userdata('logged_in')["user_id"];
		$date = $this->input->get('date');
		$meal_id_arr = $this->Ingredient->getMealId($user_id, $date);
		$meal_id = $meal_id_arr[0]['meal_id'];
		
		$meal_total_arr = $this->Ingredient->getMealSum($meal_id);
		if (!empty($meal_total_arr)) {
			$this->output->set_content_type('application/json')->set_output(json_encode(array($meal_total_arr)));
		} else {
			$response = array('sum_amount' => -1);
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}
}