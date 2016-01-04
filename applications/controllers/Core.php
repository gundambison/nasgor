<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
7 Desember 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Core extends CI_Controller {
public $param;  
private $folder='core'; 
/***
Controller:	core
Function:	fixMyISAM
***/ 
	public function fixMyISAM()
	{ 
		$this->param['breadcrumbs']=array('other','convert'); 
		$mainPage=$this->uri->segment(1).'FixMyISAM';
		$this->param['contents']=array( $mainPage );
 
		$this->showView();  
	}
	
	public function blank()
	{
 		$this->param['defaultMenu']='member';  
		$mainPage='blank';
		$this->param['contents']=array( $mainPage );
		$this->param['contentOnly']=true;
		$this->param['js'][]='tinymce.min.js';
		$this->showView(); 

	}
 
/***
Controller:	core
Function:	status
***/ 
	public function status()
	{  
		$this->param['breadcrumbs']=array('Status');
//		$this->param['defaultMenu']='status';  
		$mainPage=$this->uri->segment(1).'Status';
		$this->param['contents']=array( $mainPage );
//		$this->param['title']='ERP-core status';
/*
model: status_model
view:coreStatus_view
js: {folder}/coreStatus.js
*/
		$this->showView(); 
/*
form : coreStatusEditForm_view, coreStatusAddForm_view
data: coreStatusSave_data, coreStatus_data
*/		
		$folder=$this->param['folder'];
		$this->checkView($folder."coreStatusEditForm_view");
		$this->checkView($folder."coreStatusAddForm_view");
		$this->checkView($folder."data/coreStatusSave_data");
		$this->checkView($folder."data/coreStatus_data");

	} 
 
/***
Controller:	core
Function:	menu
***/ 
	public function menu()
	{
//		$this->load->('menu_model','menu'); 
//		don't forget to add this
		$this->param['breadcrumbs']=array('menu');
//		$this->param['defaultMenu']='core';  
		$mainPage=$this->uri->segment(1).'Menu';
		$this->param['contents']=array( $mainPage );
//		$this->param['title']='ERP-core menu';
/*
model: menu_model
view:coreMenu_view
js: {folder}/coreMenu.js
*/
		$this->showView(); 
/*
form : coreMenuEditForm_view, coreMenuAddForm_view
data: coreMenuSave_data, coreMenu_data
*/		
		$folder=$this->param['folder'];
		$this->checkView($folder."coreMenuEditForm_view");
		$this->checkView($folder."coreMenuAddForm_view");
		$this->checkView($folder."data/coreMenuSave_data");
		$this->checkView($folder."data/coreMenu_data");

	} 

	public function mymodel()
	{
		$this->load->helper('form');
		$this->load->helper('formbootstrap');
		$this->param['breadcrumbs']=array('Generator','Controller');
		$this->param['post']=$post=$this->input->post();
		$this->param['mainMenu']=$this->menu->generate('core' );
		$this->param['contents']=array( 'coreMymodel');
		$detail='';
		if($this->input->post('type')){
			$folder=$this->param['folder'];
			$this->checkView($folder.'tmp_model','view');
			$detail=print_r($this->param['post'],1);
			$fields = $this->db->list_fields($post['table']);
			$fieldsdata = $this->db->field_data($post['table']);
			
			$this->param['fieldsdata']=$fieldsdata;
			$this->param['fieldId']=$fields[0];
 //-------------------clean fieldname
			$pos=strpos($fields[0],"_");
			if($pos===false){
				$fields1=$fields;
				$prefix='';
			}else{ 
				$prefix=substr($fields[0],0,$pos+1);
				
				$fields1=array();$n=0;
				foreach($fields as $val){
					$n++;
					$enter=$n%5==0?"\n\t\t ":"";
					$fields1[]="{$enter}`$val` `".str_replace($prefix,"", $val)."`";
					
				}
			}
			$this->param['prefix']=$prefix;
			$this->param['fields']=$fields1;
			$detail.="<ol>";
			foreach ($fields as $field){
				$detail.="<li>{$field}</li>";				
			}
			$detail.="</ol>";
			$tmp=$this->load->view($folder.'oth/tmp_model',$this->param,true);
			$detail="<?php\n$tmp ";
		}else{}
			$this->param['detail']=$detail;
		$this->showView(); 
	}
	
	public function mycontroller()
	{
		$this->load->helper('form');
		$this->load->helper('formbootstrap');
		$this->param['breadcrumbs']=array('Generator','Controller');
		$mainPage=$this->uri->segment(1).'Mycontroller';
		$this->param['contents']=array( $mainPage);
		$this->param['title']='ERP::Controller Generator';
		$this->param['post']=$post=$this->input->post();
		if($this->input->post('type')){
			$folder=$this->param['folder'];
			$this->checkView($folder.'oth/tmp_controller','view');
			$tmp=$this->load->view($folder.'oth/tmp_controller',$this->param,true);
			$detail="\n$tmp ";
			$detail=str_replace("< ?","<?",$detail);
		}else{ $detail=''; }
		$this->param['detail']=$detail;
/*
model: mycontroller_model
view:coreMycontroller_view
js: {folder}/coreMycontroller.js
*/
		$this->showView(); 
	}
/***
Controller:	core
Function:	tables
***/ 
	public function tables()
	{
//		$this->load->('tables_model','tables'); 
//		don't forget to add this
		
		$this->param['defaultMenu']='core';  
		$mainPage=$this->uri->segment(1).'Tables';
		$this->param['contents']=array( $mainPage );
		$this->param['breadcrumbs']=array('System','Tables Management');
		$this->param['title']='ERP::System::Tables';
/*
model: tables_model
view:coreTables_view
js: {folder}/coreTables.js
*/
		$this->showView(); 
/*
form : coreTablesEditForm_view, coreTablesAddForm_view
data: coreTablesSave_data, coreTables_data
*/		
		$folder=$this->param['folder'];
		$this->checkView($folder."coreTablesEditForm_view");
		$this->checkView($folder."coreTablesAddForm_view");
		$this->checkView($folder."data/coreTablesSave_data");
		$this->checkView($folder."data/coreTables_data");

	}	
	
	public function index()
	{
		$this->param['defaultMenu']='core';  
		$mainPage='icon'; //$this->uri->segment(1).'Status';
		$this->param['contents']=array( 'icon' );
		$this->param['title']='ERP'; 
		$this->param['breadcrumbs']=array('icon' );
		$this->showView(); 
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
		$this->load->model('tables_model','table');
		$this->load->model('status_model','status'); 
		$this->load->model('permision_model','permision'); 
		$this->load->model('member_model','member');
		 
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
		 
		//=============sub JS 			
		$name=$this->uri->segment(2,'');
		$jsScript=$this->param['folder'].$this->uri->segment(1).ucfirst($name).".js";
		 
		if($name!=''){
			$this->param['footerJS'][]=$jsScript;			
		}else{}
		$id=dbIdReport('id','activity',json_encode($_REQUEST)); 
	}	
}