<?php


class Rfid_model extends CI_Model
{
	
	public function details($rfid)
	{
		$sql = $this->db->query("SELECT * from student where rfID=".$this->db->escape($rfid)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
	}
	
	

	
	public function studentlog($rfid1)
	{
			
		$sql1 = $this->db->query("SELECT * from student where rfID=".$this->db->escape($rfid1)."");
		$singlerow = $sql1->result_array();
		$studid = $singlerow[0]['studID'];
		
		
		$sql = "INSERT INTO logbook(rfID, studID) VALUES (".$this->db->escape($rfid1).",".$this->db->escape($studid).")";
		$this->db->query($sql);
		//return $sql;
		//$this->db->query($result);

	}
	
		public function studentlog2($rfid2, $studid2, $sent2){
		
		$sql = "INSERT INTO logbook(rfID, studID, isSent) VALUES (".$this->db->escape($rfid2).",".$this->db->escape($studid2).",".$this->db->escape($sent2).")";
		$this->db->query($sql);
		//return $sql;
		
		
		//$this->db->query($result);

	}

	public function getsmssettings(){
		
		$query = $this->db->get('settings');
		return $query->result_array();
		

	}

	public function getstudenttosms($rfid){
		
		$query = $this->db->get_where('student', array('rfID' => $rfid));
		return $query->result_array();
		

	}


	
}

?>