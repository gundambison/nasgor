<?php 
/****
	views	: core/coreStatusAddForm_view
	created	: 11-11-2015 19:15:35
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
 
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

$result=array(
	'body'=>$content,
	'title'=>'Menambah mujur_status ',
	'footer'=>' '

);
echo json_encode($result);