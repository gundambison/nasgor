<form id='UpdateForm' style='margin:12px 20px'><?php
$id=myUri(3);
/*
Please edit the query
*/
$sql="select * from `".prefix()."item`,
`".prefix()."itemdetail`
 where item_id='$id' and
 itemdet_id = item_id";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("item_","",$n  );
	$$nm=$v;
	 
}
 

$det=json_decode($detail, true); ?><!-- <?php print_r($data);?>--><input type='hidden' name='item_id' value='<?=$id;?>' />
	<label type='txt'>KODE</label>
	  <input type=text placeholder='Kode' name='item_code' value='<?=$code;?>' />
	<label type='txt'>NAMA</label>
	  <input type=text placeholder='Nama' name='item_name' value='<?=$name;?>' />
	<label type='txt'>STATUS</label>
	  <input type=text placeholder='Status' name='item_stat' value='<?=$stat;?>' />
	<label type='num'>HARGA</label>
	  <input type=text placeholder='Harga' name='item_price' value='<?=$price;?>' />
	<label type='num'>DISKON</label>
	  <input type=text placeholder='Diskon' name='item_disc' value='<?=$disc;?>' />
	<label type='txt'>UKURAN</label>
	  <input type=text placeholder='Ukuran' name='item_size' value='<?=$size;?>' />
	<label type='num'>STOCK</label>
	  <input type=text placeholder='Stock' name='item_stock' value='<?=$stock;?>' />
	<label type='txt'>HARGA BELI</label>
	  <input type=text placeholder='Harga Beli' name='item_price0' value='<?=$price0;?>' />
	<label type='num'>MINIMAL</label>
	  <input type=text placeholder='Minimal' name='item_stock0' value='<?=$stock0;?>' />
	<label type='txt'>GUDANG</label>
	  <input type=text placeholder='Gudang' name='item_store' value='<?=$store;?>' />
	<label type='num'>CATEGORY</label>
	  <input type=text placeholder='Category' name='item_cat' value='<?=$cat;?>' />
	<label type='txt'>MERK</label>
	  <input type=text placeholder='Merk' name='item_merk' value='<?=$merk;?>' />
	<label type='num'>HOT</label>
	  <input type=text placeholder='Hot' name='item_hot' value='<?=$hot;?>' />
	<h3>DETAIL</h3>	<label type='chr'>EXPIRE</label>
	  <input type=text placeholder='expire' name='det[expire]' value='<?=$det[expire];?>' />
	<label type='chr'>WARNA</label>
	  <input type=text placeholder='warna' name='det[color]' value='<?=$det[color];?>' />
	<label type='char'>SATUAN</label>
	  <input type=text placeholder='Satuan' name='det[pcs]' value='<?=$det[pcs];?>' />
	<label type='text'>DETAIL</label>
	  <input type=text placeholder='Detail' name='det[desc]' value='<?=$det[desc];?>' />
	<label type='char'>BARCODE</label>
	  <input type=text placeholder='Barcode' name='det[barcode]' value='<?=$det[barcode];?>' />
	<label type='char'>RAK</label>
	  <input type=text placeholder='Rak' name='det[rak]' value='<?=$det[rak];?>' />	 
	<p><input type=button onclick='updateForm()' value='update' />
</form>