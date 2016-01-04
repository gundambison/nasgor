<?php 
/****
	views	: marketing/data/marketingAsuransiDetail_data
	created	: 19-12-2015 14:06:08
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Detil  ',
	'footer'=>' '

);
echo json_encode($result);