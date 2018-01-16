<?php

class Reports extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('reports_model');
		$this->load->model('employees_model');
		//$this->load->model('employees_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Reports',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => 'active',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => '',
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
            'jsfile' => 'reports.js'
			);
	}
	/*
	
	public function index()
	{
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Users list');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT responseid,responsedate,officeunit,CONCAT(fname,' ',lname) AS personinvolved,resname,address,contactno,courteous,promptservice,accurateinfo,honest,adequateinfo,clearprocedure,adequatefacility,satisfied,suggestions,timeadded FROM aces_form LEFT JOIN employee ON aces_form.eid = employee.eid LEFT JOIN officeunit ON aces_form.officeid = officeunit.officeid");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Response ID', 'Response date','Office/Unit','Person Involved','Respondent Name','Address','contactno','Courteous','Promptservice','Accurateinfo','Honest','Adequate Info','Clear Procedure','Adequate Facility','Satisfied','Suggestions','Time');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='ACES_Results.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		//$this->load->view('form_view');
		
		/*$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Higher Education Institution Directory") ;
		$data['heidirectory'] = $this->heidirectory_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/heidirectory_view',$data);
		$this->load->view('inc/footer_view');
		
		
	}*/
	
	public function purchaserequestdownload($from,$to)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('APR Request');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT aprdate,purchase_apr.aprno,description,purchase_receiving_items.qty,purchase_receiving_items.unitcost,(purchase_receiving_items.unitcost*purchase_receiving_items.qty) AS totalamount,receivedate FROM purchase_receiving_items LEFT JOIN purchase_receiving ON purchase_receiving_items.deliveryid = purchase_receiving.deliveryid LEFT JOIN purchase_apr ON purchase_receiving.aprid = purchase_apr.aprid 
LEFT JOIN items ON purchase_receiving_items.itemNo = items.itemNo
WHERE purchase_receiving.aprid >= '1' AND aprdate BETWEEN '$from' AND '$to'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Date of PR', 'Purchase Request Number','Item','QTY','Price per Unit','Amount','Date of Inspection');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='APR_List.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	public function stockcard($itemno)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Stock Card');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT * FROM ((SELECT 'Received' AS operation,purchase_receiving_items.drno AS reference,purchase_receiving_items.itemNo,purchase_receiving_items.unit,purchase_receiving_items.qty,purchase_receiving_items.time_stamp AS created,purchase_receiving.purpose FROM purchase_receiving_items LEFT JOIN purchase_receiving ON purchase_receiving_items.deliveryid =purchase_receiving.deliveryid) UNION ALL (SELECT 'Issued' AS operation,requisition_items.requisition_no AS reference,requisition_items.itemNo,requisition_items.unit,requisition_items.qty,requisition_items.time_stamp AS created,requisition_details.purpose FROM requisition_items LEFT JOIN requisition_details ON requisition_items.reqid = requisition_details.reqid)) results WHERE results.itemNo = $itemno ORDER BY created ASC ");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Operation','Reference','itemno','Unit','QTY','Date','Purpose','Balance');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='Stock_Card_item_'.$itemno.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	
	public function assetissued(){
		
		$data = $this->data;
		$js = $this->js;
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		//$data['yearrecord'] = $this->reports_model->getyearrecord();
		$this->load->view('inc/header_view');
		$this->load->view('reports/assetissued_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	public function assetissued_view($eid){
		
		
		$data = $this->data;
		$js = $this->js;

		
		$data['eid'] = $eid;
		$data['propertylist'] = $this->reports_model->getallequipmentbyeid($eid);
		//$data['prrequest'] =$this->reports_model->getpr($from,$to);
		$this->load->view('inc/header_view');
		$this->load->view('reports/assetissued_report_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
	}
	
	public function purchaserequest(){
		
		$data = $this->data;
		$js = $this->js;

		//$data['yearrecord'] = $this->reports_model->getyearrecord();
		$this->load->view('inc/header_view');
		$this->load->view('reports/purchaserequest_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function purchaserequest_view($from,$to){
		
		
		$data = $this->data;
		$js = $this->js;

		$data['datefrom'] = $from;
		$data['dateto'] = $to;
		$data['prrequest'] =$this->reports_model->getpr($from,$to);
		$this->load->view('inc/header_view');
		$this->load->view('reports/purchaserequest_report_view',$data);
		$this->load->view('inc/footer_view',$js);
		/*$data = $this->data;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}*/
		
	}
	
	public function utilization(){
		
		$data = $this->data;
		$js = $this->js;

		//$data['yearrecord'] = $this->reports_model->getyearrecord();
		$this->load->view('inc/header_view');
		$this->load->view('reports/utilization_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function utilization_view($from,$to){
		
		

		$data = $this->data;
		$js = $this->js;

		$data['datefrom'] = $from;
		$data['dateto'] = $to;
		$data['rislist'] =$this->reports_model->getutilization($from,$to);
		$this->load->view('inc/header_view');
		$this->load->view('reports/utilization_report_view',$data);
		$this->load->view('inc/footer_view',$js);
		/*$data = $this->data;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}*/
		
	}
	
	public function utilizationdownload($from,$to)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Utilization');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT description,CONCAT(fname,' ',lname) AS requester,requisition_items.qty,items.unitCost,(qty*unitCost) AS totalcost FROM requisition_items LEFT JOIN items ON requisition_items.itemno=items.itemNo 
LEFT JOIN requisition_details ON requisition_items.reqid = requisition_details.reqid
LEFT JOIN employee ON requisition_details.eid = employee.eid WHERE requisition_details.requisition_date BETWEEN '$from' AND '$to'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Item', 'Requesting Employee','Number of Item Requested','Unit Cost','Total Cost');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='utilization_report_List.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	
	public function issued(){
		
		$data = $this->data;
		$js = $this->js;

		//$data['yearrecord'] = $this->reports_model->getyearrecord();
		$this->load->view('inc/header_view');
		$this->load->view('reports/issued_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function issued_view($from,$to){
		
		
		$data = $this->data;
		$js = $this->js;

		$data['datefrom'] = $from;
		$data['dateto'] = $to;
		$data['issuedlist'] =$this->reports_model->getissued($from,$to);
		$this->load->view('inc/header_view');
		$this->load->view('reports/issued_report_view',$data);
		$this->load->view('inc/footer_view',$js);
		/*$data = $this->data;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}*/
		
	}
	
	public function issueddownload($from,$to)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Issued Supplies and Materials');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT requisition_details.requisition_no,requisition_items.itemno,description,requisition_items.unit,requisition_items.qty,items.unitCost,(qty*unitCost) AS totalcost FROM requisition_items LEFT JOIN items ON requisition_items.itemno=items.itemNo 
LEFT JOIN requisition_details ON requisition_items.reqid = requisition_details.reqid
LEFT JOIN employee ON requisition_details.eid = employee.eid WHERE requisition_details.requisition_date BETWEEN '$from' AND '$to'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Item', 'Stock No','Item','Unit','Quantity Issued','Unit Cost','Amount');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='supplies_and_materials_issued_report.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	
	public function returns(){
		
		$data = $this->data;
		$js = $this->js;

		//$data['yearrecord'] = $this->reports_model->getyearrecord();
		$this->load->view('inc/header_view');
		$this->load->view('reports/returns_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function returns_view($from,$to){
		
		
		$data = $this->data;
		$js = $this->js;

		$data['datefrom'] = $from;
		$data['dateto'] = $to;
		$data['returnslist'] =$this->reports_model->getreturns($from,$to);
		$this->load->view('inc/header_view');
		$this->load->view('reports/returns_report_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
	}
	
	public function returnsdownload($from,$to)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Issued Supplies and Materials');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT equipments_rre.rreno,equipments_rre.rredate,equipments.equipNo,equipments.particulars,'1',equipments_rre_items.paricsno,equipments_rre_items.enduseroffice,equipments_rre_items.rre_remarks FROM equipments_rre_items LEFT JOIN equipments_rre ON equipments_rre_items.rreid = equipments_rre.rreid LEFT JOIN equipments ON equipments_rre_items.equipno = equipments.equipNo WHERE equipments_rre.rredate BETWEEN '$from' AND '$to'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('RRE No', 'RRE Date','Item','Description','Quantity Issued','PAR No. / ICS No.','End-User','Remarks');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='returns_report.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	
	
	
}