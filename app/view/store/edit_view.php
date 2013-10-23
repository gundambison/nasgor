<form id='UpdateForm' style='margin:12px 20px'><?php
$id=myUri(3);
$sql="select * from ".prefix()."store where str_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("str_","",$n  );
	$$nm=$v;
	 
}
$det=json_decode($detail, true); ?>
	<label>Code</label>
	<input type=text value='<?=$code;?>' name='str_code' readonly />
	<input type=hidden value='<?=$id;?>' name='str_id'  />
	<label>Nama</label>
	<input type=text value='<?=$name;?>' name='str_name' />
	<label>Alamat</label>
	<textarea name='det[address]' rows=4 cols=60 ><?=$det['address'];?></textarea>
	<label>Telepon</label>
	<input type=text value='<?=$det['phone'];?>' name='det[phone]' />
	<p><input type=button onclick='updateForm()' value='update' />
</form>