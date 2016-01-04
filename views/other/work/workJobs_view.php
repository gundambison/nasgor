<?php 
/****
	views	: work/workJobs_view
	created	: 16-11-2015 19:03:22
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?><!--
MAIN VIEW
SILAKAN GANTI NAMA UTAMANYA
-->
<?php 
$name="Job List";
?>
<div style='width:600px;margin:10px auto;'>
<div class="btn-group"> 
	<button type='button' class='btn btn-default' onclick='btnAdd()' >Tambah <?=$name;?> </button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?> </button> 
</div>
<hr/>
	<table id="list"></table>
	<div id="pager"></div>
	<hr/> 
	<div class="btn-group"> 
	<button type='button' class='btn btn-default' onclick='btnAdd()' >
	Tambah  <?=$name;?></button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?></button>	 
	</div>
</div> 
<script>
/*
	Silakan Ganti nama controller
*/
controller='<?=$this->uri->segment(1);?>'; 
var showLog=true; //matikan ini apabila di production

dataUrl1	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>';
dataUrl2	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>sub'; 

urlFormAdd	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>add';
urlFormEdit	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>edit';
urlFormSave	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>save';
urlother	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>other';
</script>