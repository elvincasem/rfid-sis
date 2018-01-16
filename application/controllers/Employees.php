<?php

class Employees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('employees_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Settings',
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
			'employeesclass' => 'active',
			'inventoryclass' => '',
			'subnavtitle' => 'Employees',
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
            'jsfile' => 'settings_employees.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['employeeslist'] = $this->employees_model->getemployeeslist();

		$this->load->view('inc/header_view');
		$this->load->view('settings/employees_view',$data);
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
	
	public function saveemployee(){
		$empno = $this->input->post('empno');
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$extension = $this->input->post('extension');
		$designation = $this->input->post('designation');
		
		$this->employees_model->saveemployee($empno,$lname,$fname,$mname,$extension,$designation);
	}
	
	public function deleteemployee(){
		$eid = $this->input->post('eid');
		$this->db->delete('employee', array('eid' => $eid));
		
		
	}
	

}