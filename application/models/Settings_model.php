<?php


class Settings_model extends CI_Model
{
	
	public function articlelist()
	{
		//$result = $this->db->get('contacts');
		$list = $this->db->query("SELECT * from settings_article");
		return $list->result_array();
		
		
	}
	
	public function classificationlist()
	{
		//$result = $this->db->get('contacts');
		$list = $this->db->query("SELECT * from settings_classification");
		return $list->result_array();
		
		
	}

}

?>