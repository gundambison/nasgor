<?php 
	/****
		views	: core/data/numCompany_data
		created	: 01-01-2016 14:20:58
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
	$sql="select com_stat, count(com_id) total from klinik_company where com_stat=1 or com_stat=2";
	$row=$this->db->query($sql)->row_array();
	$body=$row['total'] ;
	
	$sql="select com_stat, count(com_id) total from klinik_company ";
	$row=$this->db->query($sql)->row_array();
	$body.=" (total:{$row['total']})";

$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce['error']=$error;

$responce['body']=$body;
$responce['post']=$_POST;
	  
echo json_encode($responce);	