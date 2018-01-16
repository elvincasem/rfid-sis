<?php

class Items extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('items_model');
		$this->load->model('receiving_model');
		$this->load->helper('date');
		 $this->load->helper(array('form', 'url')); 
		//view module
		 $this->data = array(
            'title' => 'Supply Management',
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
			'supplymanagementclass' => 'active',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => 'active',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Item List',
			'typeahead' => '1',
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
            'jsfile' => 'supply_items.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		
		$data['itemslist'] = $this->items_model->getitemslist();
		$data['unitlist'] = $this->items_model->getunitlist();
		$data['supplierlist'] = $this->items_model->getsupplierlist();
		$data['warehouselist'] = $this->receiving_model->getwarehouselist();
		$data['itemcategorylist'] = $this->items_model->getitemcategorylist();
		
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/items_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		
		$data['itemno'] = $id;
		$data['itemsdetails'] = $this->items_model->getitemdetails($id);
		$data['unitlist'] = $this->items_model->getunitlist();
		$data['supplierlist'] = $this->items_model->getsupplierlist();
		$data['stockcard'] = $this->items_model->stockcard($id);
		$data['deliverydetails'] = $this->items_model->deliverydetails($id);
		$data['requisitiondetails'] = $this->items_model->requisitiondetails($id);
		$data['itemcategorylist'] = $this->items_model->getitemcategorylist();
		
		$data['subnavtitle'] =$data['itemsdetails']['description'];
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/itemsdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
	}
	
	public function saveitem(){
		$itemdescription = $this->input->post('itemdescription');
		$unitofmeasure = $this->input->post('unitofmeasure');
		$unitcost = $this->input->post('unitcost');
		$category = $this->input->post('category');
		$supplierid = $this->input->post('supplierid');
		$brand = $this->input->post('brand');
		$warehouseid = $this->input->post('warehouseid');
		
		$this->items_model->saveitem($itemdescription,$unitofmeasure,$unitcost,$category,$supplierid,$brand,$warehouseid);
	}
	public function deleteitem(){
		$itemno = $this->input->post('itemno');
		$this->db->delete('items', array('itemNo' => $itemno));
		//$this->items_model->deleteitem($itemno);
	}
	
	public function updateitem(){
		$itemno = $this->input->post('itemno');
		$unitcost = $this->input->post('unitcost');
		$description = $this->input->post('description');
		$category = $this->input->post('category');
		$brand = $this->input->post('brand');
		$supplierid = $this->input->post('supplierid');
		$unit = $this->input->post('unit');
		
		
		$this->items_model->updateitem($itemno,$unitcost,$description,$category,$brand,$supplierid,$unit);
	}
	
	public function do_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $this->load->view('upload_success', $data); 
         } 
      } 
	  
	  
	  public function downloaditem($warehouseidmodal)
	{
				
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Item Inventory');
		$this->load->database();
		
		$sql = $this->db->query("SELECT itemNo, description,category,unit,unitCost,inventory_qty,supName,warehouse_name FROM items LEFT JOIN warehouse ON items.warehouseid = warehouse.warehouseid LEFT JOIN suppliers ON items.supplierID = suppliers.supplierID where items.warehouseid = '$warehouseidmodal'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Item No', 'Description','Category','Unit','Unit Cost','Inventory QTY','Supplier','Warehouse');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='Item_List_by_warehouse.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	}
	

}