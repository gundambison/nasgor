<?php
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
   $addrp[]=$r['cadr_address'];
}
?>	<label>Code</label> 
	  <?=$code;?> 
    
	<label>Nama</label>
	  <?=$name;?><div class='phoneList'>   
	<label>Telepon</label><ol style='margin:5px 0px 5px 40px	'><?php   
$telp=json_decode($data['cus_phone'], TRUE);
foreach($telp as $v)
{
   ?><li><?=$v;?></li><?
}?></ol></div>	<label>Alamat</label>
<?php    
foreach($addrp  as $id2=>$v)
{
   ?>	  <textarea readonly rows=3 cols=60 ><?=$v;?></textarea>
<?php
}