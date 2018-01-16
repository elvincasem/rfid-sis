<?php


class Apr_model extends CI_Model
{
	
	public function get()
	{
		$users = $this->db->query("SELECT * from purchase_apr");
		return $users->result_array();
		
		
	}
	
	public function getaprmaindetails($id)
	{
		$sql = $this->db->query("SELECT * from purchase_apr where aprid='$id'");
		$aprmain = $sql->result_array();
		return $aprmain[0];
	}
	
	public function saveapr($aprdate,$aprno)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO purchase_apr (aprdate,aprno,addedby) VALUES (".$this->db->escape($aprdate).", ".$this->db->escape($aprno).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(aprid) AS lastid FROM purchase_apr");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
		
	}
	
	public function getitemlist()
	{
		$itemlist = $this->db->query("SELECT * from items");
		return $itemlist->result_array();
		
		
	}
	
	public function saveapritem($itemid,$aprid,$description,$itemqty,$unit,$unitcost)
	{
		
		$sql = "INSERT INTO purchase_apr_items (itemid,aprid,description,qty,unit,unitprice) VALUES (".$this->db->escape($itemid).",".$this->db->escape($aprid).",".$this->db->escape($description).",".$this->db->escape($itemqty).",".$this->db->escape($unit).",".$this->db->escape($unitcost).")";
		$this->db->query($sql);
				
		
	}
	
	public function getitemdetails($itemid){
		$sqlselect = $this->db->query("SELECT * FROM items where itemNo=$itemid");
		$itemdetails = $sqlselect->result_array();
		echo json_encode($itemdetails[0]);
	}

	public function get_list_items($aprid)
	{
		$itemlist = $this->db->query("SELECT * from purchase_apr_items where aprid='$aprid'");
		return $itemlist->result_array();
		
		
	}
	public function checkaprdupliate($aprno)
	{
		$duplicatecount = $this->db->query("SELECT count(*) as duplicate from purchase_apr where aprno='$aprno'");
		$duplic = $duplicatecount->result_array();
		echo json_encode($duplic[0]);
		
		
		
	}
	public function updateunitprice($apritemsid,$unitprice,$availability)
	{
				
		$sql = "update purchase_apr_items set unitprice=".$this->db->escape($unitprice).",availability=".$this->db->escape($availability)." where apritemsid=".$this->db->escape($apritemsid)."";

		$this->db->query($sql);
		
		
		
		
	}
	
	
	
}

?>