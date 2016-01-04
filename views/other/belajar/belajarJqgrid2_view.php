<?php 
/****
	views	: belajar/belajarJqgrid2_view
	created	: 20-11-2015 15:26:08
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div style='width:600px;margin:10px auto;'>
 
<h2>MEMANGGIL JSON</h2>
	<table id="list"></table>
	<div id="pager"></div>
<a class='btn btn-default' href="#list" id="a1">Get data from selected row</a>
	<br />
	<a class='btn btn-default' href="#list" id="a2">Delete row  2</a>
	<br />
	<a class='btn btn-default' href="#list" id="a3">Update amounts in row 3301</a>
	<br />
	<a class='btn btn-default' href="#list" id="a4">Add row with id 99</a>
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