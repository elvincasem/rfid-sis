<?php


class Warehouse_model extends CI_Model
{
	
	public function getwarehouselist()
	{
		$sql = $this->db->query("SELECT * FROM warehouse");
		return $sql->result_array();
		
		
	}
	
	public function savewarehouse($warehousename)
	{
		
		$sql = "INSERT INTO warehouse (warehouse_name) VALUES (".$this->db->escape($warehousename).")";
		$this->db->query($sql);
				
		
	}
	
	
}

?>