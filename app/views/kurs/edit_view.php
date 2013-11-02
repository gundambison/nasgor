<form id='UpdateForm' style='margin:12px 20px'><?php
$id=myUri(3);
/*
Please edit the query
*/
$sql="select * from `".prefix()."kurs`,
`".prefix()."kursdetail`
 where k_id='$id' and
 kdet_id = k_id";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("k_","",$n  );
	$$nm=$v;
	 
}
 

$det=json_decode($detail, true); ?><!-- <?php print_r($data);?>--><input type='hidden' name='k_id' value='<?=$id;?>' />
	<label type='txt'>KODE</label>
	  <input type=text placeholder='Kode' name='k_code' value='<?=$code;?>' />
	<label type='txt'>NAMA</label>
	  <input type=text placeholder='Nama' name='k_name' value='<?=$name;?>' />
	<label type='txt'>STATUS</label>
	  <input type=text placeholder='Status' name='k_stat' value='<?=$stat;?>' />
	<label type='num'>HARGA</label>
	  <input type=text placeholder='Harga' name='k_price' value='<?=$price;?>' />
	<label type='date'>TANGGAL</label>
	  <input type=text placeholder='Tanggal' name='k_date' value='<?=$date;?>' />
	<label type='txt'>SUMBER</label>
	  <input type=text placeholder='sumber' name='k_source' value='<?=$source;?>' />
	<h3>DETAIL</h3>	<label type='chr'>DARI</label>
	  <input type=text placeholder='dari' name='det[from]' value='<?=$det[from];?>' />
	<label type='text'>DETAIL</label>
	  <input type=text placeholder='detail' name='det[more]' value='<?=$det[more];?>' />	 
	<p><input type=button onclick='updateForm()' value='update' />
</form>