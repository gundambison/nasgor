<?php 
	/****
		views	: marketing/data/marketingBenefitsave_data
		created	: 01-01-2016 00:56:42
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="benefit"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'ben_name'=>isset($post['name'])?$post['name']:'', 		 
		'ben_detail'=>isset($post['detail'])?$post['detail']:'', 
		'ben_howto'=>isset($post['howto'])?$post['howto']:'',
		'ben_pos'=>99
	);
	$id=$this->$module->saveData($data);
	echo "<div>klinik_benefit Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
	//redirect(base_url("marketing/benefit"),1);
}else{}

if($post['type']=='update'){
	$data=array( 
		'ben_name'=>isset($post['name'])?$post['name']:'',   
		'ben_detail'=>isset($post['detail'])?$post['detail']:'',
		'ben_howto'=>isset($post['howto'])?$post['howto']:'',
		'ben_pos'=>isset($post['pos'])?$post['pos']:'99',
	);
	$this->$module->updateData($data,$post['ben_id']);
	$done=true;
	echo "<div>Menu update  id:{$post['ben_id']} </div>";
	$title='Update Data Successed';
}
	
if($done==false){
	$id=dbIdReport('id','error',json_encode($_REQUEST)); 
	echo 'check your parameter';
	$title='Error';
}else{}

$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>$title,
	'footer'=>' ',
	'post'=>$post,
	'other'=>$_SERVER
);
echo json_encode($result);
