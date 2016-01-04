<?php
/****
	Model	: Asuransi_model
	Created	: 19-12-2015 13:55:29
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Asuransi_model extends CI_Model {
	public $table='klinik_asuransi'; 
/*	
	If not valid, Create New
	UPDATE DATA USING ID:ins_id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Asuransi',json_encode($data), 100);
		$this->db->where('ins_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Asuransi:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['ins_id']=dbIdReport('id','create Asuransi',json_encode($data),100);
		$data['ins_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Asuransi:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using ins_id, return as 1 array 
*/	
	function getData($id,$field='ins_id')
	{
		$sql="select 
		 `ins_id` `id`,  `ins_name` `name`,  `ins_detail` `detail`,  `ins_stat` `stat` 
		from {$this->table} where {$field}='$id'";
		if($field=='ins_id'){
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
		$sql="select count(ins_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	    public function __construct()
        {
            $this->load->database();
			$sql="select * from {$this->table} limit 1";
			$data=dbFetchOne($sql);
			if(!isset($data['ins_created'])){
				$sql="ALTER TABLE `{$this->table}` ADD `ins_created` DATETIME NOT NULL ;";
				dbQuery($sql,1);
			}else{}
			if(!isset($data['ins_modified'])){
				$sql="ALTER TABLE `{$this->table}` ADD `ins_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL;";
				dbQuery($sql,1);
			}else{}
        }
/*
Field List:
* ins_id (int) len:11
* ins_name (varchar) len:200
* ins_detail (text) len:
* ins_stat (char) len:1
========
*/
}  