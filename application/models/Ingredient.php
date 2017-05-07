<?php 

Class Ingredient extends CI_Model
{
	function insertIngredient($data)
	{
		$stored_procedure = 'CALL insertIngredient(?, ?, ?, ?, ?)';
		return $this->db->query($stored_procedure, 
								[
									'ingredient_name'=>$data['ingredient_name'], 
									'carbohydrates'=>$data['carbohydrates'],
									'protein'=>$data['protein'],
									'fat'=>$data['fat'],
									'ingredient_energy'=>$data['ingredient_energy']
								]
								);
	}
	
	function getIngredients()
	{
		$this->db->select('ingredient_name, carbohydrates, protein, fat, ingredient_energy');
		$this->db->from('ingredients_view');
		$query = $this->db->get();
		return $query->result();
	}
	
	function getIngredientCount()
	{
		$stored_procedure = 'CALL countIngredients()';
		$query = $this->db->query($stored_procedure);
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}
	
	function getMealIngredients($meal_id)
	{
		$this->db->select('ingredient_name, amount, carbohydrates, protein, fat, ingredient_energy');
		$this->db->from('meal_ingredients_view');
		$this->db->where('meal_id', $meal_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getMealId($user_id, $date)
	{
		$this->db->select('meal_id');
		$this->db->from('meal_view');
		$this->db->where('user_id', $user_id);
		$this->db->where('meal_date', $date);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getIngredientId($ingredient_name)
	{
		$this->db->select('ingredient_id');
		$this->db->from('Ingredient');
		$this->db->where('ingredient_name', $ingredient_name);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function createMeal($user_id, $meal_type, $meal_date)
	{
		$stored_procedure = 'CALL createMeal(?, ?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $meal_type, $meal_date));
	}
	
	function addIngredientToMeal($meal_id, $ingredient_id, $amount)
	{
		$stored_procedure = 'CALL addIngredientToMeal(?, ?, ?)';
		return $this->db->query($stored_procedure, array($meal_id, $ingredient_id, $amount));
	}
	
	function getIngredientData($ingredient_name)
	{
		$this->db->select('carbohydrates, protein, fat, ingredient_energy');
		$this->db->from('ingredients_view');
		$this->db->where('ingredient_name', $ingredient_name);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function increaseIngredientAmount($meal_id, $ingredient_id, $amount)
	{
		$stored_procedure = 'CALL increaseAmount(?, ?, ?)';
		return $this->db->query($stored_procedure, array($meal_id, $ingredient_id, $amount));
	}
	
	function checkMealIngredient($meal_id, $ingredient_name)
	{
		$this->db->select('amount');
		$this->db->from('meal_ingredients_view');
		$this->db->where('meal_id', $meal_id);
		$this->db->where('ingredient_name', $ingredient_name);
		$query = $this->db->get();
		$query_arr = $query->result_array();
		
		if (empty($query_arr))
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function removeIngredient($meal_id, $ingredient_id)
	{
		$stored_procedure = 'CALL removeIngredient(?, ?)';
		return $this->db->query($stored_procedure, array($meal_id, $ingredient_id));
	}  
	
	function getMealSum($meal_id)
	{
		$this->db->select('sum_amount, sum_ingredient_energy, sum_carbohydrates, sum_protein, sum_fat');
		$this->db->from('meal_sum_view');
		$this->db->where('meal_id', $meal_id);
		
		$query = $this->db->get();
		return $query->result();
	}
}