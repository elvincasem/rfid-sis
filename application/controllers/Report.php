<?php

class Report extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		  $this->data = array(
            'title' => 'Report',
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
			'suppliersclass' => 'active',
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
			'reportclass' => 'active',
			'createannouncementclass' => '',
			'smsoneclass' => '',
			'sendmanyclass' => '',
			'aboutclass' => ''

			);
			
			$this->js = array(
            'jsfile' => 'report.js',
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

		$yrlvlr = $this->input->post('yrlvlr');
		$section = $this->input->post('section');
		$to = $this->input->post('to');
		$from = $this->input->post('from');
		$fdate = $this->input->post('fdate');
		$ftime = $this->input->post('ftime');
		
		
		
		
		if($fdate==null){
			
			$data['filterlist'] = $this->report_model->logbook();
			$data['datefilter'] = "";
		}else{
			$data['filterlist'] = $this->report_model->printlogbook($fdate);
			$data['datefilter'] = $fdate;
			
		}
		//$data['dashboardchart'] = json_encode($this->dashboard_model->getyearlychart());
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('report/report_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	

	
	
}