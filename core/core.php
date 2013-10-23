<?php

include($appFolder."/config/config.php"); 
include($appFolder."/config/database.php"); 
include($appFolder."/config/autoload.php"); 

$fileopen0=isset( $_GET['f'])?$_GET['f']:'';
$fileopen0=str_replace(".html","",trim($fileopen0));

$arFile=explode("/",$fileopen0);
$fileopen=$arFile[0];
/*
==========
Cari di config body dan action apakah ada filenya atau tidak.
==========
*/
$aBody=array( );
$d = dir("$appFolder/body");
while (false !== ($entry = $d->read())) {
	if($entry!='.'&& $entry!='..'   )
	{
		$aFile=explode(".",$entry);
		if(substr($entry,-3)=='php')
		{
			$aBody[]=substr($entry,0,-4);
		}
	}

}
 
$aSpesial=array();
$d = dir("$appFolder/action");
while (false !== ($entry = $d->read())) {
	if($entry!='.'&& $entry!='..'   )
	{
		$aFile=explode(".",$entry);
		if(substr($entry,-3)=='php')
		{
			$aSpesial[]=substr($entry,0,-4);
		}
	}

}

if($fileopen)
{
	$ok=array_search($fileopen,$aBody)===false?false:1;
	$ok2=array_search($fileopen,$aSpesial)===false?false:1; 
	
}else{


}
//print_r($aBody);
//die("ok= $ok ; $ok2 $fileopen");

if( @isset($ok)&&$ok!==false)
{
/*
==========
MEMBUKA FILE YANG ADA DI BODY
==========
*/
	$ok= array_search($fileopen,$aBody);	
	$f="body/".$aBody[$ok].".php";

}
elseif( @isset($ok2)&&$ok2!==false  )
{
/*
==========
MEMBUKA FILE YANG ADA DI ACTION. Pastikan 
di action tidak mengeluarkan tampilan
==========
*/
	$ok= array_search($fileopen,$aSpesial);
	$f="action/".$aSpesial[$ok].".php";
	
	
}elseif($fileopen==''){
	$f="body/".$baseBody.".php";

}else{
	$f="error/404.php";
}
  
//===================AUTOLOAD============
$target2=$coreFolder."/mods/myFunc.php";	
require($target2);
 
foreach($mods as $v)
{
	$s=loadMod($v);
	if(!$s){ 
		$f="error/mods.php";
		isset($modsError)?$modsError[]=$v:$modsError=array($v);	
	}
}

 
include($appFolder."/".$f);