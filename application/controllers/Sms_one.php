<?php

class Sms_one extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sms_one_model');
		$this->load->model('rfid_model');
		  $this->data = array(
            'title' => 'Send SMS',
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
			'smsoneclass' => 'active',
			'sendmanyclass' => '',
			'aboutclass' => ''

			);
			
			$this->js = array(
            'jsfile' => 'smsone.js',
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

	
		
		
	
		$data['studentlist'] = $this->sms_one_model->getstudents();
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('sms_one/sms_one_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}

	public function displaysms(){
		$studid = $this->input->post('studid');
		$reginfo = $this->sms_one_model->displaysms($studid);
		echo json_encode($reginfo);
	}

	public function sendsms2(){
		$studid = $this->input->post('dbstudid');
		$cpno = $this->input->post('cpno');
		$message = $this->input->post('message');
		$sent = $this->input->post('sent');
		$savesms = $this->sms_one_model->sendsms($studid, $cpno, $message, $sent);
		echo json_encode($reginfo);
	}
	
	public function sendsms(){

		$cpno = $this->input->post('cpno');
		$message = $this->input->post('message');
		//check settingsclass
		$smssettings = $this->rfid_model->getsmssettings();
		//print_r($smssettings);
		$sendsms_value = $smssettings[0]['enableSMS'];
		$comport_value = $smssettings[0]['comport'];
		
		
		
		if($sendsms_value=="YES"){
			
			//$student_info = $this->rfid_model->getstudenttosms($rfid);
			//$studentname = $student_info[0]['fname']." ".$student_info[0]['lname'];
			//$sendtosmsnumber = $student_info[0]['guardianCP'];
			
			//$this->load->helper('date');
			//$now = new DateTime();
			//$now->setTimezone(new DateTimezone('Asia/Manila'));
			//$now_timestamp = $now->format('Y-m-d H:i:s');
			
			//$message = "FROM UIR: Your child ".$studentname." arrived school at exactly $now_timestamp";
			
			//$execute = "c:/SmsSend.exe -service nt -via COM3 09468147457 'test'";
			echo exec('c:/SmsSend.exe -service nt -via COM3 '.$cpno.' "'.$message.'"');
			//echo $message;
			
		}else{
			//do not send
		}
		
		
		
	}
	

	
	
}