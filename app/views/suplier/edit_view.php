<form id='UpdateForm' style='margin:12px 20px'>
<?php
$id=myUri(3);
$sql="select * from ".prefix()."suplier where sup_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("sup_","",$n  );
	$$nm=$v;
	 
}
$det=json_decode($detail, true);
?>
	<label>Code</label>
	<input type=text value='<?=$code;?>' name='sup_id' readonly />
	<label>Nama</label>
	<input type=text value='<?=$name;?>' name='sup_name' />
	<label>Alamat</label>
	<textarea name='det[address]' rows=4 cols=60 ><?=$det['address'];?></textarea>
	<label>Telepon</label>
	<input type=text value='<?=$det['phone'];?>' name='det[phone]' />
	<label>Status: <?php
$check1=$check2='';
if($stat==1){
	$check1='checked';
	echo "Show";
}else{
	$check2='checked';
	echo "Hidden";

}
?></label>
<?php
echo "\t<input type=radio value=0 $check2 name='sup_stat' />Hidden <input type=radio value=1 $check1 name='sup_stat' />Show";
?><p>
	<input type=button onclick='updateForm()' value='update' />
</form>