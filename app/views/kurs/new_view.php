<style>
.alamat{
margin:0; padding:0;
}
</style><form id='UpdateForm' style='margin:12px 20px'><?php /* JUST EXAMPLE.. delete if you don't use this -->	
	<label>Code</label>
	<input type=text placeholder='Code' name='k_code' value='<?php
$code=date("ymd");
$code.=sprintf("%04s",
	strtoupper(dechex(auto_id()%4000))
); 	
	echo $code;
	?>' readonly />
	 *jangan terlalu panjang*/ ?>
	<label type='txt'>KODE</label>
	  <input type=text placeholder='Kode' name='k_code' />
	<label type='txt'>NAMA</label>
	  <input type=text placeholder='Nama' name='k_name' />
	<label type='txt'>STATUS</label>
	  <input type=text placeholder='Status' name='k_stat' />
	<label type='num'>HARGA</label>
	  <input type=text placeholder='Harga' name='k_price' />
	<label type='date'>TANGGAL</label>
	  <input type=text placeholder='Tanggal' name='k_date' />
	<label type='txt'>SUMBER</label>
	  <input type=text placeholder='sumber' name='k_source' />
	<h3>DETAIL</h3>	<label type='chr'>DARI</label>
	  <input type=text placeholder='dari' name='det[from]'  />
	<label type='text'>DETAIL</label>
	  <input type=text placeholder='detail' name='det[more]'  />
	<p><input type=button onclick='newData()' value='save' />
</form>
