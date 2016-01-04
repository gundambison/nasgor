<?php
defined('BASEPATH') OR exit('No direct script access allowed');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--KSC-->
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'head_view':'ksc/head_view';
	$this->maincore->checkView($load_view);
	$this->load->view($load_view);
?>

<body>
<a name='top'  >&nbsp;</a><div style='margin-top:-55px'></div>	
<?php
if(!isset($contentOnly)){ ?>
<!-- start: Header KSC--><?php 
	$load_view=isset($baseFolder)?$baseFolder.'header_view':'ksc/header_view';
	$this->maincore->checkView($load_view);
	$this->load->view($load_view);
?><!-- End: Header1--><?php
}else{}
?>
<?php
if(!isset($contentOnly)){ ?>
<!-- start: Header KSC--><?php 
	$load_view=isset($baseFolder)?$baseFolder.'menu_view':'ksc/menu_view';
	$this->maincore->checkView($load_view);
	$this->load->view($load_view);
?>
<!-- End: Header2-->
<?php
}else{}
?><div class='container' style='margin-top:20px'>
	<div class='row'>
<?php 
if(isset($contents)){
  foreach($contents as $content){ 
	$load_view= $folder.$content.'_view';
	?><!-- Start : <?=$load_view;?> --><?php
	$this->maincore->checkView($load_view);	
	$this->load->view($load_view);
	?><!-- End : <?=$load_view;?> --><?php
  }
  
}else{ 
	?><!-- no contents --><?php
}
?></div>
	<div class="footer">
        <p>&copy; Mujur 2015</p>
    </div>
</div>
<!-- start: Modal-->
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'modal_view':'ksc/modal_view';
	$this->maincore->checkView($load_view);
	$this->load->view($load_view);
?><!-- end: Modal--> 

<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<?php 
if(isset($footerJS)){ 
	if(!is_array($footerJS)){ 
		$footerJS=array($footerJS); 
	}else{}
	
	foreach($footerJS as $jsFile ){?>
	  <script src="<?=base_url();?>assets/js/<?=$jsFile;?>"></script>
<?php 
	}
}else{ echo '<!--no footer js -->'; } ?>
</body>
</html>