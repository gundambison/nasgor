ob_start();
$module="<?=$tableData['module'];?>"; //change this
$data=$this->$module->getData($post['<?=$prefix;?>_id'],'<?=$prefix;?>_id');
$id=dbIdReport('id','edit <?=$tablename;?>',$post['<?=$prefix;?>_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','<?=$prefix;?>_id'=>$post['<?=$prefix;?>_id']);
echo form_open('', $atr, $hidden);
?>
< ?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
< ?php 
$status=array(
   'disable', 'Enable'
);
echo bsSelect("Status", "status", $status, isset($data['status'])?$data['status']:0 );?>		
< ?=bsInput("Code",'code', $data['code'],'Kode Yang Jelas Terbaca');?>
< ?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas Terbaca');?>
< ?=bsText("Detail",'detail',$data['detail']);?>	
	< ?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
< ?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update <?=$tableData['name'];?>',
	'footer'=>' ',
//	'data'=>$data
);
echo json_encode($result);