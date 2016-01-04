<?php 
	/****
		views	: marketing/data/marketingCompanysave_data
		created	: 28-12-2015 01:06:09
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="company"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'com_name'=>isset($post['name'])?$post['name']:'', 
		'com_stat'=>isset($post['stat'])?$post['stat']:0,
		'com_det'=>isset($post['detail'])?$post['detail']:'', 
	);
	$id=$this->$module->saveData($data);
	echo "<div>klinik_company Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
	$data=array( 
		'com_name'=>isset($post['name'])?$post['name']:'', 
		'com_stat'=>isset($post['stat'])?$post['stat']:0, 
		'com_det'=>isset($post['detail'])?$post['detail']:'',
	);
	$this->$module->updateData($data,$post['com_id']);
	$done=true;
	echo "<div>Menu update  id:{$post['com_id']} </div>";
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
	'post'=>$post
);
echo json_encode($result);