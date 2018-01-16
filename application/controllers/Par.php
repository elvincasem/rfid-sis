<?php

class Par extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('asset_model');
		$this->load->model('settings_model');
		$this->load->model('employees_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'P.A.R.',
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
			'propertyclass' => '',
			'parclass' => 'active',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Property Acknowledgement Receipt',
			'typeahead' => '1',
			'parclass' => 'active',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'assetmanagement_par.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		
		$js = $this->js;

		
		
		//$data['assetlist'] = $this->asset_model->getassetlist();
		//$data['article'] = $this->settings_model->articlelist();
		//$data['classification'] = $this->settings_model->classificationlist();
		$data['parlist'] = $this->asset_model->getparlist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/par_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['parid'] = $id;
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
/*
		$data['assetdetails'] = $this->asset_model->getassetdetails($id);
		$data['article'] = $this->settings_model->articlelist();
		$data['classification'] = $this->settings_model->classificationlist();
		$data['equipments'] = $this->asset_model->getequipment($id);
		$data['supplierlist'] = $this->asset_model->getsupplierlist();
		
		//print_r($data['supplierlist']);
		//display asset
		*/
		//$data['subnavtitle'] =$data['assetdetails']['asset_particulars'];
		$data['paritems'] = $this->asset_model->getparitems($id);
		$data['propertylist'] = $this->asset_model->getpropertylist();
		$data['pardetails'] = $this->asset_model->getpardetails($id);
		$data['footer_par'] = $this->asset_model->getfooter("PAR","ISSUEDBY");
		//print_r($data['pardetails']);
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/pardetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function savepar(){
		
		$pardate = $this->input->post('pardate');
		$parno = $this->input->post('parno');
		$eid = $this->input->post('eid');

		$this->asset_model->savepar($pardate,$parno,$eid);
		
		
	}
	
	public function deletepar(){
		$parid = $this->input->post('parid');
		$this->db->delete('equipments_par', array('parid' => $parid));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	
	public function updatepardetails(){
		
		$parid = $this->input->post('parid');
		$employeeid = $this->input->post('employeeid');
		$parno = $this->input->post('parno');
		$pardate = $this->input->post('pardate');
		

		$this->asset_model->updatepardetails($parid,$employeeid,$parno,$pardate);
		
		
	}
	
	public function deleteasset(){
		$assetid = $this->input->post('assetid');
		$this->db->delete('assets', array('assetid' => $assetid));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	public function deleteequip(){
		$equipno = $this->input->post('equipno');
		
		
		//update status receiving asset
		
		$this->asset_model->updatereceiving($equipno );
		
		//delete
		$this->db->delete('equipments', array('equipNo' => $equipno));
		$this->db->delete('equipments_details', array('equipNo' => $equipno));
		
		
		
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
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
	
	public function showasset_unit(){
		$equipno = $this->input->post('equipno');
		$equipment = $this->asset_model->getassetunit($equipno);

		echo json_encode($equipment);
	}
	
	public function addpropertytolist(){
		
		$parid = $this->input->post('parid');
		$equipno = $this->input->post('equipno');
		$assetid = $this->input->post('assetid');
		
		$this->asset_model->addpropertytolist($parid,$equipno,$assetid);
		
		
	}
	
	public function deleteparitem(){
		$paritem = $this->input->post('paritem');
		$this->db->delete('equipments_par_items', array('paritemsid' => $paritem));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}

}