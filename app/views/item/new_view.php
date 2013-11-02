<style>
.alamat{
margin:0; padding:0;
}
</style><form id='UpdateForm' style='margin:12px 20px'><?php /* JUST EXAMPLE.. delete if you don't use this -->	
	<label>Code</label>
	<input type=text placeholder='Code' name='item_code' value='<?php
$code=date("ymd");
$code.=sprintf("%04s",
	strtoupper(dechex(auto_id()%4000))
); 	
	echo $code;
	?>' readonly />
	 *jangan terlalu panjang*/ ?>
	<label type='txt'>KODE</label>
	  <input type=text placeholder='Kode' name='item_code' />
	<label type='txt'>NAMA</label>
	  <input type=text placeholder='Nama' name='item_name' />
	<label type='txt'>STATUS</label>
	  <input type=text placeholder='Status' name='item_stat' />
	<label type='num'>HARGA</label>
	  <input type=text placeholder='Harga' name='item_price' />
	<label type='num'>DISKON</label>
	  <input type=text placeholder='Diskon' name='item_disc' />
	<label type='txt'>UKURAN</label>
	  <input type=text placeholder='Ukuran' name='item_size' />
	<label type='num'>STOCK</label>
	  <input type=text placeholder='Stock' name='item_stock' />
	<label type='txt'>HARGA BELI</label>
	  <input type=text placeholder='Harga Beli' name='item_price0' />
	<label type='num'>MINIMAL</label>
	  <input type=text placeholder='Minimal' name='item_stock0' />
	<label type='txt'>GUDANG</label>
	  <input type=text placeholder='Gudang' name='item_store' />
	<label type='num'>CATEGORY</label>
	  <input type=text placeholder='Category' name='item_cat' />
	<label type='txt'>MERK</label>
	  <input type=text placeholder='Merk' name='item_merk' />
	<label type='num'>HOT</label>
	  <input type=text placeholder='Hot' name='item_hot' />
	<h3>DETAIL</h3>	<label type='chr'>EXPIRE</label>
	  <input type=text placeholder='expire' name='det[expire]'  />
	<label type='chr'>WARNA</label>
	  <input type=text placeholder='warna' name='det[color]'  />
	<label type='char'>SATUAN</label>
	  <input type=text placeholder='Satuan' name='det[pcs]'  />
	<label type='text'>DETAIL</label>
	  <input type=text placeholder='Detail' name='det[desc]'  />
	<label type='char'>BARCODE</label>
	  <input type=text placeholder='Barcode' name='det[barcode]'  />
	<label type='char'>RAK</label>
	  <input type=text placeholder='Rak' name='det[rak]'  />
	<p><input type=button onclick='newData()' value='save' />
</form>
