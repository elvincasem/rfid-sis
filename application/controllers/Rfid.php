<?php

class Rfid extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rfid_model');
		  $this->data = array(
            'title' => 'Student',
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
			'studentclass' => 'active',
			'registrationclass' => '',
			'reportclass' => '',
			'createannouncementclass' => '',
			'smsoneclass' => '',
			'sendmanyclass' => '',
			'aboutclass' => ''

			);
			
			$this->js = array(
            'jsfile' => 'rfid.js',
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
		//$data['studentlist'] = $this->student_model->getstudents();
		
		//$data['dashboardchart'] = json_encode($this->dashboard_model->getyearlychart());
		//$data['totalreq'] = $this->dashboard_model->gettotalreq();
		//$data['totalproperty'] = $this->dashboard_model->gettotalproperty();
		//$data['totalitems'] = $this->dashboard_model->gettotalitems();
		//$data['lowstock'] = $this->dashboard_model->getlowstock();
		
		
		
		
		$this->load->view('inc/rfid_header_view');
		$this->load->view('rfid/rfid_view',$data);
		$this->load->view('inc/footer_view',$js);
		

		
		
	}

	public function details(){
		$rfid = $this->input->post('rfid');
		$studentinfo = $this->rfid_model->details($rfid);
		echo json_encode($studentinfo);
	}
	
	
	
	public function setimage(){
		
		$this->load->helper('directory'); //load directory helper
		$dir = "..uploads/"; // Your Path to folder
		$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

	}
	
	public function studentlog(){
		
		$rfid1= $this->input->post('rfid');
		$this->rfid_model->studentlog($rfid1);
		
		$this->sendsms($rfid1);
	}
	
	public function studentlog2(){
		
		$rfid2 = $this->input->post('rfid2');
		$this->rfid_model->studentlog($rfid2);
		
		$this->sendsms($rfid2);
	}

	public function sendsms($rfid){
		//echo "test";
		//echo shell_exec("c:/SmsSend.exe");
		
		//check settingsclass
		$smssettings = $this->rfid_model->getsmssettings();
		//print_r($smssettings);
		$sendsms_value = $smssettings[0]['enableSMS'];
		$comport_value = $smssettings[0]['comport'];
		
		if($sendsms_value=="YES"){
			
			$student_info = $this->rfid_model->getstudenttosms($rfid);
			$studentname = $student_info[0]['fname']." ".$student_info[0]['lname'];
			$sendtosmsnumber = $student_info[0]['guardianCP'];
			
			$this->load->helper('date');
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Manila'));
			$now_timestamp = $now->format('Y-m-d H:i:s');
			
			$message = "FROM UIR: Your child ".$studentname." arrived school at exactly $now_timestamp";
			
			//$execute = "c:/SmsSend.exe -service nt -via COM3 09468147457 'test'";
			echo exec('c:/SmsSend.exe -service nt -via COM3 '.$sendtosmsnumber.' "'.$message.'"');
			//echo $message;
			
		}else{
			//do not send
		}
		
		
		
	}
	
	

	
	
}