<?php 
	/****
		views	: marketing/marketingBenefitEditForm_view
		created	: 01-01-2016 00:56:42
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="benefit"; //change this
$data=$this->$module->getData($post['ben_id'],'ben_id');
$id=dbIdReport('id','edit klinik_benefit',$post['ben_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','ben_id'=>$post['ben_id']);
echo "<div>".form_open(base_url("marketing/data/marketingBenefitSave"), $atr, $hidden);
?>
 
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsInput("Posisi",'pos', $data['pos'],'Posisi');?>
<?=bsText2("Detail",'detail',$data['detail']);?>
<?=bsText2("Yang Harus Dilakukan",'howto',$data['howto']);?>	
	<?php
$atr=array('onclick2'=>'saveFormData()'  );	
	echo bsButton('Save',1,'btn-save',$atr );?>
</form>
</div>
<script>
	console.log('start');
	tinymce.init({
	  selector: '.tinymce' 
	});
</script>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update klinik_benefit',
	'footer'=>' ',
	'data'=>$data

);
echo json_encode($result);