<?php


class Customreport_model extends CI_Model
{
	
	public function getcustomreport()
	{
		$sql = $this->db->query("SELECT * FROM settings_report");
		return $sql->result_array();
		
		
	}
	

	
	public function getsinglefooter($footerid)
	{
		$sql2 = $this->db->query("SELECT * FROM settings_report where footerid=$footerid");
		
		$result = $sql2->result_array();
		return $result[0];
		
		
	}
	
	public function updatefooter($footerid,$content){
		
		$sql = "update settings_report set content=".$this->db->escape($content)." where footerid=".$this->db->escape($footerid)."";
		//echo $sql;
		$this->db->query($sql);
	}
	
	
}

?>