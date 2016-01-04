<?php 
	/****
		views	: Phr/data/farmasiProductsave_data
		created	: 03-01-2016 00:52:05
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farprod"; //change this 
$done=false;
if($post['type']=='save'){
	$data=array( 
		'prod_name'=>isset($post['name'])?$post['name']:'', 
		'prod_code'=>isset($post['code'])?$post['code']:'', 
		'prod_detail'=>isset($post['detail'])?$post['detail']:'', 
	);
	$id=$this->$module->saveData($data);
	echo "<div>farmasi_product Created id:$id  </div>";
	$done=true;
	$title='Save Data Successed';
}else{}

if($post['type']=='update'){
//==============hapus tag	
	$this->$module->removeTagProduct( $post['prod_id']);
//=============update tag=========	
    $headPost=array_keys($post);
	//echo "head:".print_r($headPost);
	foreach($headPost as $name){
		if(strtolower(substr($name,0,3)=='tag')){
			$type=ucfirst( strtolower( trim(substr($name,3,strlen($name)-3)) ) );
			$tags[$type]=$data=explode(";",$post[$name]);
			
			asort($data);
			foreach($data as $val){
				if(trim($val)=='')continue;
				$dtTag=array(
					'prodtag_id'=>dbId('farmasi'),
					'prodtag_product'=>$post['prod_id'],
					'prodtag_short'=>trim($val),
					'prodtag_full'=>trim($type).":".trim($val),
					'prodtag_created'=>date("Y-m-d H:i:s"),
					'prodtag_type'=>$type
				);
				$this->db->insert($this->$module->tabletag,$dtTag);
				logCreate("input {$type}:{$val} prodid:{$post['prod_id']}","info");
			}
		}
		
	}
	
	$full="Name:".$post['name'];	
	$full.=isset($post['code'])&&$post['code']!=''?"\nCode: ".$post['code']:'';
	$full.=isset($post['name2'])&&$post['name2']!=''?"\nNama Lain: ".$post['name2']:'';
	foreach($tags as $name=>$data){
		$name2=str_replace("_"," ",$name);
		$full.="\n\n".trim(strtoupper($name2)).":\n";
		$full0=implode("\n",$data);
		$full.=str_replace("\n ","\n",$full0);
	}
	
	$full.=isset($post['gol'])?"\n\nGolongan: {$post['gol']}\n":"\n\n";
	$full.=isset($post['detail'])?$post['detail']:'.';
	$data=array( 
		'prod_name'=>isset($post['name'])?$post['name']:'', 
		'prod_name2'=>isset($post['name2'])?$post['name2']:'', 
		'prod_golongan'=>isset($post['gol'])?$post['gol']:'', 
		'prod_refprod'=>isset($post['refprod'])?$post['refprod']:'', 
		'prod_code'=>isset($post['code'])?$post['code']:'', 
		'prod_detail'=>isset($post['detail'])?$post['detail']:'',
		'prod_full'=>$full,
		'prod_category'=>$post['category']
		
	);
	//logCreate(print_r($data,1));
	//logCreate(print_r($post,1));
	$this->$module->updateData($data,$post['prod_id']);
	
	$done=true;
	echo "<div>update  id:{$post['prod_id']} </div>";
	$title='Update Data Successed';
}
	
if($done==false){
	$id=dbIdReport('id','error',json_encode($_REQUEST)); 
	echo 'check your parameter';
	$title='Error';
}else{}

$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>$title,
	'footer'=>' ',
	//'post'=>$post,
	'data'=>$data=$this->$module->getData($post['prod_id'],'prod_id')
);
echo json_encode($result);