<?php 
/****
	views	: temp/tempGundamEditForm_view
	created	: 14-11-2015 13:07:43
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="gundam"; //change this
$data=$this->$module->getData($post['gun_id'],'gun_id');
$id=dbIdReport('id','edit mujur_gundam',$post['gun_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','gun_id'=>$post['gun_id']);
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Code",'code', $data['code'],'Nama Yang Jelas');?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsText("Detail",'detail',$data['detail']);?>	
	<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update mujur_gundam',
	'footer'=>' '

);
echo json_encode($result);