<?php
$id=myUri(3);
$sql="select * from `".prefix()."item` where item_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
   $nm=str_replace("item_","",$n  );
   $$nm=$v;
    
}

 
?>	<label>KODE</label>
	    <?=$code;?>
	<label>NAMA</label>
	    <?=$name;?>
	<label>STATUS</label>
	    <?=$stat;?>
	<label>HARGA</label>
	    <?=$price;?>
	<label>DISKON</label>
	    <?=$disc;?>
	<label>STOCK</label>
	    <?=$stock;?>
	<label>CATEGORY</label>
	    <?=$cat;?>
	<label>MERK</label>
	    <?=$merk;?><!--
	try fix this detail
-->
	<label>EXPIRE</label>
	    <?=$expire;?>
	<label>WARNA</label>
	    <?=$color;?>
	<label>SATUAN</label>
	    <?=$pcs;?>
	<label>DETAIL</label>
	    <?=$desc;?>
	<label>BARCODE</label>
	    <?=$barcode;?>
	<label>RAK</label>
	    <?=$rak;?>