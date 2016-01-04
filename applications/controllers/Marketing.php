<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
23 November 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Marketing extends CI_Controller {
public $param; 
private $folder='marketing';  
/***
Controller:	marketing
Function:	benefit
***/ 
	public function benefit($type="main",$id=0)
	{ 
		$this->param['breadcrumbs']=array('Marketing','Benefit');
//		$this->param['defaultMenu']='benefit';  
		if($type=="edit"){
			$mainPage="editBenefit";
			$this->param['editId']=$id;
		}
		
		if(!isset($mainPage))
			$mainPage=$this->uri->segment(1).'Benefit';
		
		$this->param['contents']=array( $mainPage );
 		$this->param['module']='benefit';
 		$this->param['title']='[ERP]marketing::benefit';
		$this->param['showDetail']=false;
		$this->param['footerJS'][]='tinymce.min.js';
/*
model: benefit_model
view:marketingBenefit_view
js: {folder}/marketingBenefit.js
*/
		$this->showView(); 
/*
form : marketingBenefitEditForm_view, marketingBenefitAddForm_view
data: marketingBenefitSave_data, marketingBenefit_data
*/		
		$folder=$this->param['folder']; //$this->folder;
		$this->checkView($folder."marketingBenefitEditForm_view");
		$this->checkView($folder."marketingBenefitAddForm_view");
		$this->checkView($folder."data/marketingBenefitsave_data");
		$this->checkView($folder."data/marketingBenefit_data");
		$this->checkJS();
		
		if($this->param['showDetail']==true){
			$this->checkView($folder."data/marketingBenefitDetail_data");	
		}
	}
/***
Controller:	marketing
Function:	asuransi
***/ 
	public function asuransi()
	{
//		$this->load->model('asuransi_model','asuransi'); 
//		don't forget to add this
		$this->param['breadcrumbs']=array('marketing','asuransi');
//		$this->param['defaultMenu']='temp';  
		$mainPage=$this->uri->segment(1).'Asuransi';
		$this->param['contents']=array( $mainPage );
//		$this->param['module']='asuransi';
	$this->param['title']='[Klinik]Marketing::Asuransi';
/*
model: asuransi_model
view:marketingAsuransi_view
js: {folder}/marketingAsuransi.js
*/
		$this->showView(); 
/*
form : marketingAsuransiEditForm_view, marketingAsuransiAddForm_view
data: marketingAsuransiSave_data, marketingAsuransi_data
*/		
		$folder=$this->param['folder']; //$this->folder;
		$this->checkView($folder."marketingAsuransiEditForm_view");
		$this->checkView($folder."marketingAsuransiAddForm_view");
		$this->checkView($folder."data/marketingAsuransisave_data");
		$this->checkView($folder."data/marketingAsuransi_data");
		$this->checkJS();
//		$this->param['showDetail']=true;
		if($this->param['showDetail']==true){
			$this->checkView($folder."data/marketingAsuransiDetail_data");	
		}
	}

/***
Controller:	marketing
Function:	company
***/ 
	public function perusahaan(){ redirect(base_url("marketing/company"),1);}
	public function company()
	{
		$this->param['breadcrumbs']=array('marketing','perusahaan');
//		$this->param['defaultMenu']='company';  
		$mainPage=$this->uri->segment(1).'Company';
		$this->param['contents']=array( $mainPage );
		$this->param['module']='company';
 		$this->param['title']='[ERP]marketing::Company';
/*
model: company_model
view:marketingCompany_view
js: {folder}/marketingCompany.js
*/
		$this->showView(); 
/*
form : marketingCompanyEditForm_view, marketingCompanyAddForm_view
data: marketingCompanySave_data, marketingCompany_data
*/		
		$folder=$this->param['folder']; //$this->folder;
		$this->checkView($folder."marketingCompanyEditForm_view");
		$this->checkView($folder."marketingCompanyAddForm_view");
		$this->checkView($folder."data/marketingCompanysave_data");
		$this->checkView($folder."data/marketingCompany_data");
//		$this->checkJS();
//		$this->param['showDetail']=true;
		if($this->param['showDetail']==true){
			$this->checkView($folder."data/marketingCompanyDetail_data");	
		}
	}
 
 
	public function index()
	{
		redirect(base_url());
		//$this->load->view('temp/example_view');
	}
/* ========================================	
TRY NOT TO EDIT THIS
*/
	function data($module){	
		$folder=$this->param['folder'];
		$load_view= $folder.'data/'.$module.'_data'; 
		logCreate('load:'.$load_view);	
		$params['get']=$this->input->get(NULL,true);
		$params['post']=$this->input->post(NULL,true);		
		$respon=$this->maincore->processData($load_view,$params);
		if(is_array($respon)){
			echo json_encode( $respon );
		}
	}
	
	function form($module){	
		$this->load->helper('form');
		$this->load->helper('formbootstrap');
		$folder=$this->param['folder']; 
		$load_view= $folder.$module.'Form_view'; 
		$params['get']=$this->input->get(NULL,true);
		$params['post']=$this->input->post(NULL,true);		
	//============== 
		$respon=$this->maincore->processForm($load_view,$params);
		
		echo json_encode( $respon ); 
		
	}
	
	private function showView(){
/*** Tidak ada pembuatan JS Otomatis    ***/				 
		$this->param['mainMenu']=$this->menu->generate($this->param['defaultMenu']);
		$this->maincore->showView($this->param,'baseMetro_view');
		$this->checkJS();
	}
	
	private function checkView($target,$stat='view'){
		$this->maincore->checkView($target,$stat);
	}
	
	private function checkJS(){
		$js=array_merge( $this->param['footerJS'], $this->param['js']);
		$this->maincore->checkView($js,'js');
	}
	
	function __CONSTRUCT(){
		parent::__construct();		 		
		$this->load->model('menu_model','menu'); 
		$this->load->model('main_model','maincore');
		$this->load->model('user_model','member');
		
		$this->load->model('asuransi_model','asuransi');
		$this->load->model('company_model','company');
		$this->load->model('benefit_model','benefit');
		 	
 		$this->load->library('session');
		
		$login=false;
		$this->param=$this->maincore->defaultParameter('metro');
		
  			$this->param['user']=$user=$this->maincore->checkUser();
			if($user==false){
				$pos=$this->uri->segment(1,'')."/".$this->uri->segment(2,'');
				$url=base_url().$pos;
				$this->session->set_userdata('target_url',$url); 
				redirect(base_url('member/login'),'refresh');
			}else{}
 		
		$this->param['folder']=$this->folder.'/';
		$this->param['showDetail']=true;
		//log_message('info','post:'.json_encode($_POST));
		//log_message('info','get:'.json_encode($_GET));		
		//=============sub JS 			
		$name=$this->uri->segment(2,'');
		$jsScript=$this->param['folder'].$this->uri->segment(1).ucfirst($name).".js";
		 
		if($name!=''){
			$this->param['footerJS'][]=$jsScript;			
		}else{}
		
	}	
}