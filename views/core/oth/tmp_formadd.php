ob_start();
$module="<?=$tableData['module'];?>"; //change this 
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'save');
echo form_open('', $atr, $hidden);
?>
< ?=bsInput("Kode",'code', '','Code yang singkat');?>
< ?=bsInput("Nama",'name', '','Nama Yang Jelas');?>
< ?=bsText("Detail",'detail','');?>	
	< ?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
< ?php 
$content=ob_get_contents();
ob_end_clean();
/*
	Apabila ingin menambahkan automatis tanpa memakai form 
	sehinggat saat klik add.. sudah terbuat dan berikutnya melakukan
	edit
*/
$data=array();
$id=$this->$module->saveData($data);
$result=array(
	'body'=>$content,
	'title'=>'Menambah <?=$tableData['name'];;?> ',
	'footer'=>' ',
	'id'=>$id 
);
echo json_encode($result);