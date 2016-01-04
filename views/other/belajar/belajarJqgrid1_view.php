<?php 
/****
	views	: belajar/belajarJqgrid1_view
	created	: 20-11-2015 14:27:40
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?><!--
MAIN VIEW
SILAKAN GANTI NAMA UTAMANYA
-->
<?php 
$name="Belajar JQGRID";
?>
<div style='width:600px;margin:10px auto;'>
 
<h2>MEMANGGIL JSON</h2>
	<table id="list"></table>
	<div id="pager"></div>
<h2>MEMANGGIL ARRAY</h2>
	<table id="list2"></table>
	<div id="pager2"></div> 
</div> 
<script>
/*
	Silakan Ganti nama controller
*/
controller='<?=$this->uri->segment(1);?>'; 
var showLog=true; //matikan ini apabila di production
dataUrl1	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>';
dataUrl2	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>sub';  
</script>

