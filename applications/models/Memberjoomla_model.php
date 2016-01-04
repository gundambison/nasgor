<?php
/****
	Model	: Memberjoomla_model
	Created	: 06-12-2015 09:24:26
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Memberjoomla_model extends CI_Model {
	public $table='jos_users'; 
	
	function checkUser( $username, $password)
	{
		$data0=$this->getData($username, 'username');
		
		if(count($data0)==0){
			logCreate('user invalid:'.json_encode($data0));
			return false;
		}
		$data=$data0[0];
		if($data['password']!=$password){
			logCreate('password invalid:'.json_encode($data0));
			return false;
		}
		return true;
	}
/*	
	If not valid, Create New
	UPDATE DATA USING ID:id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Memberjoomla',json_encode($data), 100);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Memberjoomla:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['id']=dbIdReport('id','create Memberjoomla',json_encode($data),100);
		$data['created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Memberjoomla:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using id, return as 1 array 
*/	
	function getData($id,$field='id')
	{
		$sql="select 
		 id,  name,  username,  email,  password,  usertype,  block,  sendEmail,  gid,  registerDate,  lastvisitDate,  activation,  params 
		from {$this->table} where {$field}='$id'";
		if($field=='id'){
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
		$sql="select count(id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
	
	    public function __construct()
        {
            $this->load->database();
        }
/*
Field List:
* id (int) len:11
* name (varchar) len:255
* username (varchar) len:150
* email (varchar) len:100
* password (varchar) len:100
* usertype (varchar) len:25
* block (tinyint) len:4
* sendEmail (tinyint) len:4
* gid (tinyint) len:3
* registerDate (datetime) len:
* lastvisitDate (datetime) len:
* activation (varchar) len:100
* params (text) len:
========
*/
}  