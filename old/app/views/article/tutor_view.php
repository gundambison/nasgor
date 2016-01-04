<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>160 Hari bersama Nasgor</title>
	 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link href="<?=my_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	 
</head>
<body>
<div class='container'><?php
loadMod('tutor_mod');
$ar=tutorShowUri($uri);

?>
<div class='row'><div class='span-12'>
<ul class="breadcrumb" >
  <li><a href="<?=my_url();?>form/006bootstrap">List Tutorial</a><span class="divider"> </span></li>
  <li class='active'> <?=$ar['name'];?>  </li>
</ul>
<h2><?=$ar['name'];?></h2>
<p><?=nl2br($ar['detail']);?></p>
<h4>PREVIEW CODE</h4>
<p><textarea style='width:600px;height:250px'><?=htmlentities($ar['code']);?>
</textarea>
</p><?php
if($ar['preview']==1)
{?><div style='border: 1px solid #bbb;
border-radius: 10px;
padding: 10px 20px 10px 20px;'><?=trim($ar['code']);?></div>	
<?} 
?>
</div></div>
<?php
 
?>
</div> 
<script src="<?=my_url();?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=my_url();?>assets/js/bootstrap.js"></script>
</body>
</html>