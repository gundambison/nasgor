<?php 
/****
	views	: member/memberUserlist_view
	created	: 22-11-2015 00:59:20
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
$userid=$this->session->userdata('erp_userid');
$detail=$this->member->getData($userid);
?><!--
MAIN VIEW
SILAKAN GANTI NAMA UTAMANYA
-->
<?php 
$name="User ERP";
?>
<div style='width:600px;margin:10px auto;'>
<div class="btn-group"  > 
	<!--button type='button' class='btn btn-default' onclick='btnAdd()' >Tambah <?=$name;?> </button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?> </button-->
<?php 
if($detail['admin']==1){?>
<button type='button' class='btn btn-default' onclick='btnEditPermision()' >Edit Permision</button>
<?php 
}
?>	 
</div>
<hr/>
	<table id="list"></table>
	<div id="pager"></div>
	<hr/> 
	<div class="btn-group"   > 
	<!--button type='button' class='btn btn-default' onclick='btnAdd()' >
	Tambah  <?=$name;?></button>
	<button type='button' class='btn btn-primary' onclick='btnEdit()'>Edit <?=$name;?></button-->
<?php 
if($detail['admin']==1){?>
<button type='button' class='btn btn-default' onclick='btnEditPermision()' >Edit Permision</button>
<?php 
}
?>	
		 
	</div>
</div> 
<script>
/*
	Silakan Ganti nama controller
*/
controller='<?=$this->uri->segment(1);?>'; 
var showLog=true;  

dataUrl1	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>';
dataUrl2	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>sub'; 

urlFormAdd	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>add';
urlFormEdit	='<?=base_url();?>'+controller+'/form/<?=$myUrl;?>edit';
urlFormEditPermision = '<?=base_url();?>'+controller+'/form/<?=$myUrl;?>permision';
urlFormSave	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>save';
urlother	='<?=base_url();?>'+controller+'/data/<?=$myUrl;?>other';
</script>