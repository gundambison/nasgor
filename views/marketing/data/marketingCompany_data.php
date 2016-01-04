<?php 
	/****
		views	: marketing/data/marketingCompany_data
		created	: 28-12-2015 01:06:09
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="company"; //change this

$id=dbIdReport('id','klinik_company list',json_encode($get)); 
$responce = (object)array();
 
$page = $get['page']; // get the requested page
$limit = $get['rows']; // get how many rows we want to have into the grid
$sidx = $get['sidx']; // get index row - i.e. user click to sort
$sord = $get['sord']; // get the direction
if(!$sidx) $sidx =1;
  
if($get['_search']==='false'){	
	$count = $this->$module->totalAll(); 
	if( intval($count) >0 ) {
		$total_pages = ceil($count/$limit);
	} else {
		$total_pages = 0;
	}	

	if ($page > $total_pages) $page=$total_pages;
	$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	
	$SQL = "SELECT com_id id  FROM ".$this->$module->table." a  
	ORDER BY $sidx $sord 
	LIMIT $start , $limit"; 
	$result=dbQuery($SQL,1);

	$i=0;
	foreach ($result->result_array() as $row){
		$responce->rows[$i]['id']=$row['id'];
		$row2=$this->$module->getData($row['id']);
		$status='-';
		if($row2['stat']==1)$status='active';
		if($row2['stat']==0)$status='tidak aktif';
		if($row2['stat']==2)$status='special';
		
		$responce->rows[$i]['cell']=array($row['id'], 
		$row2['name'], $row2['det'],$status);
		$i++; 
		$responce->raw[]=$row2;
	}
	
}else{}

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;

$error = ob_get_contents();
ob_end_clean();
if($error!='')
	$responce->error=$error;
        
echo json_encode($responce);