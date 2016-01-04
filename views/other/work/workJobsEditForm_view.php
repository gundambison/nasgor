<?php 
/****
	views	: work/workJobsEditForm_view
	created	: 16-11-2015 19:03:22
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="job"; //change this
$data=$this->$module->getData($post['job_id'],'job_id');
$id=dbIdReport('id','edit mujur_job',$post['job_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','job_id'=>$post['job_id']);
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Code",'code', $data['code'],'Nama Yang Jelas');?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
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
	'title'=>'Update mujur_job',
	'footer'=>' '

);
echo json_encode($result);