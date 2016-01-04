<?php
if(!$siteUrl)
{
	$siteUrl="http://".$_SERVER['SERVER_NAME']."/";
	$a=explode( "/",$_SERVER['SCRIPT_NAME']);
	for($i=1;$i<count($a)-1;$i++)
		$siteUrl.=$a[$i]."/";
}

$data=array();

function loadMod($file)
{
global $appFolder,$coreFolder;
	$ok=false;
	$target1=$appFolder."/mods/".$file.".php";
	$target2=$coreFolder."/mods/".$file.".php";	
	if(is_file($target1))
	{
		require_once($target1);
		$ok=1;
		//die($target1);
	}
	
	if($ok!=1)
	 if(is_file($target2))
	 {
		require_once($target2);
		$ok=1;
	 }else{
		die($target1.$target2);
	 }
 
	
	return $ok;
}

function showView($file,$data0=array() )
{
global $appFolder;
global $data;
	$target=$appFolder."/views/".$file.".php";
	if(count($data0))
	{
		$data=$data0;
	}
	
	if(is_file($target))
	{
		foreach($data as $n=>$v) $$n=$v;	
		include($target);
	}else{
		echo "WARNING: Tidak ditemukan file $file di folder view!!";
		die();
	}
}
