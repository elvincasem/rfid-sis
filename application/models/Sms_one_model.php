<?php


class Sms_one_model extends CI_Model
{
public function getstudents()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student");
		return $sql->result_array();
		
		
	}
	public function displaysms($studid)
	{
		$sql = $this->db->query("SELECT * from student where dbstudid=".$this->db->escape($studid)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
		
	}
	
	
	public function sendsms($studid, $cpno, $message, $sent){
		
		$sql = "INSERT INTO sendsms(dbstudid, cpNo, message, isSent) VALUES (".$this->db->escape($studid).",".$this->db->escape($cpno).",".$this->db->escape($message).",".$this->db->escape($sent).")";
		//return $sql;
		$this->db->query($sql);
		
		//$this->db->query($result);

	}
	
	
	
	
	
}

	

?>