<?php
function testUri($s0)
{
	$s=trim(strtolower($s0));
	$n=strlen($s);//echo "<br/>total:$n";
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
	 //echo"<br>";
return $s;
} 

function td($s='&nbsp;'){
	return "\n<td>$s</td>";
}