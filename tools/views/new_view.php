<style>
.alamat{
margin:0; padding:0;
}
</style><form id='UpdateForm' style='margin:12px 20px'><?php /* JUST EXAMPLE.. delete if you don't use this -->	
	<label>Code</label>
	<input type=text placeholder='Code' name='%prefnama%_code' value='<?php
$code=date("ymd");
$code.=sprintf("%04s",
	strtoupper(dechex(auto_id()%4000))
); 	
	echo $code;
	?>' readonly />
	 *jangan terlalu panjang*/ ?>
	%listNew%
	<p><input type=button onclick='newData()' value='save' />
</form>
