<?php


class About_model extends CI_Model
{
	public function getsmsstatus()
	{
		$sql = $this->db->query("SELECT * from settings");
		return $sql->result_array();
		
		
	}	
	
	public function updatesmssettings($sendsms)
	{
		$sql = "update settings set enableSMS=".$this->db->escape($sendsms)."";
		$this->db->query($sql);
		
	}
	
	
	

}

	

?>