<?php

class About extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		  $this->data = array(
            'title' => 'About Us',
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
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => 'active',
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
			'createannouncementclass' => '',
			'smsoneclass' => '',
			'sendmanyclass' => '',
			'aboutclass' => 'active'

			);
			
			$this->js = array(
            'jsfile' => 'about.js',
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

	
		$sendsms= $this->input->post('sendsms');
		
		if($sendsms!=''){
			$this->about_model->updatesmssettings($sendsms);
		}else{
			
		}
	
		//$data['studentlist'] = $this->sms_one_model->getstudents();
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		//$data['announcementlist'] = $this->create_announcement_model->getannouncement();
		
		
		$smsresult = $this->about_model->getsmsstatus();
		$sms_status = $smsresult[0]['enableSMS'];
		
		$data['sms_status'] = $sms_status;
		
		$this->load->view('inc/header_view');
		$this->load->view('about/about_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}


}