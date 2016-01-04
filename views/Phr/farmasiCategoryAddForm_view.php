<?php 
	/****
		views	: Phr/farmasiCategoryAddForm_view
		created	: 02-01-2016 23:32:47
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farcat"; //change this  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'save');
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Kode",'code', '','Code yang singkat');?>
<?=bsInput("Nama",'name', '','Nama Yang Jelas');?>
<?=bsText("Detail",'detail','');?>	
	<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<?php 
$content=ob_get_contents();
ob_end_clean();
$data=array( 
		'cat_name'=>isset($post['name'])?$post['name']:'', 
		'cat_code'=>isset($post['code'])?$post['code']:'', 
		'cat_detail'=>isset($post['detail'])?$post['detail']:'', 
	);
$id=$this->$module->saveData($data);
$result=array(
	'id'=>$id,
	'body'=>$content,
	'title'=>'Menambah farmasi_category ',
	'footer'=>' '

);
echo json_encode($result);