<?php 
/****
	views	: marketing/marketingAsuransiEditForm_view
	created	: 19-12-2015 14:06:07
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="asuransi"; //change this
$data=$this->$module->getData($post['ins_id'],'ins_id');
$id=dbIdReport('id','edit klinik_asuransi',$post['ins_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','ins_id'=>$post['ins_id']);
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsText("Detail",'detail',$data['detail']);?>	
<?php 
$dtSelect=array(
'Tidak Aktif',
1=>'Aktif',  'Spesial'
);
echo bsSelect("Status",'stat',$dtSelect,$data['stat']);?>	
	<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update Asuransi',
	'footer'=>' ',
	'data'=>$data

);
echo json_encode($result);