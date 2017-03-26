<?php 

Class Ingredient extends CI_Model
{
	function insertIngredient($data)
	{
		$stored_procedure = 'CALL insertIngredient(?, ?, ?, ?, ?)';
		return $this->db->query($stored_procedure, array('ingredient_name'=>$data['ingredient_name'], 'carbohydrates'=>$data['carbohydrates'],'protein'=>$data['protein'],'fat'=>$data['fat'],'ingredient_energy'=>$data['ingredient_energy']));
	}
	
	function getIngredients()
	{
		$this->db->select('ingredient_name, carbohydrates, protein, fat, ingredient_energy');
		$this->db->from('ingredients_view');
		$query = $this->db->get();
		return $query->result();
	}
}