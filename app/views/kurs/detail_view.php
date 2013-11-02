<?php
$id=myUri(3);
$sql="select * from `".prefix()."kurs` where k_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
   $nm=str_replace("k_","",$n  );
   $$nm=$v;
    
}

 
?>	<label>KODE</label>
	    <?=$code;?>
	<label>NAMA</label>
	    <?=$name;?>
	<label>HARGA</label>
	    <?=$price;?>
	<label>TANGGAL</label>
	    <?=$date;?><!--
	try fix this detail
-->
	<label>DARI</label>
	    <?=$from;?>
	<label>DETAIL</label>
	    <?=$more;?>