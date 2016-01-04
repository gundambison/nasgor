<?php 
/****
	views	: member/memberUserlistpermisionForm_view
	created	: 22-11-2015 01:34:59
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$userid=$this->session->userdata('erp_userid');
$detail=$this->member->getData($userid);
$permitDef=array();
foreach($detail['permit'] as $row){
	$permitDef[]=$row['id'];
}

//print_r($detail);

$module="member"; //change this
$data=$this->$module->getData($post['user_id'],'user_id');
$id=dbIdReport('id','edit mujur_user',$post['user_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'updatePermision','user_id'=>$post['user_id']);
echo form_open('', $atr, $hidden); 

$raw=$this->permision->getAllData();
foreach($raw as $row){
	$permitData[$row['id']]=strtolower($row['name']);
}
asort($permitData);
$attributes = array(
 			'id'            => 'input_permit',
 			'class'			=> 'form-control',
			'multiple'	=> 'multiple'
		);
	  $inp=form_dropdown('permit[]',$permitData, $permitDef,$attributes);
		$str='<div class="form-group">
    <label for="input_permit">User Permision ('.$detail['name'].')</label>'.$inp.'</div>';
	echo $str;
?> 
<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<script>$('#input_permit').multiSelect();</script>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update mujur_user',
	'footer'=>' '

);
echo json_encode($result);