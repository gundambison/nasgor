<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
23 November 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Member extends CI_Controller {
public $param; 
private $folder='member'; 
	public function img(){ redirect('dashboard'); }
 
	public function index()
	{
		redirect(base_url());
		//$this->load->view('temp/example_view');
	}
/***
Controller:	member
Function:	userlist
***/ 
	public function userlist()
	{
 
		$this->param['breadcrumbs']=array('member','list');
 
		$mainPage=$this->uri->segment(1).'Userlist';
		$this->param['contents']=array( $mainPage ); 
/*
model: userlist_model
view:memberUserlist_view
js: {folder}/memberUserlist.js
*/
		$this->showView(); 
/*
form : memberUserlistEditForm_view, memberUserlistAddForm_view
data: memberUserlistSave_data, memberUserlist_data
*/		
		$folder=$this->param['folder'];
		$this->checkView($folder."memberUserlistEditForm_view");
		$this->checkView($folder."memberUserlistAddForm_view");
		$this->checkView($folder."data/memberUserlistSave_data");
		$this->checkView($folder."data/memberUserlist_data");

	}
/***
Controller:	member
Function:	permision
***/ 
	public function permision()
	{ 
//
		$this->param['breadcrumbs']=array('user','permision');
//		$this->param['defaultMenu']='user';  
		$mainPage=$this->uri->segment(1).'Permision';
		$this->param['contents']=array( $mainPage );
 		$this->param['title']='ERP::User::Permision';
/*
model: permision_model
view:memberPermision_view
js: {folder}/memberPermision.js
*/
		$this->showView(); 
/*
form : memberPermisionEditForm_view, memberPermisionAddForm_view
data: memberPermisionSave_data, memberPermision_data
*/		
		$folder=$this->param['folder'];
		$this->checkView($folder."memberPermisionEditForm_view");
		$this->checkView($folder."memberPermisionAddForm_view");
		$this->checkView($folder."data/memberPermisionSave_data");
		$this->checkView($folder."data/memberPermision_data");

	}
 
/***
Controller:	member
Function:	login & logout
***/ 
	public function logout()
	{
		$array_items = array('erp_username', 'erp_password','target_url');

		$this->session->unset_userdata($array_items);
		$target=$this->session->userdata('target_url');
		redirect($target);//base_url('dashboard'),'refresh');
	}
	
	public function login()
	{
//		$this->load->('login_model','login'); 
//		don't forget to add this
		
		$this->param['defaultMenu']='member';  
		$mainPage=$this->uri->segment(1).'Login';
		$this->param['contents']=array( $mainPage );
		$this->param['contentOnly']=true;
//		$this->param['title']='ERP-member login';
/*
view:memberLogin_view
js: {folder}/memberLogin.js
*/
		$this->showView(); 

	}
 
	public function settings()
	{
		$this->param['defaultMenu']='user';  
		$mainPage=$this->uri->segment(1).'Setting';
		$this->param['contents']=array( $mainPage);
		$this->param['breadcrumbs']=array('Member','Settings');
		$this->param['title']='ERP::Member::Settings';
		$this->showView(); 
	
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
		echo json_encode( $respon );
		
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
		$this->maincore->showView($this->param,'ksc_view');
		
	}
	
	private function checkView($target,$stat='view'){
		$this->maincore->checkView($target,$stat);
	}
	
	private function checkJS(){
		$js=array_merge( $this->param['footerJS'], $this->param['js']);
		$this->maincore->checkView($target,'js');
	}
	
	function __CONSTRUCT(){
		parent::__construct();		 		
		$this->load->model('menu_model','menu'); 
		$this->load->model('main_model','maincore');
		//$this->load->model('user_model','member');
		 
		$this->load->model('member_model','member');
		$this->load->model('permision_model','permision'); 
		
 		$this->load->library('session');
		
		$login=false;
		$login=(isset($_POST['act'])&&$_POST['act']=='login')?true:false;
		if($login==false){
			$login=($this->uri->segment(2,'')=='logout')?true:false;	
		}
		
		if($this->uri->segment(2,'')!=='login'&&$login!==true){
			$this->param['user']=$user=$this->maincore->checkUser();
			if($user==false){
				$pos=$this->uri->segment(1,'')."/".$this->uri->segment(2,'');
				$url=base_url().$pos;
				$this->session->set_userdata('target_url',$url); 
				redirect(base_url('member/login'),'refresh');
			}else{}
			
		}else{}
		
		if($this->uri->segment(2,'')!=='login'){
			$this->param=$this->maincore->defaultParameter('metro');
		}else{
			$this->param=$this->maincore->defaultParameter('metro');
		} 
 		
		$this->param['folder']=$this->folder.'/';
		$this->param['showDetail']=true;
		 	
		//=============sub JS 			
		$name=$this->uri->segment(2,'');
		$jsScript=$this->param['folder'].$this->uri->segment(1).ucfirst($name).".js";
		 
		if($name!=''){
			$this->param['footerJS'][]=$jsScript;			
		}else{}
		
	}	
}