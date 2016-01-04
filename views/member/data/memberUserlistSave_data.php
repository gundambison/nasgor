<?php 
/****
	views	: member/data/memberUserlistSave_data
	created	: 22-11-2015 00:59:21
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="member"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'user_name'=>isset($post['name'])?$post['name']:'', 
		'user_code'=>isset($post['code'])?$post['code']:'', 
		'user_detail'=>isset($post['detail'])?$post['detail']:'', 
	);
	$id=$this->$module->saveData($data);
	echo "<div>User Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
	
	$data=array( 
		'user_name'=>isset($post['name'])?$post['name']:'', 
		'user_fullname'=>isset($post['fullname'])?$post['fullname']:'', 		 
	);
	
	if($post['password']){
		$data['user_password']=md5($post['password']);
	}
	
	if($post['admin']){
		$data['user_admin']=md5($post['admin']);
	}
	$this->$module->updateData($data,$post['user_id']);
	
	$done=true;
	echo "<div>User update  id:{$post['user_id']} </div>";
	$title='Update Data Successed';
}

if($post['type']=='updatePermision'){
	$this->$module->updateDataPermision($post['permit'],$post['user_id']);
	$done=true;
	echo "<div>User Permission Update</div>";
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