<?php


class Adjustment_model extends CI_Model
{

	
	public function getadjustment()
	{
		$sql = $this->db->query("SELECT *,(SELECT COUNT(*) FROM adjustment_items WHERE adjustment_details.adjustmentid = adjustment_items.adjustmentid AND update_status=1) AS updatedcount FROM adjustment_details ");
		return $sql->result_array();
		
		
	}
	
	public function saveadj($purpose,$warehouseid)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		
		$sql = "INSERT INTO adjustment_details (adj_purpose,warehouseid,userID) VALUES (".$this->db->escape($purpose).", ".$this->db->escape($warehouseid).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(adjustmentid) AS lastid FROM adjustment_details");
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
	
	public function getadjitems($adjustmentid)
	{
		$sql = $this->db->query("SELECT adjustmentitemsid,adjustmentid,action,adjustment_items.itemno,adjustment_items.unit,items.description,qty,update_status,items.unitCost from adjustment_items left join items on adjustment_items.itemno = items.itemNo where adjustmentid='$adjustmentid'");
		return $sql->result_array();
		
		
	}
	
	public function adjustmentdetails($id)
	{
		$sql = $this->db->query("SELECT * FROM adjustment_details LEFT JOIN warehouse ON adjustment_details.warehouseid = warehouse.warehouseid WHERE adjustmentid=$id");
		$reqsqldetails = $sql->result_array();
		return $reqsqldetails[0];
		
		
	}
	
	public function additemadj($adjustmentid,$itemid,$itemunit,$itemqty,$adjfunction)
	{
	
		if($adjfunction=="MINUS"){
			$qtfinal = "-".$itemqty;
		}else{
			$qtfinal = $itemqty;
		}
		$sql = "INSERT INTO adjustment_items (adjustmentid,itemno,unit,qty,action) VALUES (".$this->db->escape($adjustmentid).", ".$this->db->escape($itemid).", ".$this->db->escape($itemunit).", ".$this->db->escape($qtfinal).", ".$this->db->escape($adjfunction).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		
				
		
	}
	
		public function showitemunit($itemid)
	{
		$sql = $this->db->query("SELECT * from items where itemNo='$itemid'");
		$unitofmeasure = $sql->result_array();
		return $unitofmeasure[0];
		
		
	}
	
	
	public function updateinventory($adjustmentid)
	{
		
		
		//select all items from reqitems
		//$sqlselect2 = "SELECT * FROM requisition_items WHERE requisition_no='$reqno' AND update_status=0";
		
		
		$sql = $this->db->query("SELECT * FROM adjustment_items WHERE adjustmentid='$adjustmentid' AND update_status=0");
		$reqitems = $sql->result_array();
		
		//print_r($reqitems);
		//echo "SELECT * FROM requisition_items WHERE requisition_no='$reqid' AND update_status=0";
		
		foreach ($reqitems as $req_items):
			$adjustmentitemsid = $req_items['adjustmentitemsid'];
			$adjustmentid = $req_items['adjustmentid'];
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
				
				
				$updatedvalue = $inventory + $req_qty;
				
				
				//update item status
			}else{
				
				//get convertion equivalent
				$sql3 = $this->db->query("SELECT base_qty FROM items_buom where itemNo=$itemno and equiv_unit='$req_unit'");
				$unitofmeasure_equiv = $sql3->result_array();
				
				$equiv_qty = $unitofmeasure_equiv['base_qty'];
				
				$subtotal = $equiv_qty * $req_qty;
				
				
				
				$updatedvalue = $inventory + $subtotal;

			}
			//update inventory per item
				$sql4 = $this->db->query("UPDATE items set inventory_qty=$updatedvalue where itemNo=$itemno");
				//$sql5 = $this->db->query("UPDATE adjustment_items set update_status=1 where adjustmentitemsid=$adjustmentitemsid");
				$sql5 = $this->db->query("UPDATE adjustment_items set update_status=1 where itemno=$itemno AND adjustmentid='$adjustmentid'");


			
		endforeach;
		
		
		
		
	}
	
	public function updatereq($rdate,$requester_id,$purpose,$status,$reqid,$warehouseid)
	{
		$sql = "update requisition_details set requisition_date=".$this->db->escape($rdate).",eid=".$this->db->escape($requester_id).",requisition_status=".$this->db->escape($status).",purpose=".$this->db->escape($purpose).",warehouseid=".$this->db->escape($warehouseid)." where reqid=".$this->db->escape($reqid)."";

		$this->db->query($sql);
				
		
	}
	
	
	
	
}

?>