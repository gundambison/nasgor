<?php 
	/****
		views	: Phr/data/prodTagKomp_data
		created	: 03-01-2016 13:39:02
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farprod"; //change this 

$table=$this->$module->tabletag;
$type=substr($get['type'],3, strlen($get['type'])-3);
$tags=array(
	'total'=>
		array(
		  'all'=>$this->$module->tagTotal(),
		  'product'=>$this->$module->tagProductTotal(),
		  'type'=>$this->$module->tagTypeTotal(),
		),  
	'data'=>$this->$module->tagTypeSearch($type,$get['term'])
);
$cari=array();
foreach($tags['data'] as $row){
	$cari[]=array(
		'id'=>$row['id'],
		'label'=>$row['short'],
		'value'=>$row['short'],
		'detail'=>$row['full'],
		'type'=>$row['type']
	);
}

$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,  
	'request'=>$_REQUEST,
	'tag'=>$tags
);
echo json_encode($cari);