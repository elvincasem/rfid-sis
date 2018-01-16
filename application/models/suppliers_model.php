<?php


class Suppliers_model extends CI_Model
{
	
	public function getsupplierlist()
	{
		$sql = $this->db->query("SELECT * FROM suppliers");
		return $sql->result_array();
		
		
	}
	
	public function savesupplier($suppliername,$address,$contactno,$products,$email,$tin)
	{
		
		$sql = "INSERT INTO suppliers (supName,address,contactNo,TIN,products,email) VALUES (".$this->db->escape($suppliername).",".$this->db->escape($address).",".$this->db->escape($contactno).",".$this->db->escape($products).",".$this->db->escape($email).",".$this->db->escape($tin).")";
		$this->db->query($sql);
				
		
	}
	
	public function editsupplier($supplierid)
	{
		$sql = $this->db->query("SELECT * FROM suppliers where supplierID=".$this->db->escape($supplierid)."");
		$supplier = $sql->result_array();
		return $supplier[0];
		
		
	}
	
	public function updatesupplier($suppliername,$address,$contactno,$products,$email,$tin,$supplierid)
	{
		
		$sql = "update suppliers set supName=".$this->db->escape($suppliername).",address=".$this->db->escape($address).",contactNo=".$this->db->escape($contactno).",TIN=".$this->db->escape($tin).",products=".$this->db->escape($products).",email=".$this->db->escape($email)." where supplierID=".$this->db->escape($supplierid)."";

		$this->db->query($sql);
		
		//echo $sql;
				
		
	}
	
}

?>