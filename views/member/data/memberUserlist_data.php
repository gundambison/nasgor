<?php 
/****
	views	: member/data/memberUserlist_data
	created	: 22-11-2015 00:59:21
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="member"; //change this

$id=dbIdReport('id','mujur_user list',json_encode($get)); 
$responce = (object)array();
 
$page = $get['page']; // get the requested page
$limit = $get['rows']; // get how many rows we want to have into the grid
$sidx = $get['sidx']; // get index row - i.e. user click to sort
$sord = $get['sord']; // get the direction
if(!$sidx) $sidx =1;
  
if($get['_search']==='false'){	
	$count = $this->$module->usertotal(); 
	if( intval($count) >0 ) {
		$total_pages = ceil($count/$limit);
	} else {
		$total_pages = 0;
	}	

	if ($page > $total_pages) $page=$total_pages;
	$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	
	$SQL = "SELECT user_id id  FROM ".$this->$module->table." a  
	ORDER BY $sidx $sord 
	LIMIT $start , $limit"; 
	$result=dbQuery($SQL,1);

	$i=0;
	foreach ($result->result_array() as $row){
		$responce->rows[$i]['id']=$row['id'];
		$admin='?';
		
		$row2=$this->$module->getData($row['id']);
		if($row2['admin']==1)$admin="(admin)";
		$responce->rows[$i]['cell']=array( 
		strtolower($row2['name']),$row2['fullname'] , $row2);
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