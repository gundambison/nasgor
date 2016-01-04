<?php 
	/****
		views	: Phr/farmasiCategoryEditForm_view
		created	: 02-01-2016 23:32:47
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farcat"; //change this
$data=$this->$module->getData($post['cat_id'],'cat_id');
$id=dbIdReport('id','edit farmasi_category',$post['cat_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','cat_id'=>$post['cat_id']);
echo form_open('', $atr, $hidden);
?>
<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
<?php 
echo bsSelect("Sub", "sub", $this->$module->selectDataSub(),$data['sub']);?>
<?=bsInput("Code",'code', $data['code'],'Nama Yang Jelas');?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsInput("Posisi",'pos', $data['pos'],'999');?>
<?=bsText("Detail",'detail','');?>	

	<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update farmasi_category',
	'footer'=>' ',
	'data'=>$data
);
echo json_encode($result);