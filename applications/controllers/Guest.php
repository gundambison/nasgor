<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
7 Desember 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Guest extends CI_Controller {
public $param;  
private $folder='guest'; 
	public function benefit()
	{
 		$this->param['defaultMenu']='benefit';  
		$mainPage='benefit';
		$this->param['contents']=array( $mainPage );
		//$this->param['contentOnly']=true;
		$this->param['breadcrumbs']=array('Guest','Benefit');
		//$this->param['js'][]=$this->param['folder'].'benefit.js';
		$this->showView(); 

	}
	
	function data($module){	
		$folder=$this->param['folder'];
		$load_view= $folder.'data/benefit'.ucfirst($module).'_data'; 
		logCreate('load:'.$load_view);	
		$params['get']=$this->input->get(NULL,true);
		$params['post']=$this->input->post(NULL,true);		
		$respon=$this->maincore->processData($load_view,$params);
		if($respon!==false)
			echo json_encode( $respon );
		
	}

	function __CONSTRUCT(){
		parent::__construct();		 		
		$this->load->model('menu_model','menu'); 
		$this->load->model('main_model','maincore');
		$this->load->model('benefit_model','benefit');
		$this->load->model('member_model','member'); 
 		$this->load->library('session');
		
		$login=false;
		$this->param=$this->maincore->defaultParameter('metro');//ksc
	/*	
  			$this->param['user']=$user=$this->maincore->checkUser();
			if($user==false){
				$pos=$this->uri->segment(1,'')."/".$this->uri->segment(2,'');
				$url=base_url().$pos;
				$this->session->set_userdata('target_url',$url); 
				redirect(base_url('member/login'),'refresh');
			}else{}
 	*/	
		$this->param['folder']=$this->folder.'/';
		$this->param['showDetail']=true;
		 
		//=============sub JS 			
		$name=$this->uri->segment(2,'');
		$jsScript=$this->param['folder'].$this->uri->segment(1).ucfirst($name).".js";
		 
		if($name!=''){
			$this->param['footerJS'][]=$jsScript;			
		}else{}
		
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
		$this->maincore->checkView($js,'js');
	}
	
}