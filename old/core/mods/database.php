<?php
//==============MYSQLI SAJA==============
function query($sql,$mysqli="",$pass=0)
{
	if($mysqli=="")
		global $mysqli;
		
	$q=$mysqli->query($sql);
	if(!$q)
	{	
		if($pass==0)
			die($mysqli->error."<br>$sql");
	}else{
		return $q;
	}
	
}

function queryFetchAll($sql,$mysqli="",$type=1)
{
	$q=query($sql,$mysqli);
	$ar=array();
	while($row=fetch($q,$type))
	{
		$ar[]=$row;
	}
	
	return $ar;
}

function queryFetch($sql,$mysqli="",$type=1)
{
	$q=query($sql,$mysqli);
	return fetch($q,$type);
}

function fetch($q,$type=1)
{
	if($type==1)
	{
		return $q->fetch_assoc();
	}else{
		return $q->fetch_field();
	}
}

function num_rows($result)
{
	return $result->num_rows;
}

function prefix()
{
	global $prefix;
	return $prefix ;
}

function auto_id($prefix='',$n=1)
{
	if($prefix=='') $prefix=prefix();
	
	$sql="select id from `{$prefix}counter`";	
	$q=query($sql,'',1);
	if(!$q)
	{
		$q=create_autoid($prefix);
		
	}
	
	$r=fetch($q);
	$id=$r['id']+$n;
	$sql="UPDATE `{$prefix}counter` SET  `id` =  '$id' ";
	$q=query($sql);
	return $id;
}

function create_autoid($prefix)
{
	$sql="CREATE TABLE IF NOT EXISTS `{$prefix}counter` (
  `id` int(11) NOT NULL,  PRIMARY KEY (`id`) )";
	query($sql);
	$sql="INSERT INTO `{$prefix}counter` (`id`) VALUES(1)";
	query($sql);
	$sql="select id from `{$prefix}counter`";	
	return query($sql);
}

function dbInsert($table, $data,$mysqli='')
{
	$field=$dt="";
	foreach($data as $nm=>$var)
	{
		$field.="`$nm`, ";
		$dt.="'".addslashes($var)."',";
	}
	$field=trim($field) ;$field=substr($field,0,strlen($field)-1) ;
	$dt=trim($dt);$dt=substr($dt,0,strlen($dt)-1) ;

	$sql="insert into `$table` ({$field}) values ({$dt})";
	query($sql,$mysqli);
}

function dbUpdate($table, $data,$where, $mysqli='')
{
 
	$field=$dt="";
	foreach($data as $nm=>$var)
	{
		$dt="`$nm`=";
		$dt.="'".addslashes($var)."'";
		$ar[]=$dt;
	} 

	$data=implode(",", $ar);
	$sql="update `$table` set $data
	where $where";
	//myLog($sql);
	query($sql,$mysqli);
	
}

function myLog($txt)
{
	$sql="select id from `my_log`";	
	$q=query($sql,'',1);
	if(!$q)
	{
		$sql="CREATE TABLE IF NOT EXISTS `my_log` (`id` int(11) NOT NULL AUTO_INCREMENT,
  `log` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM";
		query($sql);
	}
	
	$data['log']=$txt;
	dbInsert("my_log", $data);
}