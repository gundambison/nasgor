<?php
/****
	Model	: Benefit_model
	Created	: 01-01-2016 00:46:01
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Benefit_model extends CI_Model {
	public $table='klinik_benefit'; 
/*	
	If not valid, Create New
	UPDATE DATA USING ID:ben_id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Benefit',json_encode($data), 100);
		$this->db->where('ben_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Benefit:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['ben_id']=dbIdReport('id','create Benefit',json_encode($data),100);
		$data['ben_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Benefit:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using ben_id, return as 1 array 
*/	
	function getData($id,$field='ben_id')
	{
		$sql="select 
		 `ben_id` `id`,  `ben_name` `name`,  `ben_detail` `detail`,  `ben_modified` `modified`,  `ben_created` `created`,  `ben_status` `status`,  `ben_howto` `howto`,ben_pos pos
		from {$this->table} where {$field}='$id'";
		if($field=='ben_id'){
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
		$sql="select count(ben_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	    public function __construct()
        {
            $this->load->database();
			$sql="select * from {$this->table} limit 1";
			$data=dbFetchOne($sql);
			if(count($data)!==0){
			if(!isset($data['ben_created'])){
				logCreate('no field created?'.json_encode($data));
				$sql="ALTER TABLE `{$this->table}` ADD `ben_created` DATETIME NOT NULL ;";
				dbQuery($sql,1);
			}else{}
			if(!isset($data['ben_modified'])){
				logCreate('no field modified?'.json_encode($data));
				$sql="ALTER TABLE `{$this->table}` ADD `ben_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL;";
				dbQuery($sql,1);
			}else{}
			}
			
        }
/*
Field List:
* ben_id (bigint) len:20
* ben_name (varchar) len:100
* ben_detail (text) len:
* ben_modified (timestamp) len:
* ben_created (datetime) len:
* ben_status (int) len:11
* ben_howto (text) len:
* mkt_field002 (varchar) len:100
* mkt_field003 (varchar) len:100
* mkt_field004 (varchar) len:100
* mkt_field005 (varchar) len:100
* mkt_field006 (varchar) len:100
* mkt_field007 (varchar) len:100
* mkt_field008 (varchar) len:100
* mkt_field009 (varchar) len:100
* mkt_field010 (varchar) len:100
========
*/
}  