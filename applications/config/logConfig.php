<?php 
//logConfig
$config['logConfig']=array(
	'path'=>'logs/'.date("Ym").'/',
	'name'=>'%s.php',
	'write'=>true,
);

$config['logCore']=array(
	'path'=>'logs/core/'.date('Y').'/',
	'name'=>'core_%s.php',
	'write'=>true,
);

$config['logDB']=array(
	'path'=>'logs/db/'.date('Y/m').'/',
	'name'=>'db_%s.php',
	'write'=>true,
);

//===============ALTO
$config['logCoreAlto']=array(
	'path'=>'logs/alto/core/'.date('Y/m').'/',
	'name'=>'core_%s.php',
	'write'=>true,
);
$config['logErrorAlto']=array(
	'path'=>'logs/alto/error/'.date('Y').'/',
	'name'=>'error_%s.php',
	'write'=>true,
);
$config['logAlto']=array(
	'path'=>'logs/alto/'.date('Y/m').'/',
	'name'=>'%s.php',
	'write'=>true,
);