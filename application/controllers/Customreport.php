<?php

class Customreport extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('customreport_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Compose SMS',
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
			'subnavtitle' => 'Create Message',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => 'active',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'settings_customreport.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['customreportlist'] = $this->customreport_model->getcustomreport();

		$this->load->view('inc/header_view');
		$this->load->view('settings/report_view',$data);
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
	
	public function updatefooter(){
		
		$footerid = $this->input->post('footerid');
		$content = $this->input->post('content');


		$this->customreport_model->updatefooter($footerid,$content);

	}

	
	public function getsinglefooter(){
		$footerid = $this->input->post('footerid');
		$footedetails = $this->customreport_model->getsinglefooter($footerid);

		echo json_encode($footedetails);
	}
	

}