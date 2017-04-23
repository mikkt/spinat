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
		$this->db->from('ingredient');
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
}