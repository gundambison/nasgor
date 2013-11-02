<?php
ob_start();
 
foreach($_POST as $n=>$v)$$n=$v;
 
//$type & $key

$a=array();
if(!isset($type))
{
	$sql="select count(cus_id) c from `{$prefix}customer` order by cus_id desc";
}else{
//code, name, address,phone
  if($type=='code')
  {
	$sql="select count(cus_id) c from `{$prefix}customer` where cus_code like '$key%'
	order by cus_id desc";
  }
  
  if($type=='name')
  {
	$sql="select count(cus_id) c from `{$prefix}customer` where cus_name like '$key%'
	order by cus_id desc";
  }
  
  if($type=='address')
  {
	$sql="select count(cus_id) c from `{$prefix}customer` order by cus_id desc";
	//sementara
  }
  
  if($type=='phone')
  {
	$sql="select count(cus_id) c from `{$prefix}customer` where cus_phone like '$key%'
	order by cus_id desc";
  }
  
}

echo $sql;

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
	$sql="select * from `{$prefix}customer`, `{$prefix}customeraddress`
	where cadr_cus=cus_id
	group by cus_id
	order by cus_id desc
	limit $n,$rows";
}else{
  if($type=='code')
  {
	$sql="select * from `{$prefix}customer`, `{$prefix}customeraddress`
	 where cus_code like '$key%' 
	 and cadr_cus=cus_id
	 group by cus_id
	order by cus_id desc";
  }
  
  if($type=='name')
  {
	$sql="select * from `{$prefix}customer`, `{$prefix}customeraddress`
	 where cus_name like '$key%' 
	 and cadr_cus=cus_id 
	 group by cus_id
	order by cus_id desc";
  }
  
  if($type=='address')
  {
	$sql="select * from `{$prefix}customer`, `{$prefix}customeraddress`
	where  
	cadr_cus=cus_id
	group by cus_id
	 order by cus_id desc";
	//sementara
  }
  
  if($type=='phone')
  {
	$sql="select * from `{$prefix}customer`, `{$prefix}customeraddress`
	 where cus_phone like '$key%' 
	 and cadr_cus=cus_id
	 group by cus_id
	order by cus_id desc";
  }
}	
	echo $sql;

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
		 $data=array(
		 'id'=>$row['cus_id'],
		 'code'=>$row['cus_code'],
		 'nama'=>$row['cus_name'],
		 'alamat'=>$row['cadr_address'] 
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
 