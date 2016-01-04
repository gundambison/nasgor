<?php 
	/****
		views	: marketing/marketingBenefitAddForm_view
		created	: 01-01-2016 00:56:42
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
 
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'save','pos'=>99);
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Nama",'name', '','Benefit');?>
<?=bsText2("Detail",'detail','');?>
<?=bsText2("Yang Harus Dilakukan",'howto','');?>	
	<?php
$atr=array( 'onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
 
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Menambah Benefit',
	'footer'=>' '

);
echo json_encode($result);