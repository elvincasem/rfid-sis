<?php

class Ptr extends CI_Controller
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
            'title' => 'P.T.R.',
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
			'subnavtitle' => 'Propert Transfer Report',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => 'active',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'assetmanagement_ptr.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		
		$js = $this->js;

		
		
		//$data['assetlist'] = $this->asset_model->getassetlist();
		//$data['article'] = $this->settings_model->articlelist();
		//$data['classification'] = $this->settings_model->classificationlist();
		$data['ptrlist'] = $this->asset_model->getptrlist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/ptr_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['ptrid'] = $id;
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
		$data['ptritems'] = $this->asset_model->getptritems($id);
		$data['propertylist'] = $this->asset_model->getpropertylist();
		$data['ptrdetails'] = $this->asset_model->getptrdetails($id);
		
		$data['column1'] = $this->asset_model->getcustomreport("PTR","COLUMN1");
		$data['column2'] = $this->asset_model->getcustomreport("PTR","COLUMN2");
		//print_r($data['pardetails']);
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/ptrdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function saveptr(){
		
		$ptrno = $this->input->post('ptrno');
		$ptrdate = $this->input->post('ptrdate');
		$ptrfrom = $this->input->post('ptrfrom');
		$ptrto = $this->input->post('ptrto');
		$transfertypevalue = $this->input->post('transfertypevalue');
		$reasonfortransfer = $this->input->post('reasonfortransfer');

		$this->asset_model->saveptr($ptrno,$ptrdate,$ptrfrom,$ptrto,$transfertypevalue,$reasonfortransfer);
		
		
	}
	public function deleteics(){
		$icsid = $this->input->post('icsid');
		$this->db->delete('equipments_ics', array('icsid' => $icsid));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
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
	
	
	public function updateptrdetails(){
		
		$ptrid = $this->input->post('ptrid');
		$fromoffice = $this->input->post('fromoffice');
		$ptrno = $this->input->post('ptrno');
		$ptrdate = $this->input->post('ptrdate');
		$tooffice = $this->input->post('tooffice');
		$transferreason = $this->input->post('transferreason');
		

		$this->asset_model->updateptrdetails($ptrid,$fromoffice,$ptrno,$ptrdate,$tooffice,$transferreason);
		
		
	}
	
	
	
	public function getesinglequipment($equipno){
		
		$equipment = $this->asset_model->getsingleequipment($equipno);

		echo json_encode($equipment);
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
	public function addpropertytolistptr(){
		
		$ptrid = $this->input->post('ptrid');
		$equipno = $this->input->post('equipno');
		$assetid = $this->input->post('assetid');
		
		$this->asset_model->addpropertytolistptr($ptrid,$equipno,$assetid);
		
		
	}
	
	
	public function deleteptritem(){
		$paritem = $this->input->post('paritem');
		$this->db->delete('equipments_ptr_items', array('ptritemsid' => $paritem));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}

}