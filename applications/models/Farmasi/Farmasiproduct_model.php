<?php
/****
	Model	: Farmasiproduct_model
	Created	: 03-01-2016 00:49:54
	By		: Gunawan Wibisono 
	Using 	: CI3 Model Generator  
****/
defined('BASEPATH') OR exit('No direct script access allowed');
class Farmasiproduct_model extends CI_Model {
	public $table='farmasi_product'; 
	public $tabletag='farmasi_producttag';
/*	
	If not valid, Create New
	UPDATE DATA USING ID:prod_id	
*/
	function updateData($data,$id, $report=true)
	{
		if($report===true)
			dbIdReport('update','update Farmasiproduct',json_encode($data), 100);
		$this->db->where('prod_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Farmasiproduct:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['prod_id']=dbIdReport('farmasi','create Farmasiproduct',json_encode($data),100);
		$data['prod_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Farmasiproduct:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using prod_id, return as 1 array 
*/	
	function getData($id,$field='prod_id',$stat='detail')
	{
		$sql="select 
		 `prod_id` `id`,  `prod_code` `code`,  `prod_name` `name`, `prod_name2` `name2`,  `prod_detail` `detail`,  `prod_modified` `modified`,  `prod_created` `created`,  `prod_status` `status`,  `prod_category` `category`,  `prod_golongan` `golongan`,  `prod_refprod` `refprod`,  `prod_full` `full`,  `prod_field005` `field005`,  `prod_field006` `field006`,  `prod_field007` `field007`,  `prod_field008` `field008`,  `prod_field009` `field009`,  `prod_field010` `field010` 
		from {$this->table} where {$field}='$id'";
		logCreate("farmasi prod getData id:$id|field:$field");
		if($field=='prod_id'){
			$data=dbFetchOne($sql);
//==========untuk id only 
			if($stat=='detail'){
			 $data['tags']=array(
				'Komposisi'=>array(),
				'Indikasi'=>array(),
				'Dosis'=>array(),
				'Pemberian_obat'=>array(),
				'Kontra_indikasi'=>array(),
				'Perhatian'=>array(),
				'Efek_samping'=>array(),
				'Interaksi_obat'=>array(),
				'Kemasan'=>array(),
				
				);//in progress 
				$data['productTags']=$tag=$this->getDataTag($id,'prodtag_product');
				
				foreach($tag as $row){
					$data['tags'][$row['type']][]=$row['short'];
				}//logCreate($data);
				
				foreach($data['tags'] as $name=>$val){					
					$data[$name]=implode("; ",$val);//logCreate('tag:'.$name);
				}
				
				$data['ref']=$data['refprod']!=0?$this->getData($data['refprod'],'prod_id','simple'):array();
				$data['referensi']=isset($data['ref']['name'])?$data['ref']['name']:'';
				$data['fulldetail']=nl2br($data['full']);
			}else{}
		}
		else{ 
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
		$sql="select count(prod_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}
/*===============TAGS================

	'data'=>$this->$module->tagTypeSearch($get['type'],$get['term'])
*/
	public function tagTypeSearch($type="",$cari=""){
		$sql="select 
			`prodtag_id` `id`
		from {$this->tabletag}";
		 
			$cari="'%".addslashes(strtolower($cari))."%'";
			$where=sprintf(
			"`prodtag_type` like %s and `prodtag_type` like '%s' ", $cari,$type
			);
			$sql.=" where $where";
		 
		//$sql.=" group by prodtag_type";
		$result=dbQuery($sql,1);
		$data=array();
		foreach ($result->result_array() as $row){
			$data[]=$this->getDataTag($row['id']);
		}
		return $data;
	}
	
	public function removeTagProduct($prod_id){
		$sql="delete from {$this->tabletag} where prodtag_product={$prod_id}";
		dbQuery($sql,1);
		return true;
	}
	
	public function tagProductTotal($cari=false){
		$sql="select count(`prodtag_id`) total from {$this->tabletag}";
		if($cari!==false){
			$cari="'%".addslashes(strtolower($cari))."%'";
			$where=sprintf(
			"`prodtag_short` like %s or `prodtag_full` like %s", $cari,$cari
			);
			$sql.=" where $where";
		}
		$sql.=" group by prodtag_product";
		$data=dbFetchOne($sql);
		return $data['total'];
	}
	
	public function tagTypeTotal($cari=false){
		$sql="select count(`prodtag_id`) total from {$this->tabletag}";
		if($cari!==false){
			$cari="'%".addslashes(strtolower($cari))."%'";
			$where=sprintf(
			"`prodtag_type` like %s", $cari,$cari
			);
			$sql.=" where $where";
		}
		$sql.=" group by prodtag_type";
		$data=dbFetchOne($sql);
		return $data['total'];
		
	}
	
	public function tagTotal($cari=false){
		$sql="select count(`prodtag_id`) total from {$this->tabletag}";
		if($cari!==false){
			$cari="'%".addslashes(strtolower($cari))."%'";
			$where=sprintf(
			"`prodtag_short` like %s or `prodtag_full` like %s", $cari,$cari
			);
			$sql.=" where $where";
		}
		$data=dbFetchOne($sql);
		return $data['total'];
	}
		
	function getDataTag($id,$field='prodtag_id')
	{
		$sql="select 
		 `prodtag_id` `id`,  `prodtag_product` `product`,  `prodtag_short` `short`,  `prodtag_full` `full`,  
		 `prodtag_modified` `modified`,  `prodtag_created` `created`,  `prodtag_type` `type` 
		from {$this->tabletag} where {$field}='$id'";
		if($field=='prodtag_id'){
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
	
	    public function __construct()
        {
            $this->load->database();
			$sql="select * from {$this->table} limit 1";
			$data=dbFetchOne($sql);
			if(count($data)!=0){
			if(!isset($data['prod_created'])){
				$sql="ALTER TABLE `{$this->table}` ADD `prod_created` DATETIME NOT NULL ;";
				dbQuery($sql,1);
			}else{}
			if(!isset($data['prod_modified'])){
				$sql="ALTER TABLE `{$this->table}` ADD `prod_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL;";
				dbQuery($sql,1);
			}else{}
			}
        }
/*
Field List:
* prod_id (bigint) len:20
* prod_code (varchar) len:100
* prod_name (varchar) len:100
* prod_detail (text) len:
* prod_modified (timestamp) len:
* prod_created (datetime) len:
* prod_status (int) len:11
* prod_category (int) len:11
* prod_golongan (varchar) len:100
* prod_refprod (bigint) len:20
* prod_field004 (varchar) len:100
* prod_field005 (varchar) len:100
* prod_field006 (varchar) len:100
* prod_field007 (varchar) len:100
* prod_field008 (varchar) len:100
* prod_field009 (varchar) len:100
* prod_field010 (varchar) len:100
========
*/
}  