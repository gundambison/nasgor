<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
23 November 2015
Versi 2 Nasgor.. Construct sudah diperkecil

*/
class Farmasi extends CI_Controller {
public $param; 
private $folder='Phr';  
/***
Controller:	farmasi
Function:	product
***/ 
	public function products()
	{ 
		$this->param['breadcrumbs']=array('Farmasi','Product');
//		$this->param['defaultMenu']='farprod';  
		$mainPage=$this->uri->segment(1).'Product';
		$this->param['contents']=array( $mainPage );
//		$this->param['module']='product';
		$this->param['title']='[ERP]farmasi::product';
/*
model: product_model
view:farmasiProduct_view
js: {folder}/farmasiProduct.js
*/
		$this->param['showDetail']=false;
		$this->showView(); 
/*
form : farmasiProductEditForm_view, farmasiProductAddForm_view
data: farmasiProductSave_data, farmasiProduct_data
*/		
		$folder=$this->param['folder']; //$this->folder;
		$this->checkView($folder."farmasiProductEditForm_view");
		$this->checkView($folder."farmasiProductAddForm_view");
		$this->checkView($folder."data/farmasiProductsave_data");
		$this->checkView($folder."data/farmasiProduct_data");
//		$this->checkJS();

		if($this->param['showDetail']==true){
			$this->checkView($folder."data/farmasiProductDetail_data");	
		}
	}
 
/***
Controller:	farmasi
Function:	category
***/ 
	public function category()
	{
		$this->param['breadcrumbs']=array('update','this');
//		$this->param['defaultMenu']='farcat';  
		$mainPage=$this->uri->segment(1).'Category';
		$this->param['contents']=array( $mainPage );
//		$this->param['module']='category';
		$this->param['title']='[ERP]farmasi::category';
/*
model: category_model
view:farmasiCategory_view
js: {folder}/farmasiCategory.js
*/
		$this->param['showDetail']=false;
		$this->showView(); 
/*
form : farmasiCategoryEditForm_view, farmasiCategoryAddForm_view
data: farmasiCategorySave_data, farmasiCategory_data
*/		
		$folder=$this->param['folder']; //$this->folder;
		$this->checkView($folder."farmasiCategoryEditForm_view");
		$this->checkView($folder."farmasiCategoryAddForm_view");
		$this->checkView($folder."data/farmasiCategorysave_data");
		$this->checkView($folder."data/farmasiCategory_data");
		$this->checkJS();

		if($this->param['showDetail']==true){
			$this->checkView($folder."data/farmasiCategoryDetail_data");	
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
		
		$this->load->model('farmasi/farmasicategory_model','farcat'); 
		$this->load->model('farmasi/farmasiproduct_model','farprod');
		 	
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
//-----------end