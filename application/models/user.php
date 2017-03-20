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
}
