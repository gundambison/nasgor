<?php 
	/****
		views	: guest/benefit_view
		created	: 02-01-2016 17:28:53
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
?><style type="text/css">
	body { background: url(<?=base_url();?>assets/img/bg-login.jpg) !important; }
</style>
<div class="span10" style='margin:10px auto;width:100%'>
<div style="width:70%;margin:auto">
<label for="cari">Masukkan Benefit : </label>
	<input id="cari" > <br/>*Ketik all untuk melihat semua isinya
	<div id='detail' style='margin:50px 0;background:white;padding:20px'></div>
</div>
</div> 
<script>
baseUrl	='<?=base_url();?>';
urlData	=baseUrl+"guest/data/listbenefit";
</script>