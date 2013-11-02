<?php
ob_start();
 
foreach($_POST as $n=>$v)$$n=$v;
 
//$type & $key

$a=array();
if(!isset($type))
{
	$sql="select count(k_id) c from `{$prefix}kurs` order by k_id desc";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select count(k_id) c from `{$prefix}kurs` where k_code like '$key%'
	order by k_id desc";
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
	$sql="select * from `{$prefix}kurs`  
	group by k_id
	order by k_id desc
	limit $n,$rows";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select * from `{$prefix}kurs` 
	 where k_code like '$key%' 	 
	 group by k_id
	order by k_id desc";
  }
   
}	
	echo $sql;

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
		 $data=array(
		 'id'=>$row['k_id'],
	'code'=>$row[code_on],
	'name'=>$row[name_on],
	'price'=>$row[price_on],
	'date'=>$row[date_on]
		  
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
 