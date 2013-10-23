<form id='UpdateForm' style='margin:12px 20px'> 
	<label>Code</label>
	<input type=text placeholder='Code' name='str_code'   />
	 *jangan terlalu panjang
	<label>Nama</label>
	<input type=text placeholder='Nama' name='str_name' />
	<label>Alamat</label>
	<textarea name='det[address]' rows=4 cols=60 ></textarea>
	<label>Telepon</label>
	<input type=text   name='det[phone]' />
	<p><input type=button onclick='newData()' value='save' />
</form>