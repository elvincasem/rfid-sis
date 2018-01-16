<?php


class Registration_model extends CI_Model
{


	public function getregistrations()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student, registration WHERE student.rfID = registration.rfID");
		return $sql->result_array();
		
		
	}
	public function editregistration($studid)
	{
		$sql = $this->db->query("SELECT * from student, registration where student.rfID = registration.rfID AND  student.dbstudid=".$this->db->escape($studid)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
		
		
	}
	public function updateregistration($rfid, $regdate, $yrlvl, $section, $sy){
		
		$sql = "update registration set regDate=".$this->db->escape($regdate).", yrLevel=".$this->db->escape($yrlvl).", section=".$this->db->escape($section).", sy=".$this->db->escape($sy)." where rfID=".$this->db->escape($rfid)."";
		$this->db->query($sql);
	}


	
	
	
	
}

?>