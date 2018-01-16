<?php


class Receivingassets_model extends CI_Model
{
	
	public function get()
	{
		$users = $this->db->query("SELECT deliveryid,drno,purchase_po.pono,purchase_apr.aprno, receivedate, (SELECT COUNT(*) FROM equipments_receiving_items WHERE equipments_receiving.deliveryid = equipments_receiving_items.deliveryid AND equipments_receiving_items.status =1) AS equipcountstat FROM equipments_receiving LEFT JOIN purchase_apr ON equipments_receiving.aprid = purchase_apr.aprid LEFT JOIN purchase_po ON equipments_receiving.poid = purchase_po.poid");
		return $users->result_array();
		
		
	}
	public function getaprlist()
	{
		$users = $this->db->query("SELECT * from purchase_apr");
		return $users->result_array();
		
		
	}
	public function getpolist()
	{
		$users = $this->db->query("SELECT * from purchase_po");
		return $users->result_array();
		
		
	}
	
	public function getsupplierlist()
	{
		$sql2 = $this->db->query("SELECT * from suppliers");
		return $sql2->result_array();
		
		
	}
	
	public function getdeliverydetails($id)
	{
		$sql = $this->db->query("SELECT *,equipments_receiving.supplierid as supid FROM equipments_receiving left join purchase_apr on equipments_receiving.aprid = purchase_apr.aprid left join purchase_po on equipments_receiving.poid = purchase_po.poid left join suppliers on equipments_receiving.supplierid = suppliers.supplierID WHERE deliveryid='$id'");
		$drmain = $sql->result_array();
		return $drmain[0];
	}
	
	public function getpoitems($poid)
	{
		$sql = $this->db->query("SELECT * FROM purchase_po_items where poid='$poid'");
		return $sql->result_array();
		
	}
	
	public function updateunitprice($deliveryitemsid,$unitprice)
	{
				
		$sql = "update purchase_receiving_items set unitcost=".$this->db->escape($unitprice)." where deliveryitemsid=".$this->db->escape($deliveryitemsid)."";
		$this->db->query($sql);

		
	}
	
	public function getitemlist()
	{
		$itemlist = $this->db->query("SELECT * from items");
		return $itemlist->result_array();
		
		
	}
	public function getitemunitlist($itemid)
	{
		$itemlist = $this->db->query("SELECT * from items where itemNo='$itemid'");
		$singlerow = $itemlist->result_array();
		return $singlerow[0];
		
		
	}
	
	public function checkconvertion($itemid)
	{
		$itemlist = $this->db->query("SELECT count(*) as conversion FROM items_buom where itemNo='$itemid'");
		$counted = $itemlist->result_array();
		return $counted[0]['conversion'];
		
		
	}
	
	public function conversionunit($itemid)
	{
		$itemlist = $this->db->query("SELECT equiv_unit,base_qty,base_unit FROM items_buom where itemNo='$itemid'");
		return $itemlist->result_array();
		
		
	}
	
	
	
	
	public function get_list_asset($id)
	{
		$itemlist = $this->db->query("SELECT * from equipments_receiving_items left join assets on equipments_receiving_items.assetid = assets.assetid where deliveryid='$id'");
		return $itemlist->result_array();
		
		
	}
	
	public function adddelivery($receiveddate,$drno,$aprid,$poid,$supplierid,$invoiceno)
	{
		
		$sql = "INSERT INTO equipments_receiving(receivedate,drno,aprid,poid,supplierid,invoiceno) VALUES (".$this->db->escape($receiveddate).",".$this->db->escape($drno).",".$this->db->escape($aprid).",".$this->db->escape($poid).",".$this->db->escape($supplierid).",".$this->db->escape($invoiceno).")";
		$this->db->query($sql);
		
		
		$sqlselect = $this->db->query("SELECT MAX(deliveryid) AS lastid FROM equipments_receiving");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
				
		
	}
	
	public function updatedelivery($receivedate,$drno,$aprid,$poid,$supplierid,$deliveryid,$status,$invoiceno)
	{
		
		$sql = "update equipments_receiving set receivedate=".$this->db->escape($receivedate).",drno=".$this->db->escape($drno).",aprid=".$this->db->escape($aprid).",poid=".$this->db->escape($poid).",supplierid=".$this->db->escape($supplierid).",status=".$this->db->escape($status).",invoiceno=".$this->db->escape($invoiceno)." where deliveryid=".$this->db->escape($deliveryid)."";
		$this->db->query($sql);
		
			//echo "update purchase_receiving set receivedate=".$this->db->escape($receivedate).",drno=".$this->db->escape($drno).",aprid=".$this->db->escape($aprid).",poid=".$this->db->escape($poid).",supplierid=".$this->db->escape($supplierid)." where deliveryid=".$this->db->escape($deliveryid)."";	
		
	}
	
	public function additem($deliveryid,$assetid,$itemunit,$itemqty,$unitprice)
	{
		
		$sql = "INSERT INTO equipments_receiving_items (deliveryid,assetid,unit,qty,unitprice) VALUES (".$this->db->escape($deliveryid).",".$this->db->escape($assetid).",".$this->db->escape($itemunit).",".$this->db->escape($itemqty).",".$this->db->escape($unitprice).")";
		$this->db->query($sql);
		
		echo "INSERT INTO equipments_receiving_items (deliveryid,assetid,unit,qty,unitprice) VALUES (".$this->db->escape($deliveryid).",".$this->db->escape($assetid).",".$this->db->escape($itemunit).",".$this->db->escape($itemqty).",".$this->db->escape($unitprice).")";
		
	}
	
	public function getassetlist()
	{
		$sql = $this->db->query("SELECT * FROM assets");
		return $sql->result_array();
		
	}
	public function unitofmeasure()
	{
		$sql = $this->db->query("SELECT * FROM items_buom_list");
		return $sql->result_array();
		
	}
	
	public function addtoasset($deliveryitemsid)
	{
		
		//getdritems details
		$sqlselect = $this->db->query("SELECT * FROM equipments_receiving_items LEFT JOIN equipments_receiving ON equipments_receiving_items.deliveryid = equipments_receiving.deliveryid LEFT JOIN assets ON equipments_receiving_items.assetid = assets.assetid WHERE equipments_receiving_items.deliveryitemsid ='$deliveryitemsid'");
		$drassetdetails = $sqlselect->result_array();
		
		//echo json_encode($lastidinserted[0]);
		$details = $drassetdetails[0];
		print_r($details);
		//echo $details['qty'];
		
		for($ctr=1;$ctr<=$details['qty'];$ctr++){
			
			
			$sqla = "INSERT INTO equipments(assetid,deliveryid,article,particulars,classification,supplierID,dateacquired,totalcost) VALUES (".$this->db->escape($details['assetid']).",".$this->db->escape($details['deliveryid']).",".$this->db->escape($details['asset_article']).",".$this->db->escape($details['asset_particulars']).",".$this->db->escape($details['asset_classification']).",".$this->db->escape($details['supplierid']).",".$this->db->escape($details['receivedate']).",".$this->db->escape($details['unitprice']).")";
			//echo $sqla;
			$this->db->query($sqla);
			
			
			
			$sqlselect1 = $this->db->query("SELECT MAX(equipNo) AS lastid FROM equipments");
			$lastidinserted = $sqlselect1->result_array();
			//echo json_encode($lastidinserted[0]);
			$currentid = $lastidinserted[0]['lastid'];
		
			$sql2 = "INSERT INTO equipments_details(equipNo,assetid) VALUES (".$this->db->escape($currentid).",".$this->db->escape($details['assetid']).")";
			$this->db->query($sql2);
			

		}
		
		
		$sql = "update equipments_receiving_items set status=1 where deliveryitemsid=".$this->db->escape($deliveryitemsid)."";
		$this->db->query($sql);
		
		//echo $sql;
		
		
		

				
		
	}
	
	public function addtoassetbarcode($deliveryitemsid,$prefix,$barcode_from,$barcode_to,$whereabout)
	{
		echo $prefix;
		//getdritems details
		$sqlselect = $this->db->query("SELECT * FROM equipments_receiving_items LEFT JOIN equipments_receiving ON equipments_receiving_items.deliveryid = equipments_receiving.deliveryid LEFT JOIN assets ON equipments_receiving_items.assetid = assets.assetid WHERE equipments_receiving_items.deliveryitemsid ='$deliveryitemsid'");
		$drassetdetails = $sqlselect->result_array();
		
		//echo json_encode($lastidinserted[0]);
		$details = $drassetdetails[0];
		//print_r($details);
		//echo $details['qty'];
		$startcode = $barcode_from;
		for($ctr=1;$ctr<=$details['qty'];$ctr++){
			
			$code = str_pad($startcode, 4, '0', STR_PAD_LEFT);
			
			$barcodeval = $prefix.$code;
			$sqla = "INSERT INTO equipments(assetid,deliveryid,article,particulars,classification,supplierID,dateacquired,totalcost,barcode,whereabout) VALUES (".$this->db->escape($details['assetid']).",".$this->db->escape($details['deliveryid']).",".$this->db->escape($details['asset_article']).",".$this->db->escape($details['asset_particulars']).",".$this->db->escape($details['asset_classification']).",".$this->db->escape($details['supplierid']).",".$this->db->escape($details['receivedate']).",".$this->db->escape($details['unitprice']).",'".$barcodeval."','".$whereabout."')";
			echo $sqla;
			$this->db->query($sqla);
			
			
			
			$sqlselect1 = $this->db->query("SELECT MAX(equipNo) AS lastid FROM equipments");
			$lastidinserted = $sqlselect1->result_array();
			//echo json_encode($lastidinserted[0]);
			$currentid = $lastidinserted[0]['lastid'];
		
			$sql2 = "INSERT INTO equipments_details(equipNo,assetid) VALUES (".$this->db->escape($currentid).",".$this->db->escape($details['assetid']).")";
			$this->db->query($sql2);
			
			$startcode++;

		}
		
		
		$sql = "update equipments_receiving_items set status=1 where deliveryitemsid=".$this->db->escape($deliveryitemsid)."";
		$this->db->query($sql);
		
		//echo $sql;
		
		
		

				
		
	}
	
	public function getcustomreport($reportmodule,$divposition)
	{
		$sql2 = $this->db->query("SELECT content FROM settings_report where divposition='$divposition' AND reportmodule='$reportmodule'");
		
		$result = $sql2->result_array();
		return $result[0]['content'];
		
		
	}
	
	
}

?>