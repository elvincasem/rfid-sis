<?php

class Projects extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
		//$this->load->model('permitsrecognition_model');
		 $this->data = array(
            'title' => 'Projects',
			'projectclass' => 'active',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'reports_issuetypeclass' => ''
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Projects List") ;
		$data['projectlist'] = $this->projects_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('projects/projects_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	
	
	public function details($projectid){
		
		
		$data = $this->data;
		//$scripts = array('<script>App.sidebar("toggle-sidebar");this.blur();</script>');
        //$data['scripts'] = $scripts;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Projects Details") ;
		$data['project_details'] = $this->projects_model->getprojectdetails($projectid);
		
		//redirect if no record found
		if($data['project_details'] ==null){
			redirect('projects');
		}
		
		$data['project_incompletes'] = $this->projects_model->getprojectincompletes($projectid);
		$project_incompletes_q = $this->projects_model->getprojectincompletesq($projectid);
		$project_assembly = $this->projects_model->getprojectassembly($projectid);
		$data['project_regular'] = $this->projects_model->getprojectregular($projectid);
		$project_services = $this->projects_model->getprojectservices($projectid);
		$project_design = $this->projects_model->getprojectdesign($projectid);
		$project_qa= $this->projects_model->getqualityassurance($projectid);
		$project_packaging = $this->projects_model->getpackaging($projectid);
		$project_notes= $this->projects_model->getnotes($projectid);
		
		
		
		if($project_incompletes_q['authshipment']=='YES'){
			$data['authshipyes'] = "checked=checked";
			$data['authshipno'] = "";
		}else{
			$data['authshipyes'] = "";
			$data['authshipno'] = "checked=checked";
		}
		$data['authsolution'] = $project_incompletes_q['authsolution'];
		$data['authdate'] = $project_incompletes_q['authdate'];
		
		/*if($project_incompletes_q['hardwarebox']=='YES'){
			$data['hardwareboxyes'] = "checked=checked";
			$data['hardwareboxno'] = "";
		}else{
			$data['hardwareboxyes'] = "";
			$data['hardwareboxno'] = "checked=checked";
		}*/
		$data['hardwarecount'] = $project_incompletes_q['hardwarebox'];
		
		if($project_incompletes_q['authpackaged']=='YES'){
			$data['authpackagedyes'] = "checked=checked";
			$data['authpackagedno'] = "";
		}else{
			$data['authpackagedyes'] = "";
			$data['authpackagedno'] = "checked=checked";
		}
		
		if($project_incompletes_q['pmsee']=='YES'){
			$data['pmseeyes'] = "checked=checked";
			$data['pmseeno'] = "";
		}else{
			$data['pmseeyes'] = "";
			$data['pmseeno'] = "checked=checked";
		}
		$data['pmsolution'] = $project_incompletes_q['pmsolution'];
		$data['pmdate'] = $project_incompletes_q['pmdate'];
		
		if($project_incompletes_q['pmexception']=='YES'){
			$data['pmexceptionyes'] = "checked=checked";
			$data['pmexceptionno'] = "";
		}else{
			$data['pmexceptionyes'] = "";
			$data['pmexceptionno'] = "checked=checked";
		}
		$data['pmexsolution'] = $project_incompletes_q['pmexsolution'];
		$data['pmexdate'] = $project_incompletes_q['pmexdate'];
		//project assembly
		$data['faintegration'] = $project_assembly['faintegration'];
		$data['assemblynotes'] = $project_assembly['assemblynotes'];
		if($project_assembly['q101']=='YES'){
			$data['q101yes'] = "checked=checked";
			$data['q101no'] = "";
			$data['q101na'] = "";
		}if($project_assembly['q101']=='NO'){
			$data['q101yes'] = "";
			$data['q101no'] = "checked=checked";
			$data['q101na'] = "";
		}if($project_assembly['q101']=='NA'){
			$data['q101yes'] = "";
			$data['q101no'] = "";
			$data['q101na'] = "checked=checked";
		}
		if($project_assembly['q102']=='YES'){
			$data['q102yes'] = "checked=checked";
			$data['q102no'] = "";
			$data['q102na'] = "";
		}if($project_assembly['q102']=='NO'){
			$data['q102yes'] = "";
			$data['q102no'] = "checked=checked";
			$data['q102na'] = "";
		}if($project_assembly['q102']=='NA'){
			$data['q102yes'] = "";
			$data['q102no'] = "";
			$data['q102na'] = "checked=checked";
		}
		if($project_assembly['q103']=='YES'){
			$data['q103yes'] = "checked=checked";
			$data['q103no'] = "";
			$data['q103na'] = "";
		}if($project_assembly['q103']=='NO'){
			$data['q103yes'] = "";
			$data['q103no'] = "checked=checked";
			$data['q103na'] = "";
		}if($project_assembly['q103']=='NA'){
			$data['q103yes'] = "";
			$data['q103no'] = "";
			$data['q103na'] = "checked=checked";
		}
		if($project_assembly['q104']=='YES'){
			$data['q104yes'] = "checked=checked";
			$data['q104no'] = "";
			$data['q104na'] = "";
		}if($project_assembly['q104']=='NO'){
			$data['q104yes'] = "";
			$data['q104no'] = "checked=checked";
			$data['q104na'] = "";
		}if($project_assembly['q104']=='NA'){
			$data['q104yes'] = "";
			$data['q104no'] = "";
			$data['q104na'] = "checked=checked";
		}
		if($project_assembly['q105']=='YES'){
			$data['q105yes'] = "checked=checked";
			$data['q105no'] = "";
			$data['q105na'] = "";
		}if($project_assembly['q105']=='NO'){
			$data['q105yes'] = "";
			$data['q105no'] = "checked=checked";
			$data['q105na'] = "";
		}if($project_assembly['q105']=='NA'){
			$data['q105yes'] = "";
			$data['q105no'] = "";
			$data['q105na'] = "checked=checked";
		}
		if($project_assembly['q106']=='YES'){
			$data['q106yes'] = "checked=checked";
			$data['q106no'] = "";
			$data['q106na'] = "";
		}if($project_assembly['q106']=='NO'){
			$data['q106yes'] = "";
			$data['q106no'] = "checked=checked";
			$data['q106na'] = "";
		}if($project_assembly['q106']=='NA'){
			$data['q106yes'] = "";
			$data['q106no'] = "";
			$data['q106na'] = "checked=checked";
		}
		if($project_assembly['q107']=='YES'){
			$data['q107yes'] = "checked=checked";
			$data['q107no'] = "";
			$data['q107na'] = "";
		}if($project_assembly['q107']=='NO'){
			$data['q107yes'] = "";
			$data['q107no'] = "checked=checked";
			$data['q107na'] = "";
		}if($project_assembly['q107']=='NA'){
			$data['q107yes'] = "";
			$data['q107no'] = "";
			$data['q107na'] = "checked=checked";
		}
		if($project_assembly['q108']=='YES'){
			$data['q108yes'] = "checked=checked";
			$data['q108no'] = "";
			$data['q108na'] = "";
		}if($project_assembly['q108']=='NO'){
			$data['q108yes'] = "";
			$data['q108no'] = "checked=checked";
			$data['q108na'] = "";
		}if($project_assembly['q108']=='NA'){
			$data['q108yes'] = "";
			$data['q108no'] = "";
			$data['q108na'] = "checked=checked";
		}
		if($project_assembly['q109']=='YES'){
			$data['q109yes'] = "checked=checked";
			$data['q109no'] = "";
			$data['q109na'] = "";
		}if($project_assembly['q109']=='NO'){
			$data['q109yes'] = "";
			$data['q109no'] = "checked=checked";
			$data['q109na'] = "";
		}if($project_assembly['q109']=='NA'){
			$data['q109yes'] = "";
			$data['q109no'] = "";
			$data['q109na'] = "checked=checked";
		}
		if($project_assembly['q110']=='YES'){
			$data['q110yes'] = "checked=checked";
			$data['q110no'] = "";
			$data['q110na'] = "";
		}if($project_assembly['q110']=='NO'){
			$data['q110yes'] = "";
			$data['q110no'] = "checked=checked";
			$data['q110na'] = "";
		}if($project_assembly['q110']=='NA'){
			$data['q110yes'] = "";
			$data['q110no'] = "";
			$data['q110na'] = "checked=checked";
		}
		if($project_assembly['q112']=='YES'){
			$data['q112yes'] = "checked=checked";
			$data['q112no'] = "";
			$data['q112na'] = "";
		}if($project_assembly['q112']=='NO'){
			$data['q112yes'] = "";
			$data['q112no'] = "checked=checked";
			$data['q112na'] = "";
		}if($project_assembly['q112']=='NA'){
			$data['q112yes'] = "";
			$data['q112no'] = "";
			$data['q112na'] = "checked=checked";
		}
		if($project_assembly['q113']=='YES'){
			$data['q113yes'] = "checked=checked";
			$data['q113no'] = "";
			$data['q113na'] = "";
		}if($project_assembly['q113']=='NO'){
			$data['q113yes'] = "";
			$data['q113no'] = "checked=checked";
			$data['q113na'] = "";
		}if($project_assembly['q113']=='NA'){
			$data['q113yes'] = "";
			$data['q113no'] = "";
			$data['q113na'] = "checked=checked";
		}
		
		$data['positionnos'] = $project_assembly['positionnos'];
		
		
		//Project Services
		//print_r($project_services);
		$data['servicesid'] = $project_services['servicesid'];
		$data['servicesname'] = $project_services['servicesname'];
		$data['servicesnotes'] = $project_services['servicesnotes'];
		
		if($project_services['q21']=='YES'){
			$data['q21yes'] = "checked=checked";
			$data['q21no'] = "";
			$data['q21na'] = "";
		}if($project_services['q21']=='NO'){
			$data['q21yes'] = "";
			$data['q21no'] = "checked=checked";
			$data['q21na'] = "";
		}if($project_services['q21']=='NA'){
			$data['q21yes'] = "";
			$data['q21no'] = "";
			$data['q21na'] = "checked=checked";
		}
		
			if($project_services['q22']=='YES'){
			$data['q22yes'] = "checked=checked";
			$data['q22no'] = "";
			$data['q22na'] = "";
		}if($project_services['q22']=='NO'){
			$data['q22yes'] = "";
			$data['q22no'] = "checked=checked";
			$data['q22na'] = "";
		}if($project_services['q22']=='NA'){
			$data['q22yes'] = "";
			$data['q22no'] = "";
			$data['q22na'] = "checked=checked";
		}
		
		if($project_services['q23']=='YES'){
			$data['q23yes'] = "checked=checked";
			$data['q23no'] = "";
			$data['q23na'] = "";
		}if($project_services['q23']=='NO'){
			$data['q23yes'] = "";
			$data['q23no'] = "checked=checked";
			$data['q23na'] = "";
		}if($project_services['q23']=='NA'){
			$data['q23yes'] = "";
			$data['q23no'] = "";
			$data['q23na'] = "checked=checked";
		}
		
		if($project_services['q24']=='YES'){
			$data['q24yes'] = "checked=checked";
			$data['q24no'] = "";
			$data['q24na'] = "";
		}if($project_services['q24']=='NO'){
			$data['q24yes'] = "";
			$data['q24no'] = "checked=checked";
			$data['q24na'] = "";
		}if($project_services['q24']=='NA'){
			$data['q24yes'] = "";
			$data['q24no'] = "";
			$data['q24na'] = "checked=checked";
		}
		
		if($project_services['q25']=='YES'){
			$data['q25yes'] = "checked=checked";
			$data['q25no'] = "";
			$data['q25na'] = "";
		}if($project_services['q25']=='NO'){
			$data['q25yes'] = "";
			$data['q25no'] = "checked=checked";
			$data['q25na'] = "";
		}if($project_services['q25']=='NA'){
			$data['q25yes'] = "";
			$data['q25no'] = "";
			$data['q25na'] = "checked=checked";
		}
		
		if($project_services['q26']=='YES'){
			$data['q26yes'] = "checked=checked";
			$data['q26no'] = "";
			$data['q26na'] = "";
		}if($project_services['q26']=='NO'){
			$data['q26yes'] = "";
			$data['q26no'] = "checked=checked";
			$data['q26na'] = "";
		}if($project_services['q26']=='NA'){
			$data['q26yes'] = "";
			$data['q26no'] = "";
			$data['q26na'] = "checked=checked";
		}
		
		if($project_services['q27']=='YES'){
			$data['q27yes'] = "checked=checked";
			$data['q27no'] = "";
			$data['q27na'] = "";
		}if($project_services['q27']=='NO'){
			$data['q27yes'] = "";
			$data['q27no'] = "checked=checked";
			$data['q27na'] = "";
		}if($project_services['q27']=='NA'){
			$data['q27yes'] = "";
			$data['q27no'] = "";
			$data['q27na'] = "checked=checked";
		}
		$data['extra1'] = $project_services['extra1'];
		if($project_services['eq1']=='YES'){
			$data['eq1yes'] = "checked=checked";
			$data['eq1no'] = "";
			$data['eq1na'] = "";
		}if($project_services['eq1']=='NO'){
			$data['eq1yes'] = "";
			$data['eq1no'] = "checked=checked";
			$data['eq1na'] = "";
		}if($project_services['eq1']=='NA'){
			$data['eq1yes'] = "";
			$data['eq1no'] = "";
			$data['eq1na'] = "checked=checked";
		}
		
		$data['extra2'] = $project_services['extra2'];
		if($project_services['eq2']=='YES'){
			$data['eq2yes'] = "checked=checked";
			$data['eq2no'] = "";
			$data['eq2na'] = "";
		}if($project_services['eq2']=='NO'){
			$data['eq2yes'] = "";
			$data['eq2no'] = "checked=checked";
			$data['eq2na'] = "";
		}if($project_services['eq2']=='NA'){
			$data['eq2yes'] = "";
			$data['eq2no'] = "";
			$data['eq2na'] = "checked=checked";
		}
		
		
		$data['extra3'] = $project_services['extra3'];
		if($project_services['eq3']=='YES'){
			$data['eq3yes'] = "checked=checked";
			$data['eq3no'] = "";
			$data['eq3na'] = "";
		}if($project_services['eq3']=='NO'){
			$data['eq3yes'] = "";
			$data['eq3no'] = "checked=checked";
			$data['eq3na'] = "";
		}if($project_services['eq3']=='NA'){
			$data['eq3yes'] = "";
			$data['eq3no'] = "";
			$data['eq3na'] = "checked=checked";
		}
		
		
		//design
		$data['designname'] = $project_design['designname'];
		if($project_design['q31']=='YES'){
			$data['q31yes'] = "checked=checked";
			$data['q31no'] = "";
			$data['q31na'] = "";
		}if($project_design['q31']=='NO'){
			$data['q31yes'] = "";
			$data['q31no'] = "checked=checked";
			$data['q31na'] = "";
		}if($project_design['q31']=='NA'){
			$data['q31yes'] = "";
			$data['q31no'] = "";
			$data['q31na'] = "checked=checked";
		}
		
		if($project_design['q32']=='YES'){
			$data['q32yes'] = "checked=checked";
			$data['q32no'] = "";
			$data['q32na'] = "";
		}if($project_design['q32']=='NO'){
			$data['q32yes'] = "";
			$data['q32no'] = "checked=checked";
			$data['q32na'] = "";
		}if($project_design['q32']=='NA'){
			$data['q32yes'] = "";
			$data['q32no'] = "";
			$data['q32na'] = "checked=checked";
		}
		
		if($project_design['q33']=='YES'){
			$data['q33yes'] = "checked=checked";
			$data['q33no'] = "";
			$data['q33na'] = "";
		}if($project_design['q33']=='NO'){
			$data['q33yes'] = "";
			$data['q33no'] = "checked=checked";
			$data['q33na'] = "";
		}if($project_design['q33']=='NA'){
			$data['q33yes'] = "";
			$data['q33no'] = "";
			$data['q33na'] = "checked=checked";
		}
		
		$data['designextra1'] = $project_design['designextra1'];
		if($project_design['deq1']=='YES'){
			$data['deq1yes'] = "checked=checked";
			$data['deq1no'] = "";
			$data['deq1na'] = "";
		}if($project_design['deq1']=='NO'){
			$data['deq1yes'] = "";
			$data['deq1no'] = "checked=checked";
			$data['deq1na'] = "";
		}if($project_design['deq1']=='NA'){
			$data['deq1yes'] = "";
			$data['deq1no'] = "";
			$data['deq1na'] = "checked=checked";
		}
		$data['designextra2'] = $project_design['designextra2'];
		if($project_design['deq2']=='YES'){
			$data['deq2yes'] = "checked=checked";
			$data['deq2no'] = "";
			$data['deq2na'] = "";
		}if($project_design['deq2']=='NO'){
			$data['deq2yes'] = "";
			$data['deq2no'] = "checked=checked";
			$data['deq2na'] = "";
		}if($project_design['deq2']=='NA'){
			$data['deq2yes'] = "";
			$data['deq2no'] = "";
			$data['deq2na'] = "checked=checked";
		}
		
		$data['designnotes'] = $project_design['designnotes'];
		
		
		//quality assurance
		//print_r($project_qa);
		$data['qaname'] = $project_qa['qaname'];
		$data['qanotes'] = $project_qa['qanotes'];
		
		if($project_qa['q41']=='YES'){
			$data['q41yes'] = "checked=checked";
			$data['q41no'] = "";
			$data['q41na'] = "";
		}if($project_qa['q41']=='NO'){
			$data['q41yes'] = "";
			$data['q41no'] = "checked=checked";
			$data['q41na'] = "";
		}if($project_qa['q41']=='NA'){
			$data['q41yes'] = "";
			$data['q41no'] = "";
			$data['q41na'] = "checked=checked";
		}
		
		if($project_qa['q42']=='YES'){
			$data['q42yes'] = "checked=checked";
			$data['q42no'] = "";
			$data['q42na'] = "";
		}if($project_qa['q42']=='NO'){
			$data['q42yes'] = "";
			$data['q42no'] = "checked=checked";
			$data['q42na'] = "";
		}if($project_qa['q42']=='NA'){
			$data['q42yes'] = "";
			$data['q42no'] = "";
			$data['q42na'] = "checked=checked";
		}
		
		if($project_qa['q43']=='YES'){
			$data['q43yes'] = "checked=checked";
			$data['q43no'] = "";
			$data['q43na'] = "";
		}if($project_qa['q43']=='NO'){
			$data['q43yes'] = "";
			$data['q43no'] = "checked=checked";
			$data['q43na'] = "";
		}if($project_qa['q43']=='NA'){
			$data['q43yes'] = "";
			$data['q43no'] = "";
			$data['q43na'] = "checked=checked";
		}
		
		//packaging
		$data['packagingname'] = $project_packaging['packagingname'];
		$data['packagingnotes'] = $project_packaging['packagingnotes'];
		
		if($project_packaging['q51']=='YES'){
			$data['q51yes'] = "checked=checked";
			$data['q51no'] = "";
			$data['q51na'] = "";
		}if($project_packaging['q51']=='NO'){
			$data['q51yes'] = "";
			$data['q51no'] = "checked=checked";
			$data['q51na'] = "";
		}if($project_packaging['q51']=='NA'){
			$data['q51yes'] = "";
			$data['q51no'] = "";
			$data['q51na'] = "checked=checked";
		}
		
		if($project_packaging['q52']=='YES'){
			$data['q52yes'] = "checked=checked";
			$data['q52no'] = "";
			$data['q52na'] = "";
		}if($project_packaging['q52']=='NO'){
			$data['q52yes'] = "";
			$data['q52no'] = "checked=checked";
			$data['q52na'] = "";
		}if($project_packaging['q52']=='NA'){
			$data['q52yes'] = "";
			$data['q52no'] = "";
			$data['q52na'] = "checked=checked";
		}
		
		if($project_packaging['q53']=='YES'){
			$data['q53yes'] = "checked=checked";
			$data['q53no'] = "";
			$data['q53na'] = "";
		}if($project_packaging['q53']=='NO'){
			$data['q53yes'] = "";
			$data['q53no'] = "checked=checked";
			$data['q53na'] = "";
		}if($project_packaging['q53']=='NA'){
			$data['q53yes'] = "";
			$data['q53no'] = "";
			$data['q53na'] = "checked=checked";
		}

		
		if($project_packaging['q55']=='YES'){
			$data['q55yes'] = "checked=checked";
			$data['q55no'] = "";
			$data['q55na'] = "";
		}if($project_packaging['q55']=='NO'){
			$data['q55yes'] = "";
			$data['q55no'] = "checked=checked";
			$data['q55na'] = "";
		}if($project_packaging['q55']=='NA'){
			$data['q55yes'] = "";
			$data['q55no'] = "";
			$data['q55na'] = "checked=checked";
		}
		
				
		if($project_packaging['q56']=='YES'){
			$data['q56yes'] = "checked=checked";
			$data['q56no'] = "";
			$data['q56na'] = "";
		}if($project_packaging['q56']=='NO'){
			$data['q56yes'] = "";
			$data['q56no'] = "checked=checked";
			$data['q56na'] = "";
		}if($project_packaging['q56']=='NA'){
			$data['q56yes'] = "";
			$data['q56no'] = "";
			$data['q56na'] = "checked=checked";
		}
		
		if($project_packaging['q57']=='YES'){
			$data['q57yes'] = "checked=checked";
			$data['q57no'] = "";
			$data['q57na'] = "";
		}if($project_packaging['q57']=='NO'){
			$data['q57yes'] = "";
			$data['q57no'] = "checked=checked";
			$data['q57na'] = "";
		}if($project_packaging['q57']=='NA'){
			$data['q57yes'] = "";
			$data['q57no'] = "";
			$data['q57na'] = "checked=checked";
		}
		
		if($project_packaging['q58']=='YES'){
			$data['q58yes'] = "checked=checked";
			$data['q58no'] = "";
			$data['q58na'] = "";
		}if($project_packaging['q58']=='NO'){
			$data['q58yes'] = "";
			$data['q58no'] = "checked=checked";
			$data['q58na'] = "";
		}if($project_packaging['q58']=='NA'){
			$data['q58yes'] = "";
			$data['q58no'] = "";
			$data['q58na'] = "checked=checked";
		}
		
		if($project_packaging['q59']=='YES'){
			$data['q59yes'] = "checked=checked";
			$data['q59no'] = "";
			$data['q59na'] = "";
		}if($project_packaging['q59']=='NO'){
			$data['q59yes'] = "";
			$data['q59no'] = "checked=checked";
			$data['q59na'] = "";
		}if($project_packaging['q59']=='NA'){
			$data['q59yes'] = "";
			$data['q59no'] = "";
			$data['q59na'] = "checked=checked";
		}
		
		if($project_packaging['q510']=='YES'){
			$data['q510yes'] = "checked=checked";
			$data['q510no'] = "";
			$data['q510na'] = "";
		}if($project_packaging['q510']=='NO'){
			$data['q510yes'] = "";
			$data['q510no'] = "checked=checked";
			$data['q510na'] = "";
		}if($project_packaging['q510']=='NA'){
			$data['q510yes'] = "";
			$data['q510no'] = "";
			$data['q510na'] = "checked=checked";
		}
		
		$data['installernotes'] = $project_notes['installernotes'];
		$data['integrationrep'] = $project_notes['integrationrep'];
		$data['packagingrep'] = $project_notes['packagingrep'];
		$data['timerelease'] = $project_notes['timerelease'];
		$data['daterelease'] = $project_notes['daterelease'];
		
		
		$this->load->view('inc/header_view');
		$this->load->view('projects/projectdetails_view',$data);
		$this->load->view('inc/footer_view');
		
		
		
	}
	

	
	
}