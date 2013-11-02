<?php
ob_start();
 
foreach($_POST as $n=>$v)$$n=$v;
 
//$type & $key

$a=array();
if(!isset($type))
{
	$sql="select count(item_id) c from `{$prefix}item` order by item_id desc";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select count(item_id) c from `{$prefix}item` where item_code like '$key%'
	order by item_id desc";
  }
  
  
}

//echo $sql;

$q=$mysqli->query($sql);
	if(!$q)
	{
		die($mysqli->error);
	}
	$i=1;
	$data=array();
$r=$row = $q->fetch_assoc();//num_rows($q)
$result["total"]=$r['c'];	

$n=($page-1)*$rows;
if(!isset($type))
{
	$sql="select * from `{$prefix}item`  
	group by item_id
	order by item_id desc
	limit $n,$rows";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select * from `{$prefix}item` 
	 where item_code like '$key%' 	 
	 group by item_id
	order by item_id desc";
  }
   
}	
	echo $sql;

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
		 $data=array(
		 'id'=>$row['item_id'],
	'code'=>$row[code_on],
	'name'=>$row[name_on],
	'stat'=>$row[stat_on],
	'price'=>$row[price_on],
	'disc'=>$row[disc_on],
	'stock'=>$row[stock_on],
	'cat'=>$row[cat_on],
	'merk'=>$row[merk_on]
		  
		 );
		 
		 //==========LINK
		 $data['link']='next';
		 $a[]=$data;
		 
	}
print_r($_POST);

 $post=ob_get_contents();	
 ob_end_clean();    
 
//$a[]=$post;   
$result["rows"]=$a; 
$result[]=$post; 
echo json_encode($result);
 