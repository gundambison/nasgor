<?php 
	/****
		views	: Phr/farmasiProductAddForm_view
		created	: 03-01-2016 00:52:05
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
 
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'save');
echo form_open('', $atr, $hidden);
?>
langsung automatis dibuat .. 
</form>
<?php 
$content=ob_get_contents();
ob_end_clean();
$data=array();
$id=$this->$module->saveData($data);
$result=array(
	'body'=>$content,
	'title'=>'Menambah farmasi_product ',
	'footer'=>' ',
	'id'=>$id
);
echo json_encode($result);