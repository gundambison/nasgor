<form id='UpdateForm' style='margin:12px 20px'>
 
	<label>Code</label>
	<input type=text   name='sup_id'   />*
	<label>Nama</label>
	<input type=text   name='sup_name' />
	<label>Alamat</label>
	<textarea name='det[address]' rows=4 cols=60 ></textarea>
	<label>Telepon</label>
	<input type=text   name='det[phone]' />
	<label>Status</label>
<?php
 

echo "\t<input type=radio value=0 checked name='sup_stat' />Hidden <input type=radio value=1   name='sup_stat' />Show";
?>
<p>	<input type=button onclick='newData()' value='New' />
</form>