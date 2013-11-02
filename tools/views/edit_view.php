<form id='UpdateForm' style='margin:12px 20px'><?php
$id=myUri(3);
/*
Please edit the query
*/
$sql="select * from `".prefix()."%nama%`,
`".prefix()."%nama%detail`
 where %prefnama%_id='$id' and
 %prefnama%det_id = %prefnama%_id";
$q=query($sql);
$data=fetch($q);
foreach($data as $n=>$v)
{
	$nm=str_replace("%prefnama%_","",$n  );
	$$nm=$v;
	 
}
 

$det=json_decode($detail, true); ?><!-- <?php print_r($data);?>--><input type='hidden' name='%prefnama%_id' value='<?=$id;?>' />
	%listEdit%	 
	<p><input type=button onclick='updateForm()' value='update' />
</form>