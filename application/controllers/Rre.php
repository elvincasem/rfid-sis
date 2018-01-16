<?php

class Rre extends CI_Controller
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
            'title' => 'R.R.E.',
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
			'subnavtitle' => 'Receipt of Returned Equipment',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => 'active',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'assetmanagement_rre.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		
		$js = $this->js;


		$data['rrelist'] = $this->asset_model->getrrelist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/rre_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['rreid'] = $id;
		

		$data['rremaindetails'] = $this->asset_model->getrremaindetails($id);
		$data['propertylist'] = $this->asset_model->getpropertylist();
		$data['rreitems'] = $this->asset_model->getrreitems($id);
		
		
		$data['header'] = $this->asset_model->getcustomreport("RRE","HEADER");
		$data['column1'] = $this->asset_model->getcustomreport("RRE","COLUMN1");
		//print_r($data['pardetails']);
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/rredetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function saverre(){
		
		$rredate = $this->input->post('rredate');
		$rreno = $this->input->post('rreno');
		$rreenduser = $this->input->post('rreenduser');

		$this->asset_model->saverre($rredate,$rreno,$rreenduser);
		
		
	}
	public function deleterre(){
		$rreid = $this->input->post('rreid');
		$this->db->delete('equipments_rre', array('rreid' => $rreid));
		
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
	
	
	public function updaterredetails(){
		
		$rreid = $this->input->post('rreid');
		$rreno = $this->input->post('rreno');
		$rredate = $this->input->post('rredate');
		$rreenduser = $this->input->post('rreenduser');
		
		

		$this->asset_model->updaterredetails($rreid,$rreno,$rredate,$rreenduser);
		
		
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
	public function addpropertytolistrre(){
		
		$rreid = $this->input->post('rreid');
		$equipno = $this->input->post('equipno');
		$assetid = $this->input->post('assetid');
		$parics = $this->input->post('parics');
		$rreenduser_item = $this->input->post('rreenduser_item');
		$rre_remarks = $this->input->post('rre_remarks');
		
		$this->asset_model->addpropertytolistrre($rreid,$equipno,$assetid,$parics,$rreenduser_item,$rre_remarks);
		
		
	}
	
	
	public function deleterreitem(){
		$rreitemsid = $this->input->post('rreitemsid');
		$this->db->delete('equipments_rre_items', array('rreitemsid' => $rreitemsid));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}

}