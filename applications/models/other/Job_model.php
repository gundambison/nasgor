<?php
/****
	Model	: Job_model
	Created	: 16-11-2015 19:21:41
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Job_model extends CI_Model {
	public $table='mujur_job'; 
/*	
	If not valid, Create New
	UPDATE DATA USING ID:job_id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Job',json_encode($data), 1000);
		$this->db->where('job_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Job:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['job_id']=dbIdReport('work','create Job',json_encode($data),1010);
		$data['job_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Job:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using job_id, return as 1 array 
*/	
	function getData($id,$field='job_id')
	{
		$sql="select 
		 `job_id` `id`,  `job_code` `code`,  `job_name` `name`,  `job_detail` `detail`,  `job_modified` `modified`,  `job_created` `created`,  `job_status` `status`,  `job_field01` `field01`,  `job_field02` `field02`,  `job_field03` `field03`,  `job_field04` `field04`,  `job_field05` `field05`,  `job_field06` `field06`,  `job_field07` `field07`,  `job_field08` `field08`,  `job_field09` `field09`,  `job_field10` `field10` 
		from {$this->table} where {$field}='$id'";
		if($field=='job_id'){
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
		$sql="select count(job_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	    public function __construct()
        {
            $this->load->database();
        }
/*
Field List:
* job_id (bigint) len:20
* job_code (varchar) len:100
* job_name (varchar) len:100
* job_detail (text) len:
* job_modified (timestamp) len:
* job_created (datetime) len:
* job_status (int) len:11
* job_field01 (varchar) len:100
* job_field02 (varchar) len:100
* job_field03 (varchar) len:100
* job_field04 (varchar) len:100
* job_field05 (varchar) len:100
* job_field06 (varchar) len:100
* job_field07 (varchar) len:100
* job_field08 (varchar) len:100
* job_field09 (varchar) len:100
* job_field10 (varchar) len:100
========
*/
}  