<?php

class Issuetype extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		  $this->data = array(
            'title' => 'Projects List',
			'projectclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => 'active',
			'reports_issuetypeclass' => 'active'
			
			);
	}
	
	public function index()
	{
		
		$data = $this->data;
		$data['totalprojects'] = $this->dashboard_model->gettotalprojects();
		$data['totalissuecount'] = $this->dashboard_model->gettotalissuecount();
		$data['groupresponsible'] = $this->dashboard_model->gettotalresponsible();
		
		$this->load->view('inc/header_view');
		

		$this->load->view('reports/issuetype_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	

	
	
}