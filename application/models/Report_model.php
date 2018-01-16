<?php


class Report_model extends CI_Model
{
	
	
function printlogbook($fdate){
	

					
		        $sql = $this->db->query("SELECT * FROM logbook LEFT JOIN student ON logbook.studID = student.studID WHERE DATE(DateTimeIn) = ".$this->db->escape($fdate)."");
				
				
				return $sql->result_array();
				
  
	}

function logbook(){
	

		$sql = $this->db->query("SELECT * FROM logbook LEFT JOIN student ON logbook.studID = student.studID");
		return $sql->result_array();

	}


	
}
?>