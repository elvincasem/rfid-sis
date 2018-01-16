<?php

class Create_announcement extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('create_announcement_model');
		  $this->data = array(
            'title' => 'Create Announcement',
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
			'settingsclass' => '',
			'reportingclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => 'active',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Dashboard',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => '',
			'studentclass' => '',
			'registrationclass' => '',
			'reportclass' => '',
			'createannouncementclass' => 'active',
			'smsoneclass' => '',
			'sendmanyclass' => '',
			'aboutclass' => ''

			);
			
			$this->js = array(
            'jsfile' => 'createannouncement.js',
			'typeahead' => '0'
			);
	}
	
	public function index()
	{
		/*$this->load->helper('url');
		$data['title'] = "Welcome";
		$data['heiclass'] = "";
		$data['heilist'] = "";
		$data['programlist'] = "";
		$data['deanslist'] = "";
		$data['contacts'] = "";
		$data['accounts'] = "";
		$data['programapplication'] = "";
		$data['permits'] = "";*/
		$js = $this->js;
		$data = $this->data;

	
		
		
	
		//$data['studentlist'] = $this->sms_one_model->getstudents();
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		$data['announcementlist'] = $this->create_announcement_model->getannouncement();
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('create_announcement/create_announcement_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}

	public function displayannounce(){
		$refno = $this->input->post('refno');
		$studentinfo = $this->create_announcement_model->displayannounce($refno);
		echo json_encode($studentinfo);
	}

	public function sendsms(){
		
		$dateito = $this->input->post('dateito');
		$message = $this->input->post('message');
		

		$this->create_announcement_model->sendsms($dateito, $message);
		
		
	}
	public function deleteannounce(){
		$refno = $this->input->post('refno');
		$this->db->delete('sms', array('refNo' => $refno));
		//$this->items_model->deleteitem($itemno);
	}


	
	
	

	
	
}