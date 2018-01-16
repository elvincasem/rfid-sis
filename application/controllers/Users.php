<?php

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('employees_model');
		 $this->data = array(
            'title' => 'Purchases',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => 'active',
			'userssubclass' => 'active',
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
			'subnavtitle' => 'Users',
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
            'jsfile' => ''
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Users Directory") ;
		$data['users_list'] = $this->users_model->get();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('users/users_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	
	
	

	
	
}