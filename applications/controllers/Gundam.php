<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
23 November 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Gundam extends CI_Controller {
public $param; 
private $folder='temp';  
/***
Controller:	temp
Function:	gundam
***/ 
	public function lists()
	{ 
 
		$this->param['breadcrumbs']=array('Gundam','Mecha');
		$mainPage='tempGundam';
		$this->param['contents']=array( $mainPage );
 		$this->param['title']='ERP::temp::gundam';
		$jsScript=$this->param['folder']."tempGundam.js";
		$this->param['footerJS'][]=$jsScript;
		$this->param['myUrl']="tempGundam";		
 
		$this->showView();  

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
		$this->maincore->showView($this->param,'baseMetro_view');
		
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
		$this->load->model('user_model','member');
		
		$this->load->model('gundam_model','gundam');
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