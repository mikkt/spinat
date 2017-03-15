<?php 

	$this->db->select('username, email');
	$this->db->from('user');
	$this->db->where('username', 'test');
	$query = $this->db->get();
	
	foreach ($query->result() as $row) 
	{
		echo $row->username;
		echo '<br />';
		echo $row->email;
		echo '<br />';
	}
	
	echo '<hr />';
	var_dump(session_destroy());
	
