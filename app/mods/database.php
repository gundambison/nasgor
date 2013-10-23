<?php
//==============MYSQLI SAJA==============
function query($sql)
{
global $mysqli;
	$q=$mysqli->query($sql);
	if(!$q)
	{
		//return FALSE;
		die($mysqli->error."<br>$sql");
	}else{
		return $q;
	}
	
}

function fetch($q)
{
	return $q->fetch_assoc();
}

function num_rows($result)
{
	return $result->num_rows;
}

function prefix()
{
global $prefix;
	return $prefix;
}

function auto_id($prefix='',$n=1)
{
	if($prefix=='') $prefix=prefix();
	
	$sql="select id from `{$prefix}counter`";	
	$q=query($sql);
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

function dbInsert($table, $data)
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
	query($sql);
}