<?php
 ob_start();
/*
page 
rows
*/ 
foreach($_POST as $n=>$v)$$n=$v;

$a=array();
$sql="select * from `{$prefix}suplier` order by sup_id desc";
$q=$mysqli->query($sql);
	if(!$q)
	{
		die($mysqli->error);
	}
	$i=1;
	$data=array();
$result["total"]=num_rows($q);	

$n=($page-1)*$rows;
$sql="select * from `{$prefix}suplier` 
order by sup_id desc
limit $n,$rows";
echo $sql;
$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
		 $data=array(
		 'id'=>$row['sup_id'],
		 'sup_code'=>$row['sup_code'],
		 'sup_nama'=>$row['sup_name']
		 
		 );
		 //==========status
		 if($row['sup_stat']==0)
		 {
			$data['status']='Hidden';
		 }else{
		 	$data['status']='Show';	 
		 }
		 //==========LINK
		 $data['link']='next';
		 $a[]=$data;
	}
print_r($_POST);
 $post=ob_get_contents();	
 ob_end_clean();    
 
//$a[]=$post;   
$result["rows"]=$a; 
 
echo json_encode($result);
 