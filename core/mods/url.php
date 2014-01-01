<?php
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

function createUri($name,$table,$field)
{
//=============BASE NAME
	$s=trim(strtolower($name));
	$n=strlen($s); 
	if($n>90) $n=90;
	for($i=0;$i<$n;$i++)
	{
		//===========bila bukan a-z atau 0-9 ganti -
		$ordChr=ord($s[$i]);
		$stat=FALSE;
		if($ordChr >= 48 && $ordChr <=57)
		{
			$stat=TRUE;
		}
		
		if($ordChr >= 97 && $ordChr <=122)
		{
			$stat=TRUE;
		}
		
		if(!$stat)
		{
			$s[$i]="_";
		}else{
			//echo $s[$i].$ordChr;
		}
		
	}
	 
	$basename=$s;
	//====CHECK NUMBERING========
	$ok=FALSE;
	while($ok==FALSE)
	{	
		$sql="select count($field) c from `$table` where `$field` like '$basename'";
		$row=queryFetch($sql);
		if($row['c']==0)
		{
			$uriName=$basename;
			$ok=TRUE;
		}else{
			$sql="select count($field) c from `$table` where `$field` like '$basename%'";
			$row=queryFetch($sql);
			$uriName=$basename."_";
			if(isset($counter))
			{
				$counter++;
				$uriName.=$counter;
			}else{
				$uriName.=++$row['c'];
				$counter=$row['c']+1;
			}
			
			$sql="select count($field) c from `$table` where `$field` like '$uriName'";
			$row=queryFetch($sql);
			if($row['c']==0)
			{
				$ok=TRUE;
			}
			
		}
	
	}
	
	return $uriName;
}