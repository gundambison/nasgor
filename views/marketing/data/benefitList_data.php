<?php 
	/****
		views	: marketing/data/benefitList_data
		created	: 02-01-2016 02:27:00
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$responce=array('post'=>$post);
//id,label,value
$search=$get['term']; //$get['term'];
$str="select ben_id id from `%s` where ben_name like '%s' or ben_detail like '%s'";
$sql=sprintf($str, $this->benefit->table,"%".$search."%","%".$search."%");
if(strtolower($search)=="all"){
	$sql="select ben_id id from ".$this->benefit->table." order by ben_pos";
}

$dt=$this->db->query($sql)->result_array();
foreach($dt as $r){
	$row=$this->benefit->getData($r['id']);
	$responce['result'][]=array(
		'id'=>$r['id'],
		'label'=>$row['name'],
		'value'=>$row['name'],
		'detail'=>$row['detail'],
		'howto'=>$row['howto']
	);
}
$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce['error']=$error;        
	
$responce['-']=$_SERVER;

if(isset($responce['result'])){
	$responce['body']=json_encode($responce['result']);
	echo json_encode($responce['result'] );
}else{
	echo json_encode(array());
}