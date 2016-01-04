<?php 
	/****
		views	: Phr/data/farmasiCategorysave_data
		created	: 02-01-2016 23:32:47
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farcat"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'cat_name'=>isset($post['name'])?$post['name']:'', 
		'cat_code'=>isset($post['code'])?$post['code']:'', 
		'cat_detail'=>isset($post['detail'])?$post['detail']:'', 
	);
	$id=$this->$module->saveData($data);
	echo "<div>farmasi_category Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
	$data=array( 
		'cat_name'=>isset($post['name'])?$post['name']:'', 
		'cat_code'=>isset($post['code'])?$post['code']:'', 
		'cat_detail'=>isset($post['detail'])?$post['detail']:'',
		'cat_pos'=>$post['pos'],
		'cat_sub'=>$post['sub']
	);
	$this->$module->updateData($data,$post['cat_id']);
	$done=true;
	echo "<div>Menu update  id:{$post['cat_id']} </div>";
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