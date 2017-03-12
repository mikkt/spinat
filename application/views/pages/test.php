<?php 

	$this->db->select('username, email');
	$this->db->from('user');
	$query = $this->db->get();
	
	foreach ($query->result() as $row)
	{
		echo $row->username;
		echo $row->email;
	}
	var_dump(session_destroy());
	
