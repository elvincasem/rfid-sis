<?php


class Projects_model extends CI_Model
{
	
	public function get()
	{
		$result = $this->db->get('project');
		
		return $result->result_array();
	}
	
	public function getprojectdetails($projectid)
	{

			$result = $this->db->query("SELECT * FROM project WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}

	
	public function getprojectincompletes($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_incompletes WHERE projectid='$projectid'");
			return $result->result_array();
			
		
	}
	
	public function getprojectincompletesq($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_incompletes_q WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
		public function getprojectassembly($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_assembly WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	public function getprojectregular($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_regular WHERE projectid='$projectid'");
			return $result->result_array();
			
		
	}
	public function getprojectservices($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_services WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	public function getprojectdesign($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_design WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	public function getqualityassurance($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_qualityassurance WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	public function getpackaging($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_packaging WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	public function getnotes($projectid)
	{

			$result = $this->db->query("SELECT * FROM project_notes WHERE projectid='$projectid'");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>