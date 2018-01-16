<?php


class Requisition_model extends CI_Model
{

	
	public function getrequisitionlist()
	{
		$sql = $this->db->query("SELECT *,(SELECT COUNT(*) FROM requisition_items WHERE requisition_details.reqid = requisition_items.reqid AND update_status=1) AS updatedcount FROM requisition_details LEFT JOIN employee ON requisition_details.eid = employee.eid");
		return $sql->result_array();
		
		
	}
	
	public function savereq($rdate,$rno,$requester_id,$purpose,$warehouseid)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		
		$sql = "INSERT INTO requisition_details (requisition_no,requisition_date,eid,userID,purpose,warehouseid) VALUES (".$this->db->escape($rno).", ".$this->db->escape($rdate).", ".$this->db->escape($requester_id).", ".$this->db->escape($uid).", ".$this->db->escape($purpose).", ".$this->db->escape($warehouseid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(reqid) AS lastid FROM requisition_details");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
				
		
	}
	
	public function getitemlist($requisition_warehouseid)
	{
		$sql = $this->db->query("SELECT * from items where warehouseid = $requisition_warehouseid");
		return $sql->result_array();
		
		
	}
	public function getwarehouse()
	{
		$sql = $this->db->query("SELECT * from warehouse");
		return $sql->result_array();
		
		
	}
	
	public function getreqitems($requisition_no)
	{
		$sql = $this->db->query("SELECT reqitemsid,requisition_items.itemno,requisition_items.unit,items.description,qty,update_status,items.unitCost from requisition_items left join items on requisition_items.itemno = items.itemNo where requisition_no='$requisition_no'");
		return $sql->result_array();
		
		
	}
	
	public function requisitiondetails($id)
	{
		$sql = $this->db->query("SELECT * FROM requisition_details LEFT JOIN employee ON requisition_details.eid = employee.eid LEFT JOIN users ON requisition_details.userID = users.uid LEFT JOIN warehouse ON requisition_details.warehouseid = warehouse.warehouseid WHERE reqid=$id");
		$reqsqldetails = $sql->result_array();
		return $reqsqldetails[0];
		
		
	}
	
	public function additemreq($requisition_no,$itemid,$itemunit,$itemqty,$reqid)
	{
	
		
		$sql = "INSERT INTO requisition_items (requisition_no,itemno,unit,qty,reqid) VALUES (".$this->db->escape($requisition_no).", ".$this->db->escape($itemid).", ".$this->db->escape($itemunit).", ".$this->db->escape($itemqty).", ".$this->db->escape($reqid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		
				
		
	}
	
		public function showitemunit($itemid)
	{
		$sql = $this->db->query("SELECT * from items where itemNo='$itemid'");
		$unitofmeasure = $sql->result_array();
		return $unitofmeasure[0];
		
		
	}
	
	
	public function updateinventory($reqid)
	{
		
		
		//select all items from reqitems
		//$sqlselect2 = "SELECT * FROM requisition_items WHERE requisition_no='$reqno' AND update_status=0";
		
		
		$sql = $this->db->query("SELECT * FROM requisition_items WHERE reqid='$reqid' AND update_status=0");
		$reqitems = $sql->result_array();
		
		print_r($reqitems);
		//echo "SELECT * FROM requisition_items WHERE requisition_no='$reqid' AND update_status=0";
		
		foreach ($reqitems as $req_items):
			$reqitemsid = $req_items['reqitemsid'];
			$itemno = $req_items['itemno'];
			$req_unit = $req_items['unit'];
			$req_qty = $req_items['qty'];
			//loop items in requisition
			//compare current unit is the same as the item base unit
			$sql2 = $this->db->query("SELECT unit,inventory_qty FROM items WHERE itemNo=$itemno");
			$unitofmeasure_base = $sql2->result_array();
			$baseunit = $unitofmeasure_base[0]['unit'];
			$inventory = $unitofmeasure_base[0]['inventory_qty'];
			//return $unitofmeasure[0];
			if($baseunit == $req_unit){
				//no conversion of units
				//update items inventory
				$updatedvalue = $inventory - $req_qty;
				
				
				//update item status
			}else{
				
				//get convertion equivalent
				$sql3 = $this->db->query("SELECT base_qty FROM items_buom where itemNo=$itemno and equiv_unit='$req_unit'");
				$unitofmeasure_equiv = $sql3->result_array();
				
				$equiv_qty = $unitofmeasure_equiv['base_qty'];
				
				$subtotal = $equiv_qty * $req_qty;
				$updatedvalue = $inventory - $subtotal;

			}
			//update inventory per item
				$sql4 = $this->db->query("UPDATE items set inventory_qty=$updatedvalue where itemNo=$itemno");
				$sql5 = $this->db->query("UPDATE requisition_items set update_status=1 where reqitemsid = $reqitemsid");

			
		endforeach;
		
		
		
		
	}
	
	public function updatereq($rdate,$requester_id,$purpose,$status,$reqid,$warehouseid)
	{
		$sql = "update requisition_details set requisition_date=".$this->db->escape($rdate).",eid=".$this->db->escape($requester_id).",requisition_status=".$this->db->escape($status).",purpose=".$this->db->escape($purpose).",warehouseid=".$this->db->escape($warehouseid)." where reqid=".$this->db->escape($reqid)."";

		$this->db->query($sql);
				
		
	}
	
	
	
	
}

?>