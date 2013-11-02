<?php
ob_start();
 
foreach($_POST as $n=>$v)$$n=$v;
 
//$type & $key

$a=array();
if(!isset($type))
{
	$sql="select count(%prefnama%_id) c from `{$prefix}%nama%` order by %prefnama%_id desc";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select count(%prefnama%_id) c from `{$prefix}%nama%` where %prefnama%_code like '$key%'
	order by %prefnama%_id desc";
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
	$sql="select * from `{$prefix}%nama%`  
	group by %prefnama%_id
	order by %prefnama%_id desc
	limit $n,$rows";
}else{
/*just example */
  if($type=='code')
  {
	$sql="select * from `{$prefix}%nama%` 
	 where %prefnama%_code like '$key%' 	 
	 group by %prefnama%_id
	order by %prefnama%_id desc";
  }
   
}	
	echo $sql;

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
		 $data=array(
		 'id'=>$row['%prefnama%_id']%tableshow%
		  
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
 