<?php
ob_start();
print_r($_POST);
foreach($_POST as $n=>$v)$$n=trim($v);
$value=addslashes($value);
$aData=$_POST;
if($field =='date')
{
	$sql="UPDATE   `kurs` SET  `k_date` =  '$value' WHERE   `k_id` =$id;";
	$aData['sql']=$sql;
	$data=array('log_id'=>auto_id(), 'log_detail'=>json_encode($aData));
	$sql2=dbInsert("kurs_log", $data);
	
}

if($field =='buy')
{
	$sql="select k_date date, k_detail from kurs where k_id=$id";
	$q=query($sql);
	$row = $q->fetch_assoc();
	$det=json_decode($row['k_detail'],true);
	$det['buy']=$value;
	$json=json_encode($det);

	$sql="UPDATE   `kurs` SET  `k_detail` =  '$json' WHERE   `k_id` =$id;";
	
	$data=array('log_id'=>auto_id(), 'log_detail'=>json_encode($aData));
	$sql2=dbInsert("kurs_log", $data);
	
}

if($field =='sale')
{
	$sql="select k_date date, k_detail from kurs where k_id=$id";
	$q=query($sql);
	$row = $q->fetch_assoc();
	$det=json_decode($row['k_detail'],true);
	$det['sale']=$value;
	$json=json_encode($det);
	
	$sql="UPDATE   `kurs` SET  `k_date` =  '$json' WHERE   `k_id` =$id;";
	
	$data=array('log_id'=>auto_id(), 'log_detail'=>json_encode($aData));
	$sql2=dbInsert("kurs_log", $data);
	
}

if(isset($sql)){
	$q=query($sql);
	echo $sql;
}

$txt=ob_get_contents();
        ob_end_clean(); 
$a=array('txt'=>$txt);	

$sql="select k_date date, k_detail from kurs where k_id=$id";
$q=query($sql);
$row = $q->fetch_assoc();
$a['date']=$row['date'];
$det=json_decode($row['k_detail'],true);
$a=array_merge($a,$det);

 echo json_encode($a);