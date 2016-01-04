<?php 
/****
	views	: temp/welcome_view
	created	: 14-11-2015 23:46:28
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
echo form_open('' );
?><div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags" name='tags'/>
</div>
<input id='buah' name='buah'/>
<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',1,'btn-save',$atr );?>
</form>
<script>
urlSource="<?=base_url('temp/data/tesbuah');?>";
</script>
<?php 
if(isset($_POST)){ print_r($_POST); }