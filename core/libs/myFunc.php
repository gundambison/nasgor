<?php
if(!$siteUrl)
{
	$siteUrl="http://".$_SERVER['SERVER_NAME']."/";
	$a=explode( "/",$_SERVER['SCRIPT_NAME']);
	for($i=1;$i<count($a)-1;$i++)
		$siteUrl.=$a[$i]."/";
}

function showView($file,$data=array() )
{
global $appFolder;
	$target=$appFolder."/view/".$file.".php";
 
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