<?php 
/****
	views	: marketing/data/marketingAsuransisave_data
	created	: 19-12-2015 14:06:07
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="asuransi"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'ins_name'=>isset($post['name'])?$post['name']:'', 
		//'ins_code'=>isset($post['code'])?$post['code']:'', 
		'ins_detail'=>isset($post['detail'])?$post['detail']:'', 
		'ins_stat'=>0
	);
	$id=$this->$module->saveData($data);
	echo "<div>klinik_asuransi Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
	$data=array( 
		'ins_name'=>isset($post['name'])?$post['name']:'', 
		'ins_stat'=>isset($post['stat'])?$post['stat']:0, 
		'ins_detail'=>isset($post['detail'])?$post['detail']:'',
	);
	$this->$module->updateData($data,$post['ins_id']);
	$done=true;
	echo "<div>Menu update  id:{$post['ins_id']} </div>";
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