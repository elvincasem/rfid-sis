<?php


class Employees_model extends CI_Model
{
	
	public function getemployeeslist()
	{
		$sql = $this->db->query("SELECT * FROM employee");
		return $sql->result_array();
		
		
	}
	
	public function saveemployee($empno,$lname,$fname,$mname,$extension,$designation)
	{
		
		$sql = "INSERT INTO employee (empNo,lname,fname,mname,ename,designation) VALUES (".$this->db->escape($empno).",".$this->db->escape($lname).",".$this->db->escape($fname).",".$this->db->escape($mname).",".$this->db->escape($extension).",".$this->db->escape($designation).")";
		$this->db->query($sql);
				
		
	}
	
	
}

?>