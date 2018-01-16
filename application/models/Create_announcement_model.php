<?php


class Create_announcement_model extends CI_Model
{

	public function getannouncement()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from sms");
		return $sql->result_array();
		
		
	}
	public function displayannounce($refno)
	{
		$sql = $this->db->query("SELECT * from sms where refNo=".$this->db->escape($refno)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
		
		
	}
	public function sendsms($dateito, $message){
		
		$sql = "INSERT INTO sms(message, msgDate) VALUES (".$this->db->escape($message).",".$this->db->escape($dateito).")";
		//return $sql;
		$this->db->query($sql);
		
		//$this->db->query($result);

	}

}

	

?>