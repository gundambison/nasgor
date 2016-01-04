<?php 
	/****
		views	: marketing/marketingCompanyEditForm_view
		created	: 28-12-2015 01:06:09
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="company"; //change this
$data=$this->$module->getData($post['com_id'],'com_id');
$id=dbIdReport('id','edit klinik_company',$post['com_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','com_id'=>$post['com_id']);
echo form_open('', $atr, $hidden);
?> 
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsText("Detail",'detail',$data['det']);?>	
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
	'title'=>'Update Perusahaan',
	'footer'=>' '

);
echo json_encode($result);