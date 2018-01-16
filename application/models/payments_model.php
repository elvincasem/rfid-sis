<?php


class payments_model extends CI_Model
{

public function updatePayment($orno, $paymentdate, $amount, $status){
		
		//update student record
		$sql = "update  set orno=".$this->db->escape($orno).", paymentDate=".$this->db->escape($paymentdate).", amount=".$this->db->escape($amount).", status=".$this->db->escape($status)." where pid=".$this->db->escape($pid)."";
		
		$this->db->query($sql);
	}

	
	
	
}

?>