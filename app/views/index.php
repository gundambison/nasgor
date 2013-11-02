<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=my_url();?>assets/favicon.png">

    <title>Backend Shop Application</title>
    <!-- Custom styles for this template -->
    <link href="<?=my_url();?>assets/css/navbar-fixed-top.css" rel="stylesheet"> 
    <script src="<?=my_url();?>assets/js/jquery.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="<?=my_url();?>assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?=my_url();?>assets/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?=my_url();?>assets/demo.css">
	 
	<script type="text/javascript" src="<?=my_url();?>assets/js/jquery.easyui.min.js"></script>
	<!-- Bootstrap core CSS 	-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?=my_url();?>js/html5shiv.js"></script>
      <script src="<?=my_url();?>js/respond.min.js"></script>
    <![endif]-->
 	 <style>
	 .body1{
	 padding: 0 10px;
	margin: 60PX auto;
	width: 1200px;
	 }
	 .navbar-fixed-top{
		position: fixed;
z-index: 10;
background: lightblue;
top:10px;
 
	 }
	 .bgmenu{
	 background: lightblue;
width: 100%;
height: 56px;
position: fixed;
top: 0;
left: 0;
z-index: 9;
	 }
	 </style>
	 
  </head>

  <body class='body1' style='min-height:500px'>
<?php showView('nav',$nav);?>
<?php showView('tab',$tab);?>
<?php showView('js',$tab);?> 
 
  </body>
</html>