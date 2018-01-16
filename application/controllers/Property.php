<?php

class Property extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('asset_model');
		$this->load->model('employees_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Asset Management',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => 'active',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => 'active',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Asset',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'assetmanagement_property.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['equipments'] = $this->asset_model->getallequipment();
		$data['supplierlist'] = $this->asset_model->getsupplierlist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/property_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function getesinglequipment($equipno){
		
		$equipment = $this->asset_model->getsingleequipment($equipno);

		echo json_encode($equipment);
	}
	public function updateproperty(){
		
		$equipno = $this->input->post('equipno');
		$propertyno = $this->input->post('propertyno');
		$particulars = $this->input->post('particulars');
		$dateacquired = $this->input->post('dateacquired');
		$unitprice = $this->input->post('unitprice');
		$accountcode = $this->input->post('accountcode');
		$barcode = $this->input->post('barcode');
		$service = $this->input->post('service');
		$supplierid = $this->input->post('supplierid');
		$inventorytag = $this->input->post('inventorytag');

		$this->asset_model->updateproperty($equipno,$propertyno,$particulars,$dateacquired,$unitprice,$accountcode,$barcode,$service,$supplierid,$inventorytag);
		
		
	}
	public function updateusertab(){
		
		$equipno = $this->input->post('equipno');
		$issuedto = $this->input->post('issuedto');
		$enduser = $this->input->post('enduser');
		

		$this->asset_model->updateusertab($equipno,$issuedto,$enduser);
		
		
	}
	public function updateremarks(){
		
		$equipno = $this->input->post('equipno');
		$whereabout = $this->input->post('whereabout');
		$remarks = $this->input->post('remarks');
		

		$this->asset_model->updateremarks($equipno,$whereabout,$remarks);
		
		
	}
	public function updatepheriperal(){
		
		$equipno = $this->input->post('equipno');
		$processor = $this->input->post('processor');
		$ram = $this->input->post('ram');
		$harddisk = $this->input->post('harddisk');
		$operatingsystem = $this->input->post('operatingsystem');
		$equipmentsn = $this->input->post('equipmentsn');
		$processorsn = $this->input->post('processorsn');
		$monitorsn = $this->input->post('monitorsn');
		$keyboardsn = $this->input->post('keyboardsn');
		$mousesn = $this->input->post('mousesn');
		

		$this->asset_model->updatepheriperal($equipno,$processor,$ram,$harddisk,$operatingsystem,$equipmentsn,$processorsn,$monitorsn,$keyboardsn,$mousesn);
		
		
	}
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['deliveryid'] = $id;
		$data['aprlist'] = $this->receiving_model->getaprlist();
		$data['polist'] = $this->receiving_model->getpolist();
		$data['supplierlist'] = $this->receiving_model->getsupplierlist();

		$data['dr_list_items'] = $this->receiving_model->get_list_items($id);
		$data['deliverydetails'] = $this->receiving_model->getdeliverydetails($id);
		
		//display delivery
		$this->load->view('inc/header_view');
		$this->load->view('purchases/rrdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function deletedelivery(){
		$deliveryid = $this->input->post('deliveryid');
		$this->db->delete('purchase_receiving', array('deliveryid' => $deliveryid));
		$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	
	public function updateunitprice(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$unitprice = $this->input->post('unitprice');
		
		$this->receiving_model->updateunitprice($deliveryitemsid,$unitprice);
	}
	
	public function getitemlist(){
		
		$items = $this->receiving_model->getitemlist();
		$tokens = array();
		foreach($items as $items_array){
			$tokens[] = $items_array['itemNo'] . "-". $items_array['description'];
		}
		echo json_encode($tokens);

	}
	
	public function getitemunit(){
		$itemid = $this->input->post('itemid');
				
		$rows = $this->receiving_model->getitemunitlist($itemid);
		$conversioncount = $this->receiving_model->checkconvertion($itemid);
		//echo $conversioncount;
		if($conversioncount>0){
			$conversionunits = $this->receiving_model->conversionunit($itemid);
			//$sqlselect2 = "SELECT equiv_unit,base_qty,base_unit FROM items_buom where itemNo=$itemid";
			//$stmt2 = $conn->prepare($sqlselect2);
			//$stmt2->execute();
			//$additional = $stmt2->fetchAll(PDO::FETCH_ASSOC);
			
			//$conn = null;
			$merge = array_merge($rows, $conversionunits); 
			echo json_encode($merge);
		}
		else{
			echo json_encode($rows);
			//print_r($rows[0]);
			//echo json_encode($rows);
			//echo $sqlselect;
			//$conn = null;
		}

		
	}
	
	
	public function additemreceived(){
		
		$deliveryid = $this->input->post('deliveryid');
		$drno = $this->input->post('drno');
		$itemid = $this->input->post('itemid');
		$itemqty = $this->input->post('itemqty');
		$itemunit = $this->input->post('itemunit');
		$unitcost = $this->input->post('unitcost');
		
		
		$this->receiving_model->additem($deliveryid,$drno,$itemid,$itemqty,$itemunit,$unitcost);
		
		
	}
	
	public function deletedritem(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$this->db->delete('purchase_receiving_items', array('deliveryitemsid' => $deliveryitemsid));
		
		
		
	}
	
	public function savedelivery(){
		
		$receiveddate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$supplierid = $this->input->post('supplierid');
		$invoiceno = $this->input->post('invoiceno');
				
		
		$this->receiving_model->adddelivery($receiveddate,$drno,$aprid,$poid,$supplierid,$invoiceno);
		
		
	}
	public function updatedelivery(){
		
		$receivedate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$supplierid = $this->input->post('supplierid');
		$deliveryid = $this->input->post('deliveryid');
		$status = $this->input->post('status');
		$invoiceno = $this->input->post('invoiceno');

		$this->receiving_model->updatedelivery($receivedate,$drno,$aprid,$poid,$supplierid,$deliveryid,$status,$invoiceno);

		
	}
	
	public function downloadproperty()
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Issued Supplies and Materials');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT equipments.propertyNo,equipments.particulars,equipments.dateacquired,equipments.totalcost,concat(employee.fname,' ',employee.lname),equipments.enduser,equipments.article,equipments.classification,equipments.accountcode,equipments.service,equipments.whereabout,equipments.remarks,equipments.inventorytag,equipments.barcode,suppliers.supName,equipments_details.ram,equipments_details.hd,equipments_details.equipsn,equipments_details.processor,equipments_details.processorsn,equipments_details.monitorsn,equipments_details.keyboardsn,equipments_details.mousesn
FROM equipments
LEFT JOIN equipments_details
ON equipments.equipNo = equipments_details.equipNo
LEFT JOIN suppliers
ON equipments.supplierID = suppliers.supplierID
LEFT JOIN employee
ON equipments.issuedto = employee.eid
");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Property No', 'Particulars','Date Acquired','Total Cost','Assigned To','End User','Article','Classification','Account Code','Service','Whereabout','Remarks','Inventory Tag','Barcode','Supplier Name','RAM','HD','Equipment SN','Processor','Processor SN','Monitor SN','Keyboard SN','Mouse SN');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='Property_report.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	
	

}