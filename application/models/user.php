<?php 

/*
Siia klassi lähevad kõik funktsioonid mis pöörduvad andmebaasi User tabeli poole.
*/
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->select('user_id, username, password');
		// Kasutab nüüd andmebaasi view'd
		$this->db->from('user_login_view');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function insertUser($data)
	{
		// Kasutab andmebaasi insertUser proceduret
		$stored_procedure = 'CALL insertUser(?,?,?)';
		return $this->db->query($stored_procedure, array('i_username'=>$data['username'], 'i_password'=>$data['password'], 'i_email'=>$data['email']));
	}
	
	function changeEmail($user_id, $email)
	{
		$stored_procedure = 'CALL changeEmail(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $email));
	}
	
	function getEmail($user_id)
	{
		$this->db->select('email');
		$this->db->from('email_view');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function changePassword($user_id, $password)
	{
		$stored_procedure = 'CALL changePassword(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $password));
	}
	
	function checkPassword($user_id, $password)
	{
		$this->db->select('username');
		$this->db->from('user_login_view');
		$this->db->where('user_id', $user_id);
		$this->db->where('password', $password);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function changeAge($user_id, $age)
	{
		$stored_procedure = 'CALL changeAge(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $age));
	}
	
	function getAge($user_id)
	{
		$this->db->select('age');
		$this->db->from('user_data_view');
		$this->db->where('user_id', $user_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function changeHeight($user_id, $height)
	{
		$stored_procedure = 'CALL changeHeight(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $height));
	}
	
	function getHeight($user_id)
	{
		$this->db->select('height');
		$this->db->from('user_data_view');
		$this->db->where('user_id', $user_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function changeWeight($user_id, $weight)
	{
		$stored_procedure = 'CALL changeWeight(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $weight));
	}
	
	function getWeight($user_id)
	{
		$this->db->select('weight');
		$this->db->from('user_data_view');
		$this->db->where('user_id', $user_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function changeWeightGoal($user_id, $goal)
	{
		$stored_procedure = 'CALL changeWeightGoal(?, ?)';
		return $this->db->query($stored_procedure, array($user_id, $goal));
	}
	
	function getWeightGoal($user_id)
	{
		$this->db->select('weight_goal');
		$this->db->from('user_data_view');
		$this->db->where('user_id', $user_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
}
