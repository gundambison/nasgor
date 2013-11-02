<?php
ob_start();
 
$act= myUri(2);

if($act=='new')
{
foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	
	$phone=addslashes(json_encode($_POST['phone']));
	$det='';
	 
	$id=auto_id();
	 
	$ar=array(item_id=>$id, 'item_code'=>$item_code , 'item_name'=>$item_name , 'item_stat'=>$item_stat , 'item_price'=>$item_price , 'item_disc'=>$item_disc , 'item_size'=>$item_size , 'item_stock'=>$item_stock , 'item_price0'=>$item_price0 , 'item_stock0'=>$item_stock0 , 'item_store'=>$item_store , 'item_cat'=>$item_cat , 'item_merk'=>$item_merk , 'item_hot'=>$item_hot ); 
	dbInsert("{$prefix}item",$ar);	 
	
}

if($act=='update')
{
	foreach($_POST as $n=>$v)$$n=@addslashes( $v );
	//$err='not yet'; 
	
	$phone=addslashes(json_encode($phone1));
	$sql="UPDATE   `{$prefix}item` SET  
 item_code ='".addslashes($item_code).",
 item_name ='".addslashes($item_name).",
 item_stat ='".addslashes($item_stat).",
 item_price ='".addslashes($item_price).",
 item_disc ='".addslashes($item_disc).",
 item_size ='".addslashes($item_size).",
 item_stock ='".addslashes($item_stock).",
 item_price0 ='".addslashes($item_price0).",
 item_stock0 ='".addslashes($item_stock0).",
 item_store ='".addslashes($item_store).",
 item_cat ='".addslashes($item_cat).",
 item_merk ='".addslashes($item_merk).",
 item_hot ='".addslashes($item_hot)."
WHERE   `item_id` =$item_id;";
	 query($sql); 
	
}

//==================OTHER ADD HERE===========

$post=ob_get_contents();	
ob_end_clean(); 
$a=array($post);
if(@isset($err)) $a['err']=$err;
echo json_encode($a);