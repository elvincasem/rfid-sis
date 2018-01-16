<?php

class Suppliers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('suppliers_model');
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
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => 'active',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => 'active',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Suppliers',
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
            'jsfile' => 'settings_suppliers.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['supplierlist'] = $this->suppliers_model->getsupplierlist();

		$this->load->view('inc/header_view');
		$this->load->view('settings/suppliers_view',$data);
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
	
	public function savesupplier(){
		$suppliername = $this->input->post('suppliername');
		$address = $this->input->post('address');
		$contactno = $this->input->post('contactno');
		$products = $this->input->post('products');
		$email = $this->input->post('email');
		$tin = $this->input->post('tin');
		
		$this->suppliers_model->savesupplier($suppliername,$address,$contactno,$products,$email,$tin);
	}
	
	
	public function deletesupplier(){
		$supplierid = $this->input->post('supplierid');
		$this->db->delete('suppliers', array('supplierID' => $supplierid));
		
		
	}
	
	public function editsupplier(){

		$supplierid = $this->input->post('supplierid');	
		$supplierdetails = $this->suppliers_model->editsupplier($supplierid);

		echo json_encode($supplierdetails);
		
	
	}
	
	public function updatesupplier(){
		$suppliername = $this->input->post('suppliername');
		$address = $this->input->post('address');
		$contactno = $this->input->post('contactno');
		$products = $this->input->post('products');
		$email = $this->input->post('email');
		$tin = $this->input->post('tin');
		$supplierid = $this->input->post('supplierid');
		
		$this->suppliers_model->updatesupplier($suppliername,$address,$contactno,$products,$email,$tin,$supplierid);
	}
	
	
	

}