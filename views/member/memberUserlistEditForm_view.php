<?php 
/****
	views	: member/memberUserlistEditForm_view
	created	: 22-11-2015 00:59:21
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="member"; //change this
$data=$this->$module->getData($post['user_id'],'user_id');
$id=dbIdReport('id','edit mujur_user',$post['user_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','user_id'=>$post['user_id']);
echo form_open('', $atr, $hidden);
?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsInput("Nama Lengkap",'fullname', $data['fullname'],'Nama Lengkap');?>
<?=bsPassword("Password",'password');?> 	
	<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<script>
	
</script>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update mujur_user',
	'footer'=>' '

);
echo json_encode($result);