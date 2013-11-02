<?php
ob_start();
print_r($_POST);
$act= myUri(2);
if($act=='new')
{
	foreach($_POST as $n=>$v)$$n=$v;
	$sql="select count(sup_id) c from {$prefix}suplier where sup_code like '$sup_id'";
	$q=query($sql);
	$r=fetch($q);
	if($r['c']==0)
	{
		$detail=json_encode($det);
		$sql="insert into {$prefix}suplier(sup_code, sup_name, sup_detail, sup_stat)
		values('$sup_id','$sup_name','$detail','$sup_stat')";
		$q=query($sql);
		
	}else{
		$err='CODE SUDAH DIGUNAKAN '.$sql;
	
	}
}

if($act=='update')
{
//Array( [sup_id] => TWT2 [sup_name] => TEST [det] => Array ( [address] => [phone] => ) [sup_stat] => 1)
	
	foreach($_POST as $n=>$v)$$n=$v;
	$det=json_encode($_POST['det']);
	$sql="UPDATE   `{$prefix}suplier` SET  `sup_name` =  '$sup_name',
`sup_detail` =  '$det',
`sup_stat` =  '$sup_stat' WHERE  `sup_code` ='$sup_id';";
	$q=query($sql);
	echo $sql;

}
$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);