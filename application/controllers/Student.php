<?php

class Student extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
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
            'jsfile' => 'student.js',
			'typeahead' => '0'
			);
	}
	
	public function index()
	{
		
		$js = $this->js;
		$data = $this->data;
		$sfilter = $this->input->post('sfilter');
		
		
		if($sfilter!=''){
			  
		    $data['studentlist'] = $this->student_model->getstudents($sfilter);
		    $data['selectedstatus'] = $sfilter;
		}
		else{
				
			$data['studentlist'] = $this->student_model->getstudents("ACTIVE");
		        $data['selectedstatus'] = "ACTIVE";
		}
		
		
		//$data['filtersection'] = $this->student_model->getsection();
		$this->load->view('inc/header_view');
		$this->load->view('student/student_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
	}
	
	

	
	
	public function details($studid){
		$js = $this->js;
		$data = $this->data;
		$data['title'] = "Student Details";
		$data['studid'] = $studid;

		$data['studentdetails'] = $this->student_model->getstudentsdetails($studid);
		$data['paymentlist'] = $this->student_model->getpaymentlist($studid);
		
		$stud_id  = $data['studentdetails']['studID'];
		
		$base = base_url();
		$data['file_url'] = $base."public/img/students/".$stud_id.".jpg";
		$ch = curl_init($data['file_url']);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($code == 404){
            
			$data['file_url'] = $base."public/img/none.jpg";
        }else{
            
			//$fileurl;
        }
		
		
		$this->load->view('inc/header_view');
		$this->load->view('payment/payment_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}

	public function addpayment(){
		
		
		$dbstudid = $this->input->post('dbstudid');
		$orno = $this->input->post('orno');
		$paydate = $this->input->post('paydate');
		$amount = $this->input->post('amount');
		$appliedto = $this->input->post('appliedto');
		
		

		$this->student_model->addpayment($dbstudid, $orno, $paydate, $amount, $appliedto);
		$data['paymentlist'] = $this->student_model->getpaymentlist();

		
	}
	public function addstudents(){
		
		$rfid = $this->input->post('rfid');
		$sid = $this->input->post('sid');
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$gender = $this->input->post('gender');
		$bday = $this->input->post('bday');
		$sadd = $this->input->post('sadd');
		$guardian = $this->input->post('guardian');
		$guardianadd = $this->input->post('guardianadd');
		$gcp = $this->input->post('gcp');
		$status = $this->input->post('status');
		$grade = $this->input->post('grade');
		$sectionad = $this->input->post('sectionad');
		$escc = $this->input->post('escc');

		$this->student_model->addstudents($rfid, $sid, $lname, $fname, $mname, $gender, $bday, $sadd, $guardian, $guardianadd, $gcp, $status, $grade, $sectionad, $escc);
		
		$base_url = base_url();
		$file = $base_url.'public/img/none.jpg';
		$newfile = 'public/img/students/'.$sid.'.jpg';

		if (!copy($file, $newfile)) {
			echo "failed to copy";
		}
		
	}
	
	

	
public function editstudent(){
		$studid = $this->input->post('studid');
		$studentinfo = $this->student_model->editstudent($studid);
		echo json_encode($studentinfo);
	}

	

	public function updatestudentdetails(){
		
		
		$dbstudidd = $this->input->post('dbstudidd');
		$rfidd = $this->input->post('rfid');
		$sidd = $this->input->post('sid');
		$lnamed = $this->input->post('lname');
		$fnamed = $this->input->post('fname');
		$mnamed = $this->input->post('mname');
		$genderd = $this->input->post('gender');
		$bdayd = $this->input->post('bday');
		$saddd = $this->input->post('sadd');
		$guardiand = $this->input->post('guardian');
		$guardianaddd = $this->input->post('guardianadd');
		$gcpd = $this->input->post('gcp');
		$statuss = $this->input->post('statuss');
		$current_student_grade = $this->input->post('current_student_grade');
		$student_grade = $this->input->post('student_grade');
		$sectiondd = $this->input->post('sectiond');
		$esc = $this->input->post('esc');

		$this->student_model->updatestudentdetails($dbstudidd, $rfidd, $sidd, $lnamed, $fnamed, $mnamed, $genderd, $bdayd, $saddd, $guardiand, $guardianaddd, $gcpd, $statuss, $student_grade, $sectiondd, $esc);
		
		
	}
	
	
	
	public function updatepayment(){
	
	   
		$ornox = $this->input->post('ornox');
		$paydatex = $this->input->post('paydatex');
		$amountx = $this->input->post('amountx');
		$appliedtox = $this->input->post('appliedtox');
		$dbstudidx = $this->input->post('dbstudidx');

		$this->student_model->updatepayment($ornox, $paydatex, $amountx, $appliedtox, $dbstudidx);
		
	}
	
	

	public function deletestudent(){
		$dbstudid = $this->input->post('dbstudid');
		$this->db->delete('student', array('dbstudid' => $dbstudid));
		//$this->items_model->deleteitem($itemno);
	}

	public function displaystudent(){
		$studid = $this->input->post('studid');
		$studentinforeg = $this->student_model->displaystudent($studid);
		echo json_encode($studentinforeg);
	}
	
	

	public function registerstudent(){
		//$dbstudid = $this->input->post('dbstudid');
		$rfid = $this->input->post('rfid');
		$sid = $this->input->post('sid');
		$regdate = $this->input->post('regdate');
		$yrlvl = $this->input->post('yrlvl');
		$section = $this->input->post('section');
		$sy = $this->input->post('sy');
		

		$this->student_model->registerstudent($rfid, $sid, $regdate, $yrlvl, $section, $sy);
		
		
	}
	public function upload(){
        
        if ( ! empty($_FILES)){
            
            $config['upload_path'] = "./assets/img";
            $config['allowed_types'] = 'jpg|jpeg|svg|png|gif';
            
            $this->load->library('upload', $config);
            if(! $this->upload->do_upload("advertisementphotousera")){
                echo "File cannot be uploaded";
            }

        }else{
                $this->listFiles();
        }
        
        
    }
    
    private function listFiles(){
        
        $this->load->helper('file');
        $files = get_filenames("./assets/img");
        echo json_encode($files);
        
    }
    public function saveadimage(){
		$dbstudids = $this->input->post('dbstudids');
		$adimage = $this->input->post('adimage');
	
		$this->student_model->saveadimage($dbstudids, $adimage);
		
		
	}
	
	
		public function file_view(){
		
		$this->load->view('file_view', array('error' => ' ' ));
		
		}

		
		public function do_upload(){

			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "15360", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "770",
			'max_width' => "1028"
			);
			//'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
			
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success',$data);
			}
			
			else {

			$error = array('error' => $this->upload->display_errors());
			$this->load->view('file_view', $error);
			
			}
		}
	
	
	
	
	
	

	
	
}