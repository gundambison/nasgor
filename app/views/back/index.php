<!DOCTYPE html>
<html lang="en">
<?php showView('head',$head); ?>
<body class='body1'>
<?php showView('nav',$nav);?>
<?php
if(isset($carousal))
	showView('carousal');
?>
	<div class="container">
<?php
if($jumboTron)
	showView('jumboTron');
?>	
	<?php showView('dropdown',$nav);?>
	<div class='col-md-1'></div>
	<div class='col-md-8'>
			<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>  
		  <li class="active">Data</li>
		</ol>
	<?php 
	$data=array('content'=>$content);
	showView($fileContent,$data);
	?>
	
	</div>
	</div>
	<!-- /container -->
  <div class="container">
    <div class="footer">
      <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <script src="<?=my_url();?>js/jquery.js"></script> 
  <script src="<?=my_url();?>js/bootstrap.min.js"></script> 
  <script src="<?=my_url();?>js/holder.js"></script> 
  <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>