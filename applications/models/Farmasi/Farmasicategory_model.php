<?php
/****
	Model	: Farmasicategory_model
	Created	: 02-01-2016 23:31:29
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Farmasicategory_model extends CI_Model {
	public $table='farmasi_category'; 
/*	
	If not valid, Create New
	UPDATE DATA USING ID:cat_id	
*/
	function updateData($data,$id,$report=true)
	{
		if($report===true)
			dbIdReport('update','update Farmasicategory',json_encode($data), 1000);
		
		$this->db->where('cat_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Farmasicategory:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['cat_id']=dbIdReport('farmasi','create Farmasicategory',json_encode($data),1000);
		$data['cat_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Farmasicategory:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using cat_id, return as 1 array 
*/	
	function getData($id,$field='cat_id',$orderby='cat_id',$sort='ASC')
	{
		$sql="select 
		 `cat_id` `id`,  `cat_name` `name`,  `cat_code` `code`,  `cat_detail` `detail`,  `cat_sub` `sub`,  `cat_pos` `pos`,  `cat_created` `created`,  `cat_modified` `modified` 
		from {$this->table} where {$field}='$id' order by {$orderby} {$sort}";
		if($field=='cat_id'){
			$data=dbFetchOne($sql);
		}else{ 
			$result=dbQuery($sql,1);
			$data=array();
			$i=0;
			foreach ($result->result_array() as $row){
				$data[]=$row;
			}
		}
		return $data;
	}
/*
	TOTAL ALL DATA IN TABLE
	If not valid, create New
*/	
	function totalAll()
	{
		$sql="select count(cat_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	public function selectDataSub(){
		$ar=array('0'=>'Parent');
		$dt=$this->getData(0,'cat_sub');
		$n=0;
		foreach($dt as $r){
			$ar[ $r['id'] ]=$r['code'].". ".$r['name'];
		}
		return $ar;
	}
	
	public function selectData(){
		$ar=array('0'=>'silakan pilih');
		$dt=$this->getData(0,'cat_sub');
		$n=0;
		foreach($dt as $r){
			$ar[ $r['id'] ]=$r['code'].". ".$r['name'];
			$dt2=$this->getData($r['id'],'cat_sub');
			$n=0;
			foreach($dt2 as $r2){
				$ar[ $r2['id'] ]=' '.$r2['code'].". ".$r2['name'];
			}
		}
		return $ar;
	}
	private function rebuildPosition()
	{
		$dt=$this->getData(0,'cat_sub');
		$n=0;
		foreach($dt as $r){
			$n++;$n2=0;
			$ar=array('cat_pos'=>($n*100));		
			if($r['code']=='0'){
				//logCreate("chr=".chr(64+$n),'info');
				$ar['cat_code']=chr(64+$n);
			}
			$this->updateData($ar,$r['id'],0);
			logCreate("update id:".$r['id']."| dt:".json_encode($ar));
			$dt2=$this->getData($r['id'],'cat_sub');
			foreach($dt2 as $r2){
				$n2++;
				$ar=array('cat_pos'=>($n*100 + $n2));
				if($r2['code']=='0'){
					//logCreate("chr=".chr(64+$n).".".chr(64+$n2),'info' );
					$ar['cat_code']=chr(64+$n).".".chr(64+$n2);
				}
				$this->updateData($ar,$r2['id'],0);			 
				logCreate("update id:".$r2['id']."| dt:".json_encode($ar));
			}
			
		}
		$this->db->query("OPTIMIZE TABLE {$this->table}");
		
	}
	
	    public function __construct()
        {
            $this->load->database();
			$sql="select * from {$this->table} limit 1";
			$data=dbFetchOne($sql);
			if(!isset($data['cat_created'])){
				$sql="ALTER TABLE `{$this->table}` ADD `cat_created` DATETIME NOT NULL ;";
				dbQuery($sql,1);
			}else{}
			if(!isset($data['cat_modified'])){
				$sql="ALTER TABLE `{$this->table}` ADD `cat_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL;";
				dbQuery($sql,1);
			}else{}
			
			$dt=$this->getData(0,'cat_pos');
			if(count($dt)!=0){
				$this->rebuildPosition();
			}
			else{
				logCreate('pos OK');
			}
			
        }
/*
Field List:
* cat_id (int) len:11
* cat_name (varchar) len:150
* cat_code (varchar) len:11
* cat_detail (text) len:
* cat_sub (int) len:11
* cat_pos (int) len:11
* cat_created (datetime) len:
* cat_modified (timestamp) len:
========
*/
}  