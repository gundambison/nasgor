<?php
/****
	Model	: Perusahaan_model
	Created	: 19-12-2015 14:01:46
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Perusahaan_model extends CI_Model {
	public $table='klinik_company'; 
/*	
	If not valid, Create New
	UPDATE DATA USING ID:com_id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Perusahaan',json_encode($data), 100);
		$this->db->where('com_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Perusahaan:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['com_id']=dbIdReport('id','create Perusahaan',json_encode($data),100);
		$data['com_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Perusahaan:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using com_id, return as 1 array 
*/	
	function getData($id,$field='com_id')
	{
		$sql="select 
		 `com_id` `id`,  `com_name` `name`,  `com_det` `det`,  `com_stat` `stat` 
		from {$this->table} where {$field}='$id'";
		if($field=='com_id'){
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
		$sql="select count(com_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	    public function __construct()
        {
            $this->load->database();
        }
/*
Field List:
* com_id (int) len:11
* com_name (varchar) len:30
* com_det (text) len:
* com_stat (tinyint) len:4
========
*/
}  