<form id='UpdateForm' style='margin:12px 20px'><?php
$id=myUri(3);
$sql="select * from `".prefix()."customer` where cus_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("cus_","",$n  );
	$$nm=$v;
	 
}

$sql="SELECT * 
FROM  `".prefix()."customeraddress` where cadr_cus=$id";
$q=query($sql);
while($r=fetch($q))
{
	$addrp[$r['cadr_id']]=$r['cadr_address'];

}

$det=json_decode($detail, true); ?><!-- <?php print_r($data);?>-->
	<label>Code</label><input type='hidden' name='cus_id' value='<?=$id;?>' />
	<input type=text placeholder='Code' name='cus_code' value='<?=$code;?>' readonly />
	 *jangan terlalu panjang
	 
	<label>Nama</label>
	<input type=text placeholder='Nama' name='cus_name' /><div class='phoneList'>	
	<label>Telepon</label>
	<?php	
$telp=json_decode($data['cus_phone'], TRUE);
foreach($telp as $v)
{
	?><input type=text name='phone[]' value='<?=$v;?>'  />
	<?
}?><span class='phone' 
	style='display:none'><input type=text   name='phone[]'  />
	</span></div>
	<input type=button onclick='addPhone()' value='Tambah Telepon' /><div class='alamatList'>	<label>Alamat</label>
	<?php	
$telp=json_decode($data['cus_phone'], TRUE);
foreach($addrp  as $id2=>$v)
{
	?><textarea name='cus_addr[<?=$id2;?>]' rows=4 cols=60 ><?=$v;?></textarea>
	<?
}?><div class='alamat' style='display:none'>	
	<textarea name='addr[]' rows=4 cols=60 ></textarea></div></div>
	<input type=button onclick='addAddress()' value='Tambah Alamat' />
	<p><input type=button onclick='updateForm()' value='update' />
</form>