<style>
.alamat{
margin:0; padding:0;
}
</style><form id='UpdateForm' style='margin:12px 20px'> 	<label>Code</label>
	<input type=text placeholder='Code' name='cus_code' value='<?php
$code=date("ymd");
$code.=sprintf("%04s",
	strtoupper(dechex(auto_id()%4000))
); 	
	echo $code;
	?>' readonly />
	 *jangan terlalu panjang
	 
	<label>Nama</label>
	<input type=text placeholder='Nama' name='cus_name' /><div class='phoneList'>	
	<label>Telepon</label><span class='phone'>
	<input type=text   name='phone[]'  /></span></div>
	<input type=button onclick='addPhone()' value='Tambah Telepon' /><div class='alamatList'><div class='alamat'>	
	<label>Alamat</label>
	<textarea name='address[]' rows=4 cols=60 ></textarea></div></div>
	<input type=button onclick='addAddress()' value='Tambah Alamat' />
	<p><input type=button onclick='newData()' value='save' />
</form>
