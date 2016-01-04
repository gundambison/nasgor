<?php 
	/****
		views	: core/data/numHomecare_data
		created	: 01-01-2016 14:21:00
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
	$sql="select count(daf_id) total from hc_daftar";
	$row=$this->db->query($sql)->row_array();
	$body=number_format($row['total'],0);

$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce['error']=$error;

$responce['body']=$body;
$responce['post']=$_POST;
	  
echo json_encode($responce);	