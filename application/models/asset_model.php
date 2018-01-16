<?php


class Asset_model extends CI_Model
{
	
	public function getassetlist($filtered)
	{
		
		if(strtoupper($filtered)=="ALL"){
			$sql = $this->db->query("SELECT *,(SELECT COUNT(*) FROM equipments WHERE equipments.assetid = assets.assetid) AS equipcount FROM assets");
			return $sql->result_array();
		}else{
			$filtered_value = $this->db->escape($filtered);
			$sql = $this->db->query("SELECT *,(SELECT COUNT(*) FROM equipments WHERE equipments.assetid = assets.assetid) AS equipcount FROM assets where asset_classification = $filtered_value");
			return $sql->result_array();
		}
		
		
		
	}
	public function getpropertylist()
	{
		$sql = $this->db->query("SELECT * from equipments");
		return $sql->result_array();
		
		
	}

	
	public function addasset($particulars,$article,$classification)
	{
		
		$sql = "INSERT INTO assets (asset_article,asset_particulars,asset_classification) VALUES (".$this->db->escape($article).",".$this->db->escape($particulars).",".$this->db->escape($classification).")";
		$this->db->query($sql);
		
		
	}
	
		
	public function getassetdetails($id)
	{
		$sql = $this->db->query("SELECT * from assets where assetid='$id'");
		$asset_details = $sql->result_array();
		return $asset_details[0];
	}
	
	public function getequipment($id)
	{
		
		$list = $this->db->query("SELECT *,(SELECT CONCAT(fname,' ',lname)FROM employee WHERE employee.eid = equipments.issuedto) AS issuedtoname,(SELECT CONCAT(fname,' ',lname) FROM employee WHERE employee.eid = equipments.enduser) AS endusername FROM equipments LEFT JOIN suppliers ON equipments.supplierid = suppliers.supplierID LEFT JOIN equipments_receiving ON equipments.deliveryid = equipments_receiving.deliveryid WHERE assetid='$id'");
		return $list->result_array();
	}
		
		
	public function getallequipment()
	{
		$sql = $this->db->query("SELECT * FROM equipments LEFT JOIN equipments_receiving ON equipments.deliveryid = equipments_receiving.deliveryid LEFT JOIN employee on equipments.issuedto = employee.eid");
		return $sql->result_array();
		
		
	}
	
	public function getsingleequipment($equipno)
	{
		$sql = $this->db->query("SELECT *,(SELECT CONCAT(fname,' ',lname)FROM employee WHERE employee.eid = equipments.issuedto) AS issuedtoname,(SELECT CONCAT(fname,' ',lname) FROM employee WHERE employee.eid = equipments.enduser) AS endusername from equipments left join equipments_details on equipments.equipNo = equipments_details.equipNo left join suppliers on equipments.supplierID = suppliers.supplierID where equipments.equipNo='$equipno'");
		$equipment_details = $sql->result_array();
		return $equipment_details[0];
	}
	
	
	public function updatereceiving($equipno)
	{
		
		$sql = $this->db->query("SELECT * FROM equipments where equipNo='$equipno'");
		$equipment_details = $sql->result_array();
		$equiprow = $equipment_details[0];
		$deliveryid = $equiprow['deliveryid'];
		$assetid = $equiprow['assetid'];

		$sql = "update equipments_receiving_items set status='1' where deliveryid='$deliveryid' AND assetid='$assetid'";
		$this->db->query($sql);
		
			
		
	}
	
	
		public function getsupplierlist()
	{
		$sql2 = $this->db->query("SELECT * from suppliers");
		return $sql2->result_array();
		
		
	}
	
	public function updateproperty($equipno,$propertyno,$particulars,$dateacquired,$unitprice,$accountcode,$barcode,$service,$supplierid,$inventorytag){
		
		$sql = "update equipments set propertyNo=".$this->db->escape($propertyno).",particulars=".$this->db->escape($particulars).",dateacquired=".$this->db->escape($dateacquired).",totalcost=".$this->db->escape($unitprice).",accountcode=".$this->db->escape($accountcode).",service=".$this->db->escape($service).",barcode=".$this->db->escape($barcode).",supplierID=".$this->db->escape($supplierid).",inventorytag=".$this->db->escape($inventorytag)." where equipNo=".$this->db->escape($equipno)."";
		$this->db->query($sql);
	}
	public function updateusertab($equipno,$issuedto,$enduser){
		
		$sql = "update equipments set issuedto=".$this->db->escape($issuedto).",enduser=".$this->db->escape($enduser)." where equipNo=".$this->db->escape($equipno)."";
		$this->db->query($sql);
		
		$text = "Issued to: $issuedto, End User: $enduser";
		$sqltext = "INSERT INTO equipments_log (tab,logdescription) VALUES ('users',".$this->db->escape($text).")";
		$this->db->query($sqltext);
	}
	
	public function updateremarks($equipno,$whereabout,$remarks){
		
		$sql = "update equipments set whereabout=".$this->db->escape($whereabout).",remarks=".$this->db->escape($remarks)." where equipNo=".$this->db->escape($equipno)."";
		$this->db->query($sql);
		
		$text = "Whereabout: $whereabout, Remarks: $remarks";
		$sqltext = "INSERT INTO equipments_log (tab,logdescription) VALUES ('remarks',".$this->db->escape($text).")";
		$this->db->query($sqltext);
	}
	public function updatepheriperal($equipno,$processor,$ram,$harddisk,$operatingsystem,$equipmentsn,$processorsn,$monitorsn,$keyboardsn,$mousesn){
		
		$sql = "update equipments_details set processor=".$this->db->escape($processor).",ram=".$this->db->escape($ram).",hd=".$this->db->escape($harddisk).",operatingsystem=".$this->db->escape($operatingsystem).",equipsn=".$this->db->escape($equipmentsn).",processorsn=".$this->db->escape($processorsn).",monitorsn=".$this->db->escape($monitorsn).",keyboardsn=".$this->db->escape($keyboardsn).",mousesn=".$this->db->escape($mousesn)." where equipNo=".$this->db->escape($equipno)."";
		$this->db->query($sql);
		
		$text = "$processor,$ram,$harddisk,$operatingsystem,$equipmentsn,$processorsn,$monitorsn,$keyboardsn,$mousesn";
		$sqltext = "INSERT INTO equipments_log (tab,logdescription) VALUES ('Pheriperal',".$this->db->escape($text).")";
		$this->db->query($sqltext);
	}
	
		public function getparlist()
	{
		//$sql2 = $this->db->query("SELECT equipments_par.parid,pardate,eid,parno FROM equipments_par LEFT JOIN equipments_par_items ON equipments_par.parid = equipments_par_items.parid");
		$sql2 = $this->db->query("SELECT * FROM equipments_par left join employee on equipments_par.eid = employee.eid");
		return $sql2->result_array();
		
		
	}
	
	public function savepar($pardate,$parno,$eid)
	{
		
		$sql = "INSERT INTO equipments_par (parno,pardate,eid) VALUES (".$this->db->escape($parno).",".$this->db->escape($pardate).",".$this->db->escape($eid).")";
		$this->db->query($sql);
		
		$sqlselect = $this->db->query("SELECT MAX(parid) AS lastid FROM equipments_par");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
	}
	
	public function getpardetails($parid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_par left join employee on equipments_par.eid = employee.eid");
		
		$result = $sql2->result_array();
		return $result[0];
		
		
	}
	
	public function getassetunit($equipno)
	{
		$sql = $this->db->query("SELECT * from equipments left join assets on equipments.assetid = assets.assetid where equipments.equipNo='$equipno'");
		$asset_details = $sql->result_array();
		return $asset_details[0];
	}
	
	public function getparitems($parid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_par_items LEFT JOIN equipments ON equipments_par_items.equipno = equipments.equipNo LEFT JOIN assets ON equipments_par_items.assetid = assets.assetid WHERE parid=$parid");
		return $sql2->result_array();
		
		
	}
	public function getparitemspdf($parid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_par_items LEFT JOIN equipments ON equipments_par_items.equipno = equipments.equipNo LEFT JOIN assets ON equipments_par_items.assetid = assets.assetid WHERE parid=$parid");
		return $sql2->result_array();
		
		
	}
	
	public function addpropertytolist($parid,$equipno,$assetid)
	{
		
		$sql = "INSERT INTO equipments_par_items (parid,equipno,assetid) VALUES (".$this->db->escape($parid).",".$this->db->escape($equipno).",".$this->db->escape($assetid).")";
		$this->db->query($sql);
		
	
		
	}
	
	
	public function getptrlist()
	{
		//$sql2 = $this->db->query("SELECT equipments_par.parid,pardate,eid,parno FROM equipments_par LEFT JOIN equipments_par_items ON equipments_par.parid = equipments_par_items.parid");
		$sql2 = $this->db->query("SELECT * from equipments_ptr");
		return $sql2->result_array();
		
		
	}
	
	public function getptritems($ptrid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_ptr_items LEFT JOIN equipments ON equipments_ptr_items.equipno = equipments.equipNo LEFT JOIN equipments_details ON equipments_ptr_items.equipno = equipments_details.equipNo LEFT JOIN equipments_receiving ON equipments.deliveryid = equipments_receiving.deliveryid LEFT JOIN assets ON equipments_ptr_items.assetid = assets.assetid LEFT JOIN suppliers ON equipments.supplierID = suppliers.supplierID WHERE ptrid=$ptrid");
		return $sql2->result_array();
		
		
	}
	public function getptrdetails($ptrid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_ptr where ptrid=$ptrid");
		
		$result = $sql2->result_array();
		return $result[0];
		
		
	}
	public function addpropertytolistptr($ptrid,$equipno,$assetid)
	{
		
		$sql = "INSERT INTO equipments_ptr_items (ptrid,equipno,assetid) VALUES (".$this->db->escape($ptrid).",".$this->db->escape($equipno).",".$this->db->escape($assetid).")";
		echo $sql;
		$this->db->query($sql);
		
	
		
	}
	
	
	
	
	
	
	
	
	
	
	public function geticslist()
	{
		//$sql2 = $this->db->query("SELECT equipments_par.parid,pardate,eid,parno FROM equipments_par LEFT JOIN equipments_par_items ON equipments_par.parid = equipments_par_items.parid");
		$sql2 = $this->db->query("SELECT equipments_ics.icsid,icsdate,icsno,CONCAT(fname,' ',lname) AS ename  FROM equipments_ics LEFT JOIN employee ON equipments_ics.eid = employee.eid");
		return $sql2->result_array();
		
		
	}
	
	public function saveics($icsdate,$icsno,$eid)
	{
		
		$sql = "INSERT INTO equipments_ics (icsno,icsdate,eid) VALUES (".$this->db->escape($icsno).",".$this->db->escape($icsdate).",".$this->db->escape($eid).")";
		$this->db->query($sql);
		
		$sqlselect = $this->db->query("SELECT MAX(icsid) AS lastid FROM equipments_ics");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
	}
	public function geticsdetails($icsid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_ics left join employee on equipments_ics.eid = employee.eid");
		
		$result = $sql2->result_array();
		return $result[0];
		
		
	}
	
	public function geticsitems($icsid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_ics_items LEFT JOIN equipments ON equipments_ics_items.equipno = equipments.equipNo LEFT JOIN assets ON equipments_ics_items.assetid = assets.assetid WHERE icsid=$icsid");
		return $sql2->result_array();
		
		
	}
	
	
	public function addpropertytolistics($icsid,$equipno,$assetid)
	{
		
		$sql = "INSERT INTO equipments_ics_items (icsid,equipno,assetid) VALUES (".$this->db->escape($icsid).",".$this->db->escape($equipno).",".$this->db->escape($assetid).")";
		echo $sql;
		$this->db->query($sql);
		
	
		
	}
	
	public function updategroupasset($assetid,$particulars,$articlename,$classification,$asset_unit){
		
		$sql = "update assets set asset_article=".$this->db->escape($articlename).",asset_particulars=".$this->db->escape($particulars).",asset_classification=".$this->db->escape($classification).",asset_unit=".$this->db->escape($asset_unit)." where assetid=".$this->db->escape($assetid)."";
		//echo $sql;
		$this->db->query($sql);
		
		$sql2 = "update equipments set classification=".$this->db->escape($classification)." where assetid=".$this->db->escape($assetid)."";
		//echo $sql;
		$this->db->query($sql2);
	}
	
	public function updatepardetails($parid,$employeeid,$parno,$pardate){
		
		$sql = "update equipments_par set parno=".$this->db->escape($parno).",pardate=".$this->db->escape($pardate).",eid=".$this->db->escape($employeeid)." where parid=".$this->db->escape($parid)."";
		echo $sql;
		$this->db->query($sql);
	}
	public function getfooter($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	public function getagencyname($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	public function agencyaccountcode($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	public function procurement($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function col1($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function col2($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function col3($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function saverre($rredate,$rreno,$rreenduser)
	{
		
		$sql = "INSERT INTO equipments_rre (rreno,rredate,rre_enduser) VALUES (".$this->db->escape($rreno).",".$this->db->escape($rredate).",".$this->db->escape($rreenduser).")";
		$this->db->query($sql);
		
		$sqlselect = $this->db->query("SELECT MAX(rreid) AS lastid FROM equipments_rre");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
	}
	
	public function updateptrdetails($ptrid,$fromoffice,$ptrno,$ptrdate,$tooffice,$transferreason){
		
		$sql = "update equipments_ptr set ptrno=".$this->db->escape($ptrno).",ptrdate=".$this->db->escape($ptrdate).",fromoffice=".$this->db->escape($fromoffice).",tooffice=".$this->db->escape($tooffice).",transfertype=".$this->db->escape($tooffice).",transferreason=".$this->db->escape($transferreason)." where ptrid=".$this->db->escape($ptrid)."";
		echo $sql;
		$this->db->query($sql);
	}
	
	public function updateicsdetails($icsid,$eid,$icsno,$icsdate){
		
		$sql = "update equipments_ics set icsno=".$this->db->escape($icsno).",icsdate=".$this->db->escape($icsdate).",eid=".$this->db->escape($eid)." where icsid=".$this->db->escape($icsid)."";
		//echo $sql;
		$this->db->query($sql);
	}
	
	public function getcustomreport($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function getrrelist()
	{
		//$sql2 = $this->db->query("SELECT equipments_par.parid,pardate,eid,parno FROM equipments_par LEFT JOIN equipments_par_items ON equipments_par.parid = equipments_par_items.parid");
		$sql2 = $this->db->query("SELECT * from equipments_rre");
		return $sql2->result_array();
		
		
	}
	
	
	public function getrremaindetails($rreid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_rre where rreid = $rreid");
		
		$result = $sql2->result_array();
		return $result[0];
		
		
	}
	
	public function getrreitems($rreid)
	{
		$sql2 = $this->db->query("SELECT * FROM equipments_rre_items LEFT JOIN equipments ON equipments_rre_items.equipno = equipments.equipNo LEFT JOIN assets ON equipments_rre_items.assetid = assets.assetid WHERE rreid=$rreid");
		return $sql2->result_array();
		
		
	}
	
	public function updaterredetails($rreid,$rreno,$rredate,$rreenduser){
		
		$sql = "update equipments_rre set rreno=".$this->db->escape($rreno).",rredate=".$this->db->escape($rredate).",rre_enduser=".$this->db->escape($rreenduser)." where rreid=".$this->db->escape($rreid)."";
		//echo $sql;
		$this->db->query($sql);
	}
	
	public function addpropertytolistrre($rreid,$equipno,$assetid,$parics,$rreenduser_item,$rre_remarks)
	{
		
		$sql = "INSERT INTO equipments_rre_items (rreid,equipno,assetid,paricsno,enduseroffice,rre_remarks) VALUES (".$this->db->escape($rreid).",".$this->db->escape($equipno).",".$this->db->escape($assetid).",".$this->db->escape($parics).",".$this->db->escape($rreenduser_item).",".$this->db->escape($rre_remarks).")";
		echo $sql;
		$this->db->query($sql);
		
	
		
	}
	
}

?>