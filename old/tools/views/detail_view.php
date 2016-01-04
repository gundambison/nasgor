<?php
$id=myUri(3);
$sql="select * from `".prefix()."%nama%` where %prefnama%_id='$id'";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
   $nm=str_replace("%prefnama%_","",$n  );
   $$nm=$v;
    
}

 
?>	%listMain%<!--
	try fix this detail
-->
	%listDetail%