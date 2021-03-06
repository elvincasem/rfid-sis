<?php

class Registration extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model');
		  $this->data = array(
            'title' => 'Registration',
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
			'reportingclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
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
			'registrationclass' => 'active',
			'createannouncementclass' => '',
			'reportclass' => '',
			'smsoneclass' => '',
			'sendmanyclass' => '',
			'aboutclass' => ''
			);
			
			$this->js = array(
            'jsfile' => 'registration.js',
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
		$data['registrationlist'] = $this->registration_model->getregistrations();
		
		//$data['dashboardchart'] = json_encode($this->dashboard_model->getyearlychart());
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('registration/registration_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}

	public function editregistration(){
		$studid = $this->input->post('studid');
		$reginfo = $this->registration_model->editregistration($studid);
		echo json_encode($reginfo);
	}
	public function updateregistration(){
		
		$rfid = $this->input->post('rfid');
		$regdate = $this->input->post('regdate');
		$yrlvl = $this->input->post('yrlvl');
		$section = $this->input->post('section');
		$sy = $this->input->post('sy');
		
		

		$this->registration_model->updateregistration($rfid, $regdate, $yrlvl, $section, $sy);
		
		
	}
	public function deleteregistration(){
		$refNo = $this->input->post('refNo');
		$this->db->delete('registration', array('refNo' => $refNo));
		//$this->items_model->deleteitem($itemno);
	}


	
	
}