<?php 
/****
	views	: core/coreTablesotherForm_view
	created	: 14-11-2015 12:13:31
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed'); 
ob_start();
//print_r($_POST);
$this->param['tableData']= $detail=$this->table->getData($post['table_id']);
$this->param['tablename']= $detail['name'];
foreach($detail as $nm=>$val) $this->param[$nm]=$val;
//print_r($this->param);die();
/*---------MAIN view---*/
$files=array( 
	"JavaScript"=>	"core/oth/tmp_js",
	"Main View"=>	"core/oth/tmp_mainview",	
	"Form Add"=>	"core/oth/tmp_formadd",
	"Form Edit"=>	"core/oth/tmp_formedit",
	"Data Save"=>	"core/oth/tmp_save",
	"Data List"=>	"core/oth/tmp_data",
	
);

foreach($files as $title=>$load_view){
	$detail= $this->load->view($load_view,$this->param,true);
	$detail=str_replace("< ?","<?",$detail);
	echo bsText($title,'detail'.$title,$detail,10);
} 
 
$content=ob_get_contents();
ob_end_clean();
$result=array(
	'body'=>$content,
	'title'=>$title,
	'footer'=>'-',
	'post'=>$post
);
echo json_encode($result);