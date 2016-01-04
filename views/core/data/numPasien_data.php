<?php 
	/****
		views	: core/data/numPasien_data
		created	: 01-01-2016 13:53:28
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
	$sql="select count(pat_id) total from klinik_pasien";
	$row=$this->db->query($sql)->row_array();
	$body=number_format($row['total'],0);
/*
	$sql="SELECT count(pat_id) total,date(pat_inp) FROM `klinik_pasien`  group by date(pat_inp) order by pat_inp desc 
limit 10";
	$row=$this->db->query($sql)->result_array();
	$dt=array();
	foreach($row as $r){
		$dt[]=$r['total'];
	}
	arsort($dt);
	$responce['boxData']=implode(",",$dt);
	*/
$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce['error']=$error;

$responce['body']=$body;
$responce['post']=$_POST;
	  
echo json_encode($responce);	