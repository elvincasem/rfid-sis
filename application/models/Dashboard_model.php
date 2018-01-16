<?php


class Dashboard_model extends CI_Model
{
	
	public function gettotalreq()
	{
		$sql = $this->db->query("SELECT count(*) as totalrequisition from requisition_details");
		$resultarray = $sql->result_array();
		return $resultarray[0];
		
		
	}
	public function gettotalproperty()
	{
		$sql = $this->db->query("SELECT count(*) as totalproperty from equipments");
		$resultarray = $sql->result_array();
		return $resultarray[0];
		
		
	}
	public function gettotalitems()
	{
		$sql = $this->db->query("SELECT count(*) as totalitems from items");
		$resultarray = $sql->result_array();
		return $resultarray[0];
		
		
	}
	public function getlowstock()
	{
		$sql = $this->db->query("SELECT count(*) as totallow from items where inventory_qty <5");
		$resultarray = $sql->result_array();
		return $resultarray[0];
		
		
	}
	
	public function gettotalprojects()
	{

			$result = $this->db->query("SELECT count(*) as totalproj FROM project");
			$resultarray = $result->result_array();
			return $resultarray[0];
		
	}
	
	public function gettotalissuecount()
	{

			$result = $this->db->query("SELECT rp_issuetype,SUM(rp_qty) AS noofqty FROM project_regular GROUP BY rp_issuetype ORDER BY noofqty desc");
			return $result->result_array();
			
		
	}
	
	public function getyearlychart()
	{
			$current_year = date('Y');
			$result = $this->db->query("SELECT COUNT(*) AS value, MONTHNAME(requisition_date) AS label FROM requisition_details WHERE EXTRACT(YEAR FROM requisition_date)='$current_year' GROUP BY label ORDER BY EXTRACT(MONTH FROM requisition_date)");
			return $result->result_array();
			
		
	}
	
	public function gettotalresponsible()
	{

			$result = $this->db->query("SELECT rp_groupresponsible,COUNT(*) AS totalgroupcount FROM project_regular GROUP BY rp_groupresponsible ORDER BY totalgroupcount desc");
			return $result->result_array();
			
		
	}
	
	
	
}

?>