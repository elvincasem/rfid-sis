<?php


class Login_model extends CI_Model
{
	
	public function get($username,$password)
	{
		//$result = $this->db->get('contacts');
		$contacts = $this->db->query("");
		return $contacts->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
	}
	

	public function insert()
	{
			
	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
}

?>