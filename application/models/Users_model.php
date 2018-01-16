<?php


class Users_model extends CI_Model
{
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$users = $this->db->query("SELECT * from users left join employee on users.linkeid = employee.eid");
		return $users->result_array();
		
		
	}
	public function updatelinkeid($linkeid,$linkuid){
		
		$sql = "update users set linkeid=".$this->db->escape($linkeid)." where uid=".$this->db->escape($linkuid)."";
		$this->db->query($sql);
	}

}

?>