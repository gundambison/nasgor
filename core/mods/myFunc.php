<?php
if(!$siteUrl)
{
	$siteUrl="http://".$_SERVER['SERVER_NAME']."/";
	$a=explode( "/",$_SERVER['SCRIPT_NAME']);
	for($i=1;$i<count($a)-1;$i++)
		$siteUrl.=$a[$i]."/";
}

function loadMod($file)
{
global $appFolder,$coreFolder;
	//$ok=false;
	$target1=$appFolder."/mods/".$file.".php";
	$target2=$coreFolder."/mods/".$file.".php";	
	if(is_file($target1))
	{
		require_once($target1);
		$ok=1;
	}
	
	if(!isset($ok))
	 if(is_file($target2))
	 {
		require_once($target2);
		$ok=1;
	 }
	if(!isset($ok))$ok=false;
	return $ok;
}
function showView($file,$data=array() )
{
global $appFolder;
	$target=$appFolder."/views/".$file.".php";
 
	if(is_file($target))
	{
		foreach($data as $n=>$v) $$n=$v;
		include($target);
	}else{
		echo "WARNING: Tidak ditemukan file $file di folder view!!";
		die();
	}
}

function my_url()
{
	global $siteUrl;
	return $siteUrl;

}

function myUri($n=1)
{
	$n--;
	$fileopen0=isset( $_GET['f'])?$_GET['f']:'';
	$fileopen0=str_replace(".html","",trim($fileopen0));

	$arFile=explode("/",$fileopen0);
	if(@isset($arFile[$n]))
		$fileopen=$arFile[$n];
	else
		$fileopen=false;
	return $fileopen;
}

function redirect($url)
{
?><script>window.location="<?=$url;?>";</script>
<?php
exit();
}