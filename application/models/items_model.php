<?php


class Items_model extends CI_Model
{
	
	public function getitemslist()
	{
		$sql = $this->db->query("SELECT * FROM items left join warehouse on items.warehouseid = warehouse.warehouseid");
		return $sql->result_array();
		
		
	}
	
	public function getitemdetails($id)
	{
		$itemlist = $this->db->query("SELECT * from items left join suppliers on items.supplierID = suppliers.supplierID where itemNo='$id'");
		$singlerow = $itemlist->result_array();
		return $singlerow[0];
		
		
	}
	
	public function getunitlist()
	{
		$sql = $this->db->query("SELECT * FROM items_buom_list");
		return $sql->result_array();
		
		
	}
	
	public function getitemcategorylist()
	{
		$sql = $this->db->query("SELECT * FROM items_category");
		return $sql->result_array();
		
		
	}
	
	public function stockcard($id)
	{
		$sql = $this->db->query("SELECT * FROM ((SELECT 'Received' AS operation,purchase_receiving_items.drno AS reference,purchase_receiving_items.itemNo,purchase_receiving_items.unit,purchase_receiving_items.qty,purchase_receiving_items.time_stamp AS created,purchase_receiving.purpose FROM purchase_receiving_items LEFT JOIN purchase_receiving ON purchase_receiving_items.deliveryid =purchase_receiving.deliveryid) UNION ALL (SELECT 'Issued' AS operation,requisition_items.requisition_no AS reference,requisition_items.itemNo,requisition_items.unit,requisition_items.qty,requisition_items.time_stamp AS created,requisition_details.purpose FROM requisition_items LEFT JOIN requisition_details ON requisition_items.reqid = requisition_details.reqid)) results WHERE results.itemNo = $id ORDER BY created ASC ");
		return $sql->result_array();
		
		
	}
	public function deliverydetails($id)
	{
		$sql = $this->db->query("SELECT * FROM purchase_receiving_items where itemNo='$id'");
		return $sql->result_array();
		
		
	}
	
	public function requisitiondetails($id)
	{
		$sql = $this->db->query("SELECT * FROM requisition_items where itemno='$id'");
		return $sql->result_array();
		
		
	}
	
	public function getsupplierlist()
	{
		$sql = $this->db->query("SELECT * FROM suppliers");
		return $sql->result_array();
		
		
	}
	
	public function saveitem($itemdescription,$unitofmeasure,$unitcost,$category,$supplierid,$brand,$warehouseid)
	{
		
		$sql = "INSERT INTO items (description,category,unit,unitCost,supplierID,brand,warehouseid) VALUES (".$this->db->escape($itemdescription).",".$this->db->escape($category).",".$this->db->escape($unitofmeasure).",".$this->db->escape($unitcost).",".$this->db->escape($supplierid).",".$this->db->escape($brand).",".$this->db->escape($warehouseid).")";
		$this->db->query($sql);
				
		
	}
	
	public function updateitem($itemno,$unitcost,$description,$category,$brand,$supplierid,$unit)
	{
		$sql = "update items set unitCost=".$this->db->escape($unitcost).",description=".$this->db->escape($description).",category=".$this->db->escape($category).",brand=".$this->db->escape($brand).",supplierid=".$this->db->escape($supplierid).",unit=".$this->db->escape($unit)." where itemNo=".$this->db->escape($itemno)."";

		echo $sql;
		$this->db->query($sql);
				
		
	}
	
	
	
	
}

?>