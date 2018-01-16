<?php


class Sms_many_model extends CI_Model
{

	
	
	
	public function smsfilter($grade, $section)
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student");
		
		$details = $sql->result_array();
		return $details[0];
		
		
	}
	

	
	public function getsection(){
		
		$sql = $this->db->query("SELECT DISTINCT section FROM student");
		return $sql->result_array();
		
		
	}
	
	public function getclass($fgrade, $fsection)
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student WHERE student_grade=".$this->db->escape($fgrade)." AND section=".$this->db->escape($fsection)."");
		$details = $sql->result_array();
		return $details;
		
		
		
	}

	
	


	
}

	

?>