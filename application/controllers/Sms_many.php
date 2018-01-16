<?php

class Sms_many extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sms_many_model');
		$this->data = array(
            'title' => 'Send Sms To Many',
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
			'createannouncementclass' => '',
			'smsoneclass' => '',
			'sendmanyclass' => 'active',
			'aboutclass' => ''

			);
			
			$this->js = array(
            'jsfile' => 'smsmany.js',
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

		
		$fgrade = $this->input->post('fgrade');
		$fsection = $this->input->post('fsection');
	
		$data['guardiandetails'] = $this->sms_many_model->smsfilter($fgrade, $fsection);
	    $data['filtersection'] = $this->sms_many_model->getsection();
	

		
		
		if($fgrade!=''){
			  
		    $data['guardiandetails'] = $this->sms_many_model->getclass($fgrade, $fsection);
					
			}else{
				
			$data['guardiandetails'] = array();
		}
		


		
		$this->load->view('inc/header_view');
		$this->load->view('Sms_many/Sms_many_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
		
		
		
	
		
	}
	
		
		
	
		//$data['studentlist'] = $this->sms_one_model->getstudents();
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		//$data['announcementlist'] = $this->create_announcement_model->getannouncement();
		
		
		
		
	
		
	}
	


	
	
	

	
	
