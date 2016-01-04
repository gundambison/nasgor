<?php 
/****
	views	: temp/data/tempGundamSave_data
	created	: 14-11-2015 13:08:15
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="gundam"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'gun_name'=>isset($post['name'])?$post['name']:'', 
		'gun_code'=>isset($post['code'])?$post['code']:'', 
		'gun_detail'=>isset($post['detail'])?$post['detail']:'', 
	);
	$id=$this->$module->saveData($data);
	echo "<div>mujur_gundam Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
	$data=array( 
		'gun_name'=>isset($post['name'])?$post['name']:'', 
		'gun_code'=>isset($post['code'])?$post['code']:'', 
		'gun_detail'=>isset($post['detail'])?$post['detail']:'',
	);
	$this->$module->updateData($data,$post['gun_id']);
	$done=true;
	echo "<div>Menu update  id:{$post['gun_id']} </div>";
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