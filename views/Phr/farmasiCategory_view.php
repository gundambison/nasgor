<?php 
	/****
		views	: Phr/farmasiCategory_view
		created	: 02-01-2016 23:32:47
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
?> <!--
MAIN VIEW
SILAKAN GANTI NAMA UTAMANYA
-->
<?php 
$name="Category Farmasi";
?>
<div style='width:600px;margin:10px auto;'>
<div class="btn-group"> 
	<button type='button' class='btn btn-default' onclick='btnAdd()' >Tambah <?=$name;?> </button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?> </button>
<?php if(isset($showDetail)&&$showDetail==true){?>	
	<button type='button' class='btn btn-primary' onclick='btnDetail()'>Detail <?=$name;?> </button> 
<?php } ?>
</div>
<hr/>
	<table id="list"></table>
	<div id="pager"></div>
	<hr/> 
	<div class="btn-group"> 
	<button type='button' class='btn btn-default' onclick='btnAdd()' >
	Tambah  <?=$name;?></button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?></button>
<?php if(isset($showDetail)&&$showDetail==true){?>	
	<button type='button' class='btn btn-primary' onclick='btnDetail()'>Detail <?=$name;?> </button> 
<?php } ?>	
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

urlFormAdd	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>Add';
urlFormEdit	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>Edit';
urlFormSave	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>Save';
urlother	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>Other';
<?php if(isset($showDetail)){?>	
urlother	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>Detail';
<?php }?>
</script>