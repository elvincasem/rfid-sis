<?php


class Purchaserequest_model extends CI_Model
{
	
	public function get()
	{
		$users = $this->db->query("SELECT purchase_pr.prid,prdate,aprno,aprdate,purchase_pr.prno,department,section,pono,prstatus FROM purchase_pr LEFT JOIN purchase_po ON purchase_pr.prid = purchase_po.prid");
		return $users->result_array();
		
		
	}
	public function get_staff($uid)
	{
		$users = $this->db->query("SELECT purchase_pr.prid,prdate,aprno,aprdate,purchase_pr.prno,department,section,pono,prstatus FROM purchase_pr LEFT JOIN purchase_po ON purchase_pr.prid = purchase_po.prid where purchase_pr.addedby = $uid");
		return $users->result_array();
		
		
	}
	public function getaprlist()
	{
		$users = $this->db->query("SELECT * from purchase_apr");
		return $users->result_array();
		
		
	}
	
	public function getunitofmeasure()
	{
		$uom = $this->db->query("SELECT * from items_buom_list");
		return $uom->result_array();

	}
	public function getsuppliers()
	{
		$sup = $this->db->query("SELECT * from suppliers");
		return $sup->result_array();

	}
	public function getsuppliersadded($prid)
	{
		$sup = $this->db->query("SELECT purchase_pr_aoc.supplierid,suppliers.supName FROM purchase_pr_aoc LEFT JOIN suppliers ON purchase_pr_aoc.supplierid = suppliers.supplierID WHERE prid='$prid' GROUP BY supplierid");
		return $sup->result_array();

	}
	
	public function getprmaindetails($id)
	{
		$sql = $this->db->query("SELECT * FROM purchase_pr LEFT JOIN suppliers ON purchase_pr.awardedsupplier = suppliers.supplierID left join employee on purchase_pr.requestedby = employee.eid WHERE prid='$id'");
		$prmain = $sql->result_array();
		return $prmain[0];
	}
	
	public function getsupplierdetails($supplier_id)
	{
		$sql = $this->db->query("SELECT * FROM suppliers WHERE supplierID='$supplier_id'");
		$sql_result = $sql->result_array();
		return $sql_result[0];
	}
	
	public function savepr($prdate,$aprno,$prno,$department,$section,$purpose,$modeofprocurement,$eid)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO purchase_pr (prdate,aprno,prno,department,section,purpose,addedby,modeofprocurement,requestedby) VALUES (".$this->db->escape($prdate).", ".$this->db->escape($aprno).", ".$this->db->escape($prno).", ".$this->db->escape($department).", ".$this->db->escape($section).",".$this->db->escape($purpose).", ".$this->db->escape($uid).", ".$this->db->escape($modeofprocurement).", ".$this->db->escape($eid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(prid) AS lastid FROM purchase_pr");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
		
	}
	public function saveprdetails($prid,$department,$aprno,$aprdate,$section,$prno,$prdate,$purpose,$modeofprocurement,$eid,$prstatus)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "update purchase_pr set department=".$this->db->escape($department).",aprno=".$this->db->escape($aprno).",aprdate=".$this->db->escape($aprdate).",section=".$this->db->escape($section).",prno=".$this->db->escape($prno).",prdate=".$this->db->escape($prdate).",purpose=".$this->db->escape($purpose).",modeofprocurement=".$this->db->escape($modeofprocurement).",requestedby=".$this->db->escape($eid).",prstatus=".$this->db->escape($prstatus)." where prid=".$this->db->escape($prid)."";

		$this->db->query($sql);
		
		
		
		
	}
	
	public function getitemlist()
	{
		$itemlist = $this->db->query("SELECT * from items");
		return $itemlist->result_array();
		
		
	}
	
	public function savepritem($itemid,$prid,$description,$itemqty,$unit,$unitcost)
	{
		
		$sql = "INSERT INTO purchase_pr_items (itemid,prid,description,qty,unit,unitprice) VALUES (".$this->db->escape($itemid).",".$this->db->escape($prid).",".$this->db->escape($description).",".$this->db->escape($itemqty).",".$this->db->escape($unit).",".$this->db->escape($unitcost).")";
		$this->db->query($sql);
		
		//select aoc db if has already supplier
		$sqlselect = $this->db->query("SELECT count(*) as suppliercount FROM purchase_pr_aoc where prid=$prid");
		$itemdetails = $sqlselect->result_array();
		echo json_encode($itemdetails[0]);
		
				
		
	}
	
	public function getitemdetails($itemid){
		$sqlselect = $this->db->query("SELECT * FROM items where itemNo=$itemid");
		$itemdetails = $sqlselect->result_array();
		echo json_encode($itemdetails[0]);
	}

	public function get_list_items($id)
	{
		$itemlist = $this->db->query("SELECT * from purchase_pr_items where prid='$id'");
		return $itemlist->result_array();
		
		
	}
	public function checkprdupliate($prno)
	{
		$duplicatecount = $this->db->query("SELECT count(*) as duplicate from purchase_pr where prno='$prno'");
		$duplic = $duplicatecount->result_array();
		echo json_encode($duplic[0]);
		
		
		
	}
	public function updateunitprice($pritemsid,$unitprice)
	{
				
		$sql = "update purchase_pr_items set unitprice=".$this->db->escape($unitprice)." where pritemsid=".$this->db->escape($pritemsid)."";

		$this->db->query($sql);

		
	}
	
	public function updateallprices($pritemsid,$unitprice)
	{
				
		$sql = "update purchase_pr_items set unitprice=".$this->db->escape($unitprice)." where pritemsid=".$this->db->escape($pritemsid)."";

		$this->db->query($sql);
		
		//echo $sql;

		
	}
	
	public function updateallpricescanvass($aocid,$unitprice,$aocparticular)
	{
				
		$sql = "update purchase_pr_aoc set unitprice=".$this->db->escape($unitprice).",aocparticular=".$this->db->escape($aocparticular)." where aocid=".$this->db->escape($aocid)."";

		$this->db->query($sql);
		
		echo $sql;

		
	}
	
	public function updatecanvassprice($aocid,$unitprice,$aocparticular)
	{
				
		$sql = "update purchase_pr_aoc set unitprice=".$this->db->escape($unitprice).",aocparticular=".$this->db->escape($aocparticular)." where aocid=".$this->db->escape($aocid)."";

		$this->db->query($sql);
		echo $sql;
		
	}
	
		public function addsupplier($supplierid,$prid,$pritemsid)
	{
		
		$sql = "INSERT INTO purchase_pr_aoc (supplierid,prid,pritemsid) VALUES (".$this->db->escape($supplierid).",".$this->db->escape($prid).",".$this->db->escape($pritemsid).")";
		$this->db->query($sql);
				
		
	}
	
	public function getcanvasslist($prid)
	{
		$canvasslist = $this->db->query("SELECT suppliers.supplierid,supName FROM purchase_pr_aoc LEFT JOIN suppliers ON purchase_pr_aoc.supplierid = suppliers.supplierID WHERE prid='$prid' GROUP BY suppliers.supplierID order by suppliers.supplierid asc");
		return $canvasslist->result_array();

	}
	public function getcanvasslist_items($supplierid,$prid)
	{
		$canvass_items = $this->db->query("SELECT aocid,description,qty,unit,purchase_pr_aoc.unitprice,supplierid FROM purchase_pr_aoc LEFT JOIN purchase_pr_items ON purchase_pr_aoc.pritemsid = purchase_pr_items.pritemsid WHERE supplierid='$supplierid' and purchase_pr_aoc.prid='$prid'");
		return $canvass_items->result_array();

	}
	
	public function awardsupplier($awardedsupplier,$awardreason,$prid)
	{
				
		$sql = "update purchase_pr set awardedsupplier=".$this->db->escape($awardedsupplier).", awardreason=".$this->db->escape($awardreason)." where prid=".$this->db->escape($prid)."";

		$this->db->query($sql);

		
	}
	
	public function quotetotalcost($itemid,$prid)
	{
		$sql = $this->db->query("SELECT (purchase_pr_items.qty*purchase_pr_aoc.unitprice) AS estimatedcost, supplierid FROM purchase_pr_items LEFT JOIN purchase_pr_aoc ON purchase_pr_items.pritemsid = purchase_pr_aoc.pritemsid WHERE purchase_pr_items.prid = '$prid' AND purchase_pr_items.pritemsid ='$itemid' order by supplierid asc");
		$prmain = $sql->result_array();
		return $prmain;
	}
	public function gettotalamount($prid)
	{
		$sql = $this->db->query("SELECT SUM((purchase_pr_items.qty*purchase_pr_aoc.unitprice)) AS totalestimatedcost, supplierid FROM purchase_pr_aoc LEFT JOIN purchase_pr_items ON purchase_pr_aoc.pritemsid = purchase_pr_items.pritemsid WHERE purchase_pr_aoc.prid = '$prid' GROUP BY supplierid ORDER BY supplierid asc");
		$prmain = $sql->result_array();
		return $prmain;
	}
	
	public function getawardedsupplier($prid)
	{
		
		$sql = $this->db->query("SELECT supName AS suppliername,supplierID AS supplierid FROM purchase_pr LEFT JOIN suppliers ON purchase_pr.awardedsupplier = suppliers.supplierID WHERE prid='$prid'");
		$prmain = $sql->result_array();
		return $prmain[0];
	}
	
	public function savepo($podate,$prid,$pono,$placeofdelivery,$dateofdelivery,$deliveryterm,$paymentterm,$prnomodal,$modeofprocurementpo,$supplierpo)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO purchase_po (podate,pono,prid,prno,supplierid,modeofprocurement,placeofdelivery,dateofdelivery,deliveryterm,paymentterm,addedby) VALUES (".$this->db->escape($podate).", ".$this->db->escape($pono).", ".$this->db->escape($prid).",".$this->db->escape($prnomodal).", ".$this->db->escape($supplierpo).", ".$this->db->escape($modeofprocurementpo).",".$this->db->escape($placeofdelivery).", ".$this->db->escape($dateofdelivery).", ".$this->db->escape($deliveryterm).", ".$this->db->escape($paymentterm).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		
		
		$sqlselect = $this->db->query("SELECT MAX(poid) AS lastid FROM purchase_po");
		$lastidinserted = $sqlselect->result_array();
		
		$currentid = $lastidinserted[0]['lastid'];
		
		
		//copy values from other tables
		$sqlselect2 = $this->db->query("SELECT $currentid as poid,purchase_pr_aoc.pritemsid as itemid,purchase_pr_items.description,purchase_pr_items.qty,purchase_pr_items.unit,purchase_pr_aoc.unitprice FROM purchase_pr_aoc LEFT JOIN purchase_pr_items ON purchase_pr_aoc.pritemsid = purchase_pr_items.pritemsid WHERE purchase_pr_aoc.supplierid='$supplierpo' AND purchase_pr_aoc.prid='$prid'");
		$result_array =  $sqlselect2->result_array();
		$this->db->insert_batch('purchase_po_items',$result_array); 
		
		return $currentid;
		
	}
	
	
	public function copyaoctopo($lastid,$supplierpo,$prid)
	{
		$sqlselect = $this->db->query("SELECT $lastid as poid,purchase_pr_aoc.pritemsid as itemid,purchase_pr_items.description,purchase_pr_items.qty,purchase_pr_items.unit,purchase_pr_aoc.unitprice FROM purchase_pr_aoc LEFT JOIN purchase_pr_items ON purchase_pr_aoc.pritemsid = purchase_pr_items.pritemsid WHERE purchase_pr_aoc.supplierid='$supplierpo' AND purchase_pr_aoc.prid='$prid'");
		return $sqlselect->result_array();
	}
	
	
	public function checkduplicatepo($pono)
	{
		
		$sql = $this->db->query("SELECT COUNT(*) as duplicatepono from purchase_po where pono='$pono'");
		$pomain = $sql->result_array();
		echo $pomain[0]['duplicatepono'];
	}
	
	public function getrelatedpo($prid)
	{
		$relatedpo = $this->db->query("SELECT poid,pono from purchase_po where prid='$prid'");
		$prmain = $relatedpo->result_array();
		if($prmain == null){
			return 0;
		}else{
			return $prmain[0];
		}
		
		//$relatedpo_result = $relatedpo->result_array();
		//echo $relatedpo_result[0];
		
		
		
	}
	
	public function getcustomreport($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	public function getpritemsid($prid)
	{
		$pritemsid = $this->db->query("SELECT * from purchase_pr_items where prid=$prid");
		return $pritemsid->result_array();

	}
	
	public function getprlist_aoc($id,$supplier_id)
	{
		$itemlist = $this->db->query("SELECT purchase_pr_aoc.aocid,purchase_pr_aoc.prid,purchase_pr_aoc.pritemsid,purchase_pr_aoc.supplierid,purchase_pr_aoc.unitprice,purchase_pr_aoc.aocparticular,purchase_pr_items.itemid,purchase_pr_items.description,purchase_pr_items.qty,purchase_pr_items.unit FROM purchase_pr_aoc LEFT JOIN purchase_pr_items ON purchase_pr_aoc.pritemsid = purchase_pr_items.pritemsid WHERE supplierid=$supplier_id AND purchase_pr_aoc.prid=$id");
		return $itemlist->result_array();
		
		
	}
	
}

?>