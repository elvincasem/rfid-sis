<?php

class Warehouse extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('warehouse_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Inbox',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => 'active',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Received Messages',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => 'active'
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'settings_warehouse.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['warehouselist'] = $this->warehouse_model->getwarehouselist();

		$this->load->view('inc/header_view');
		$this->load->view('settings/warehouse_view',$data);
		$this->load->view('inc/footer_view',$js);
		
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
	
	public function savewarehouse(){
		$warehousename = $this->input->post('warehousename');
		
		
		$this->warehouse_model->savewarehouse($warehousename);
	}
	
	
	public function deletewarehouse(){
		$warehouseid = $this->input->post('warehouseid');
		$this->db->delete('warehouse', array('warehouseid' => $warehouseid));
		
		
	}
	
	
	

}