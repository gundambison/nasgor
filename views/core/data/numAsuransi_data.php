<?php 
	/****
		views	: core/data/numAsuransi_data
		created	: 01-01-2016 14:20:59
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
	$sql="select ins_stat, count(ins_id) total from klinik_asuransi where ins_stat=1";
	$row=$this->db->query($sql)->row_array();
	$body=$row['total'] ;
	
	$sql="select ins_stat, count(ins_id) total from klinik_asuransi ";
	$row=$this->db->query($sql)->row_array();
	$body.=" (total:{$row['total']})";

$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce['error']=$error;

$responce['body']=$body;
$responce['post']=$_POST;
	  
echo json_encode($responce);	